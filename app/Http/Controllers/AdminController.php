<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\category;
use App\Models\message;
use App\Models\order;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function indexadmin(){
        $message = message::paginate(5);
        $order = order::paginate(5);
        $user = user::all();
        $product = product::all();
        return view('admin.index', compact('message', 'order', 'user', 'product'));
    }
    public function product(){
        $product = product::paginate(20);
        return view('admin.product', compact('product'));
    }
    public function order(){
        $order = order::paginate(5);
        return view('admin.order', compact('order'));
    }
    public function message(){
        $message = message::all();
        return view('admin.message', compact('message'));
    }
    public function team(){
        return view('admin.team');
    }
    public function addproduct(){
        $brand = brand::all();
        $category = category::all();
        return view('admin.addproduct', compact('brand', 'category'));
    }
    public function category(){
        $category = category::all();
        return view('admin.category', compact('category'));
    }
    public function brand(){
        $brand = brand::all();
      return view('admin.brand', compact('brand'));
    }
    public function addmessage(Request $request){
        $message = new message;
            $message->name = $request->name;
            $message->subject = $request->subject;
            $message->email = $request->email;
            $message->phone = $request->phone;
            $message->message = $request->message;
            $message->save();
        return redirect()->back()->with('message', 'Sent successfully ');
    }

}
