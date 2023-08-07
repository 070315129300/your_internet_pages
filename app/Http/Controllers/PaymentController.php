<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\order;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Paystack;


class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway()
    {
        $formData = [
            'address' => request('address'),
            'amount' => request('amount') * 100,
            'currency'=> request('currency'),
            'callback_url'=>url('paymentcallback'),
            'email'=> request('email')
        ];

        $pay = json_decode($this->initiate_payment($formData));

        if($pay){
            if($pay->status){
                return redirect($pay->data->authorization_url);
            }else{
                return back()->withErrors($pay->message);
            }

        }else{
            return back()->withErrors('Something is wrong');
        }

    }

    public function initiate_payment($formData){

        $url = "https://api.paystack.co/transaction/initialize";

        $fields_string = http_build_query($formData);

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, true);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Authorization: Bearer ".env("PAYSTACK_SECRET_KEY"),
            "Cache-Control: no-cache",
        ));

        //So that curl_exec returns the contents of the cURL; rather than echoing it
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);

        //execute post
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

  /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $response = json_decode($this->verify_payment(request('reference')));
        if($response){
            if($response->status){
                $user=Auth::user();
                $userid = $user->id;
                $data=cart::where('user_id','=',$userid)->get();
                foreach($data as $data) {
                    $order = new order;
                    $order->firstname = $data->name;
                    $order->lastname = $data->name;
                    $order->email = $data->email;
                    $order->phone = $data->phone;
//                    $order->address = $user->address;
                    $order->productname = $data->productname;
                    $order->price = $data->price;
                    $order->image = $data->image;
                    $order->user_id = $data->user_id;
                    $order->product_id = $data->product_id;
                    $order->quantity = $data->quantity;
                    $order->payment_status = $response->status;
                    $order->delivery_status = 'processing';
                    $order->save();
                    $cart_id = $data->id;
                    $cart = cart::find($cart_id);
                    $cart->delete();
                }
                return views('pages.callback', compact('response'));
            }else{
                return back()->withErrors($response->message);
            }
        }else{
            return back()->withErrors('Something is wrong');
        }
    }

    public function verify_payment($reference){
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING =>'',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer ".env("PAYSTACK_SECRET_KEY"),
                "Cache-Control: no-cache"
            )
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }
}
