<?php

namespace App\Http\Controllers;

use App\Models\brand;
use App\Models\category;
use App\Models\message;
use App\Models\product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function indexadmin(){
        return view('admin.index');
    }
    public function product(){
        $product = product::all();
        return view('admin.product', compact('product'));
    }
    public function order(){
        return view('admin.order');
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
