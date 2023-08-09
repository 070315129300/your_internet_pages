<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\User;
use App\Models\cart;
use App\Models\order;



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

//         $data = cart::where('product_id', $id)->get();
//
//           if (!$data->isEmpty()){
//             return redirect()->back()->with('product already added to cart');
//         }else{


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

        return redirect()->back()->with('message','product added to cart');
        // }
       }else{
          return redirect('login');
       }


    }

    public function remove(Cart $cartItem)
    {
        // Delete the cart item when the user removes a product from the cart
        $cartItem->delete();

        // Redirect back to the cart page or show a success message
        return back()->with('message', 'Product removed from cart.');
    }

    public  function addquantity($id){
        $data = cart::find($id);
        $data->quantity = $data->quantity + 1;
        $data->save();
        return redirect()->back();
    }
    public  function removequantity($id){
        $data = cart::find($id);
        $data->quantity = $data->quantity - 1;
        if($data->quantity < '1'){
            $data->quantity = '1';
        }
        $data->save();
        return redirect()->back();
    }

    public function removecart($id){
        $cart = cart::find($id);
        $cart->delete();
        return redirect()->back();
    }
    public function payondelivery(Request $request){
        $user=Auth::user();
        $userid = $user->id;
        $data=cart::where('user_id','=',$userid)->get();
        foreach($data as $data)
        {
            $order = new order;
          $order->firstname = $data->name;
          $order->lastname = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;
            $order->address = $request->address;
            $order->productname = $data->productname;
            $order->price = $data->price;
            $order->image = $data->image;
            $order->user_id = $data->user_id;
            $order->product_id = $data->product_id;
            $order->quantity = $data->quantity;
            $order->payment_status = 'cash on delivery';
            $order->delivery_status = 'processing';
            $order->save();
            $cart_id = $data->id;
            $cart = cart::find($cart_id);
            $cart->delete();
// pk_live_267cb7104250b004636af9765daf70a3f4d09e26
            // live key sk_live_1ac92f344f7ed331b9d14b6518ba55d8646f6376
        }
        return redirect()->back()->with('message','Thank You For Your Order');
    }
}


