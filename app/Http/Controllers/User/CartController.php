<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Session;
use Stripe\Charge;
use Stripe\Stripe;

class CartController extends Controller
{
    public function index()
    {
        // $cart = Session::has('cart')?Session::get('cart'): [];
        // $ids = [];
        // foreach ($cart as $value) {
        //     $ids[] = $value['product_id'];
        // }
        // $data['products'] = Product::where('id', $ids)->get();
        $data['products'] = $this->getProducts();
        $data['total'] = $this->Total();
        // dd($products);
        return view('user.view_cart')->with('data' , $data);
    }

    // add products in cart
    public function add($id , $quantity=1){
        
        // Initialize and check the session exist or not
        $oldCart = Session::has("cart") ? Session::get("cart") : [];
        // loop the cart array 
        foreach($oldCart as $item){
        // if id which we get is equal to product id then show error
            if($item['product_id'] == $id){
                return response()->json(['error' => 'Already Added to cart' , 'count' => sizeof($oldCart)]);
            }
        }
 
        // store the product id and quantity in session 
        $item['product_id'] = $id;
        $item['quantity'] = $quantity;
        $oldCart[] = $item;
        Session::put('cart' , $oldCart);
        return response()->json(['success' => 'Added to cart' , 'count' => sizeof($oldCart)]);
        
    }
    
   //function to get the user against id  

     public function getItem($id){
        $products = Session::has('cart')?Session::get('cart'): [];
        foreach($products as $key=>$pro){
            if($pro['product_id'] == $id)
                return $key;
        }
    }
 
    // remove the product from cart
    public function remove($id){
        $product =  $this->getItem($id);
        $oldCart = Session::has('cart')?Session::get('cart'): [];
        unset($oldCart[$product]);
        Session::put('cart' , $oldCart);
        return response()->json(['success' => 'Product remove from cart' , 'count' => sizeof($oldCart)]);
    }

    // function to get product ids

    public static function getProductIds(){
        $cart = Session::has('cart')?Session::get('cart'): [];
        $ids = [];
        foreach ($cart as $key => $value) {
            $ids[] = $value['product_id'];
        }
        return $ids;
    }

   

    // function to change/update quantity of products in session

    public function change_quantity($id,$quantity)
    {
        $oldCart = Session::has('cart')?Session::get('cart'): [];
        $newCart = [];
        foreach($oldCart as $value){
            if($value['product_id'] == $id){
                $value['quantity'] = $quantity;
            }   $newCart[] = $value;
        }
        Session::put('cart' , $newCart);
    }

    // Get Total Products

    public function getProducts()
    {
        $products = Product::whereIn('id' , $this->getProductIds())->get();
        foreach($products as $pro){
            foreach(Session::get('cart') as $cart){
                if($pro->id == $cart['product_id']){
                    $pro->squantity = $cart['quantity'];
                }
            }
            // $newProducts =
        }
        return $products;
    }


    // function to get total price of products

    public function Total()
    {
        $products = $this->getProducts();
        $sum = 0;
        foreach($products as $pro){
             $sum += $pro->squantity * $pro->standard;
        }
        return $sum;
    }


    // function to fetch data after changing the quantity
     
    public function ChangeQty($id , $quantity)
    {
       $products = $this->change_quantity($id,$quantity);
       $total_price = $this->Total();
       return ($quantity > 1000) ? response()->json(['error' => "Maximum order can be placed upto 1000 items"])
       : response()->json(['totalPrice' => $total_price ,'products' =>$products]);
    }
    // get total items
    public function getTotalItems(){
        $products =$this->getProducts();
        $sum = 0;
        foreach($products as $pro){
            $sum += $pro->squantity;
        }
        return $sum;
    }

    // redirect into checkout page
  public function checkout()
  {

    $data['products'] = $this->getProducts();
    $data['total'] = $this->Total();
    return view('user.checkout',$data);

  }

 // Save order function 
  public function saveOrder(Request $request){
    $input = $request->all();
    Session::put('order_details', $input);
    $amount = $request->amount;
    $orderId = "Ord".rand(0, 10).time();
    Stripe::setApiKey(env('STRIPE_SECRET'));
    Charge::create ([
        "amount" => $amount,
        "currency" => "usd",
        "source" => $request->stripeToken,
        "description" => "Purchase Product"
    ]);
    return $this->success($orderId);
  }

  // if stripe is successful then start from success function 

  protected function success($inv_num = "")
  {
    $dat  = Session::get('order_details');
    $order = new Order();
    $order->order_by = Auth::user()->id;
    $order->checkout_first = $dat['checkout_first'];
    $order->checkout_last = $dat['checkout_last'];
    $order->checkout_company = $dat['checkout_company'];
    $order->checkout_street = $dat['checkout_street'];
    $order->checkout_city = $dat['checkout_city'];
    $order->checkout_country = $dat['checkout_country'];
    $order->checkout_post_code = $dat['checkout_post_code'];
    $order->checkout_phone = $dat['checkout_phone'];
    $order->checkout_email = $dat['checkout_email'];
    $order->notes = $dat['notes'];
    $order->amount = $dat['amount'];
    $order->quantity = $this->getTotalItems();
    $order->order_number = $inv_num;
    $order->payment_method = $dat['payment_method'];

    $order->save();

    $products = $this->getProducts();
    foreach($products as $pro){
        $prod = new OrderDetail();
        $prod->order_id = $order->id;
        $prod->product_id = $pro->id;
        $prod->quantity = $pro->squantity;
        $prod->product_price = $pro->standard;
        $prod->save();
    }

  }

    
}
