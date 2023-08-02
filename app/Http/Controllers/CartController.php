<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\cart;

class CartController extends Controller
{
    public function show()
    {
        // Retrieve cart items from the database and pass them to the view
        $cartItems = Cart::all();
        return view('cart', compact('cartItems'));
    }

    public function addcart(Request $request, $id)
    {

        // Create or update a cart item when the user adds a product to the cart
       if(Auth::id())
       {
         $user=Auth::user();
         $product=product::find($id);
         $cart = new cart;
         $cart->name=$user->firstname;
         $cart->email=$user->email;
         $cart->phone=$user->phone;
         $cart->user_id=$user->id;
         $cart->productname=$product->name;
         $cart->price=$product->price;
         $cart->product_id=$product->id;
         $cart->quantity=$request->quantity;
         $cart->image= $product->image1;
         $cart->save();
//                $image1 = $product->image1;
//                if($image1) {
//                    $imagename =time().'.'.$image1->getClientoriginalExtension();
//
//                    $request->image1->move('cartimage', $imagename);
//                    $cart->image = $imagename;
//                }
        return redirect()->back();

       }else{
          return redirect('login');
       }

//        $cartItem = Cart::updateOrCreate(
//            ['product_id' => $product->id],
//            ['quantity' => $request->quantity]
//        );
//
//        // Redirect back to the product page or show a success message
//        return back()->with('success', 'Product added to cart successfully.');
    }

    public function remove(Cart $cartItem)
    {
        // Delete the cart item when the user removes a product from the cart
        $cartItem->delete();

        // Redirect back to the cart page or show a success message
        return back()->with('success', 'Product removed from cart.');
    }
}
