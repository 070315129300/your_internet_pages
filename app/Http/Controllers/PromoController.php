<?php

namespace App\Http\Controllers;

use App\Models\promo;
use Illuminate\Http\Request;
use Exception;

class PromoController extends Controller
{

    // promo pages
    public function createPromo(){
        return view('pages/promo');
    }

    //store promo
    public function storePromo(Request $request){
        try{
            $promo = promo::create([
                "name" => $request->name,
                "image" => $request->image
            ]);
            $promo->save();
            return $this->success(false, "promo banner stored!", $promo, 200);

        }catch(Exception $e){
            return $this->fail(true, "Couldn't fetch students!", $e->getMessage(), 400);
        }
    }

    // Get All banner pictures
    public function listAllPromo(){
        try {
            $promo = promo::all()->orderBy('id', 'desc')->get();

            return $this->success(false, "banner!", $promo, 200);

        } catch (Exception $e) {
            return $this->fail(true, "Couldn't fetch students!", $e->getMessage(), 400);
        }

    }
    // Delete A Banner
    public function deleteAPromo($promoid){
        try{
            $promo = promo::find($promoid);
            $promo->delete();
            return $this->success(false, "banner deleted!", $promo, 200 );
        }catch (Exception $e){
            return $this->fail(true, "Couldn't delete banner", $e->getMessage(), 400);
        }
    }


}
