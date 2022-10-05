<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Psy\Readline\Hoa\Console;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['main_title'] = "Product Management";
        $data['sub_title'] = "Viewing all Products";
        $data['products'] = Product::get();
        return view('admin.products.index')->with($data);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['main_title'] = "Product Management";
        $data['sub_title'] = "Add Product";
        $data['categories'] = Category::all();
        $data['brands'] = Brand::all();
        $data['product'] = Product::all();
        return view('admin.products.add',$data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product= new Product();
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->weight = $request->weight;
        $product->measuring_unit = $request->measuring_unit;
        $product->standard = $request->standard;
        $product->premium = $request->premium;
        $product->gold = $request->gold;
        $product->product_image = $request->product_image;
        $product->size = $request->size;
        $product->description = $request->description;
        $product->color = $request->color;
        $product->status = $request->status=='on' ? :1  ;
        $product->in_stock = $request->in_stock=='on' ? :1  ;
        $product->is_featured = $request->is_featured=='on' ? :1  ;
        if ($request->hasFile('product_image')) {
            $filename = 'product-' . time() . rand(99, 199) . '.' . $request->file('product_image')->getClientOriginalExtension();
            $request->file('product_image')->storeAs('public/products', $filename);
        }
        if (isset($filename)) {
            $product->product_image = $filename;
        }
        $product->save();
        $msg =session()->flash('message', 'Product successfully added.');

        return redirect('adminpanel/product')->with($msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $data['main_title'] = "Product Management";
        $data['sub_title'] = "Modify Product";
        $data['categories'] = Category::all();
        $data['brands'] = Brand::all();
        $data['product'] = $product;
        return view('admin.products.update',$data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->name = $request->name;
        $product->weight = $request->weight;
        $product->measuring_unit = $request->measuring_unit;
        $product->standard = $request->standard;
        $product->premium = $request->premium;
        $product->gold = $request->gold;
        $product->product_image = $request->product_image;
        $product->size = $request->size;
        $product->description = $request->description;
        $product->color = $request->color;
        $product->status = $request->status=='on' ? :1  ;
        $product->in_stock = $request->in_stock=='on' ? :1  ;
        $product->is_featured = $request->is_featured=='on' ? :1  ;
        if ($request->hasFile('product_image')) {
            if (!empty($product->product_image)) {
                $file =  'products/' . $product->product_image;
                if (file_exists($file)) {
                    unlink($file);
                }
            }
            $filename = 'product-' . time() . rand(99, 199) . '.' . $request->file('product_image')->getClientOriginalExtension();
            $request->file('product_image')->move('products/', $filename);
        }

        if (isset($filename)) {
            $product->product_image = $filename;
        }
        $product->update();
        $msg =session()->flash('message', 'Product successfully Updated.');

        return redirect('adminpanel/product');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        // $msg =session()->flash('message', 'Product Delete successfully');
        // return view('admin.products.index');e
    }
}
