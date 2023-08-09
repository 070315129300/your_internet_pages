<?php

namespace App\Http\Controllers;

use App\Models\brand;
use Illuminate\Http\Request;
use Exception;

class BrandController extends Controller
{

    // brand pages
    public function createBrand(Request $request){
        $brand = new brand;
        $brand->name = $request->name;
        $brand->available = $request->status;
        $brand->save();
        return redirect()->back()->with('message', 'Uploaded successfully ');

    }

    //store brand
    public function editBrand(Request $request, $id){

        $category = brand::find($id);
        $category->name = $request->name;
        $category->available = $request->status;
        $category->save();
        return redirect()->back()->with('message', 'Uploaded successfully ');
    }

    // Get All Brand pictures
    public function listAllBrand(){
        try {
            $brand = brand::all()->orderBy('id', 'desc')->get();

            return $this->success(false, "brand!", $brand, 200);

        } catch (Exception $e) {
            return $this->fail(true, "Couldn't fetch brand!", $e->getMessage(), 400);
        }

    }
    // Delete A Brand
    public function deleteABrand($brandid){

            $brand = brand::find($brandid);
            $brand->delete();
        return redirect()->back()->with('message', 'Brand Deleted ');

    }
}
