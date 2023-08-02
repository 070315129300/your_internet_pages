<?php

namespace App\Http\Controllers;
use App\Models\banner;
use Illuminate\Http\Request;
use App\Traits\Common;
use App\Traits\Response;
use Exception;

class BannerController extends Controller
{
    // banner pages
    public function createBanner(){
        return view('pages/banner');
    }

    //store banner
    public function storeBanner(Request $request){
        try{
            $banners = banner::create([
              "name" => $request->name,
              "image" => $request->image
            ]);
            $banners->save();
            return $this->success(false, "banner stored!", $banners, 200);

        }catch(Exception $e){
            return $this->fail(true, "Couldn't store banner!", $e->getMessage(), 400);
        }
    }

    // Get All banner pictures
    public function listAllBanner(){
        try {
            $banners = banner::all()->orderBy('id', 'desc')->get();

            return $this->success(false, "banner!", $banners, 200);

        } catch (Exception $e) {
            return $this->fail(true, "Couldn't fetch students!", $e->getMessage(), 400);
        }

    }
    // Delete A Banner
    public function deleteABanner($bannerid){
        try{
            $banners = banner::find($bannerid);
            $banners->delete();
            return $this->success(false, "banner deleted!", $banners, 200 );
        }catch (Exception $e){
            return $this->fail(true, "Couldn't delete banner", $e->getMessage(), 400);
        }
    }


}



