<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Offer;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function dashboard()
  {
    $data['active_users'] = User::where('status', 1)->count();
    $data['total_products'] = Product::count();
    $data['total_offers'] = Offer::count();
    return view('admin.dashboard', $data);
  }

  public function index()
  {
    $data['products'] = Product::with('category')->get();
    $data['brands'] = Brand::get();
    $data['categories'] = Category::get();
    $data['offers'] = Offer::get();
    return view('user.main', $data);
  }
  public function shop(Request $request)
  {
    $data['products'] = Product::with('category')->Paginate('6');
    $data['brands'] = Brand::get();
    // $data['categories'] = Category::get();
    $data['offers'] = Offer::get();
    // Check for search input
    if ($request->search) {
      $data['categories'] = Category::where('name', 'like', '%' . $request->search . '%')->get();
    } else {
      $data['categories'] = Category::get();
    }
    $data['max_price'] = Product::max('gold');
    $data['min_price'] = Product::min('standard');
    return view('user.shop', $data);
  }

  
public function filter(Request $request)
{
  $cats = null;
  $brands = null;
  if(isset($request->cats)){
      $cats = $request->cats;
  }    
  if(isset($request->brands)){
      $brands = $request->brands;
  }
  $products = Product::when($cats, function ($query, $cats) {
      return $query->whereIn('category_id', $cats);
  })->when($brands, function ($query, $brands) {
      return $query->whereIn('brand_id', $brands);
  });


  return response()->json(array("products" => $products),200);
  // return view('user.shop')->with('products' , $products);

}


}