<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $data['brands'] = Brand::get();
        $data['categories'] = Category::get();
        $data['products'] = Product::with('category')->get();
        $data['wishlists'] = Wishlist::with('product')
            ->where('user_id', $user)->get();
        return view('user.wishlist', $data);
    }

    // Add in wishlist
    public function create($id)
    {
        $found = Wishlist::where('user_id', Auth::user()->id)->Where('product_id', $id)->count();
        if ($found == 0) {
            $wishlist = new Wishlist;
            $wishlist->user_id = Auth::user()->id;
            $wishlist->product_id = $id;
            $wishlist->save();
            return 1;
        } else {
            return 0;
        }
    }

    // Remove from wishlist

    public function remove($id)
    {
        WishList::find($id)->delete();
    }
}
