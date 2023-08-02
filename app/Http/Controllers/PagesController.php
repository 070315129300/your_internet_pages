<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function index(){
        $belt = product::where('categories', 'belt')->get();
        $glass = product::where('categories', 'glass')->get();
        $watch = product::where('categories', 'watch')->get();
        $topitem = product::where('topitem', 'yes')->get();
        $trending = Product::where('trending', 'yes')->get();
        $category = category::all();
        $user=Auth::user();
        $id = $user->id;
        $cart = cart::where('user_id', $id)->get();

        return view('pages/index', compact('watch', 'topitem', 'trending', 'category','belt','glass','cart'));
    }
    public function productpage(){
        $product = product::all();
        return view('pages/productpage', compact('product'));
    }
    public function cartpage(){
        $user=Auth::user();
        $id = $user->id;
        $cartItems = Cart::where('user_id',$id )->get();
        return view('pages/cart', compact('cartItems'));

    }
    public function contact(){
        return view('pages/contact');
    }
    public function checkoutpage(){
        return view('pages/checkout');
    }
    public function singleproduct($id){
        $product = product::find($id);
        return view('pages/singleproduct', compact('product'));
    }
}

