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
        $belt = product::where('categories', 'belt')->orderBy('id','desc')->paginate(3);
        $glass = product::where('categories', 'glass')->orderBy('id','desc')->paginate(3);
        $watch = product::where('categories', 'watch')->orderBy('id','desc')->paginate(3);
        $topitem = product::where('topitem', 'yes')->orderBy('id','desc')->paginate(8);
        $trending = Product::where('trending', 'yes')->orderBy('id','desc')->paginate(8);
        $category = category::all();


        $user=Auth::user();
        if(! $user){
            $cart = 'login to see cart items ';
            return view('pages/index', compact('watch', 'topitem', 'trending', 'category','belt','glass','user','cart'));
        }else{
            $id = $user->id;
            $cart = cart::where('user_id', $id)->orderBy('id','desc')->paginate(3);
        }
        return view('pages/index', compact('watch', 'topitem', 'trending', 'category','belt','glass','cart'));
    }


    public function productpage(){
        $product = product::paginate(24);
        $category = category::all();

        $user=Auth::user();
        if(! $user){
            $cart = 'login to see cart items ';
            return view('pages/productpage', compact( 'category','product','user','cart'));
        }else{
            $id = $user->id;
            $cart = cart::where('user_id', $id)->orderBy('id','desc')->paginate(3);
        }
        return view('pages/productpage', compact('product',  'category','cart'));

    }

    public function cartpage(){

        $category = category::all();
        $user=Auth::user();
        $id = $user->id;
        $cart = Cart::where('user_id',$id )->get();
        return view('pages/cart', compact('cart', 'category'));


    }
    public function contact(){
        $category = category::all();
        $user=Auth::user();
        $id = $user->id;
        $cart = Cart::where('user_id',$id )->get();
        return view('pages/contact', compact('category','cart'));
    }
    public function checkoutpage(){
        $category = category::all();
        $user=Auth::user();
        $id = $user->id;
        $cart = Cart::where('user_id',$id )->get();
        return view('pages/checkout', compact('category','cart'));
    }
    public function singleproduct($id){
        $product = product::find($id);
        $category = category::all();
        $user=Auth::user();
        $id = $user->id;
        $cart = Cart::where('user_id',$id )->get();
        return view('pages/singleproduct', compact('product', 'category','cart'));
    }
}

