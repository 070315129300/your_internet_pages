<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;
use Exception;

class CategoryController extends Controller
{
    // Category pages
    public function createCategory(Request $request){

            $category = new category;
            $category->name = $request->name;
            $category->available = $request->status;
            $category->save();
        return redirect()->back()->with('message', 'Uploaded successfully ');

    }

    //store Category
    public function editCategory(Request $request, $id){

            $category = category::find($id);
            $category->name = $request->name;
            $category->available = $request->status;
            $category->save();
            return redirect()->back()->with('message', 'Uploaded successfully ');
    }

    // Get All Category pictures
    public function listAllCategory(){
        try {
            $category = category::all()->orderBy('id', 'desc')->get();

            return $this->success(false, "brand!", $category, 200);

        } catch (Exception $e) {
            return $this->fail(true, "Couldn't fetch brand!", $e->getMessage(), 400);
        }

    }
    // Delete A Category
    public function deleteACategory($categoryid){
        try{
            $category = category::find($categoryid);
            $category->delete();
            return $this->success(false, "brand deleted!", $category, 200 );
        }catch (Exception $e){
            return $this->fail(true, "Couldn't delete brand", $e->getMessage(), 400);
        }
    }
}
