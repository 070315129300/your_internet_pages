<?php
namespace App\Http\Controllers;
use App\Models\product;
use Illuminate\Http\Request;
use Exception;

class ProductController extends Controller
{
//list all products
    public function listAllProducts()
    {
        try{
            $product = product::all();
            return $this->success(false, "banner!", $product, 200);

        }catch (Exception $e){
            return $this->fail(true, "Couldn't fetch product!", $e->getMessage(), 400);
        }
    }
 // list a product
    public function listAProducts($productid)
    {
        try{
            $product = product::find($productid);
            return $this->success(false, "banner!", $product, 200);

        }catch (Exception $e){
            return $this->fail(true, "Couldn't fetch product!", $e->getMessage(), 400);
        }
    }

 //create a product
    public function createProduct(Request $request)
    {

                $user  = new Product;
                $user->name = $request->name;
                $user->brandname = $request->brandname;
                $user->defaultimg = "http://157.230.229.73/html/default_image.jpg";
                $user->price = $request->price;
                $user->details = $request->details;
                $user->trending = $request->trending;
                $user->topitem = $request->topitem;
                $user->hotproduct = $request->hotproduct;
                $user->categories = $request->categories;
                $image1 = $request->file1;
                if($image1) {
                    $imagename =time().'.'.$image1->getClientoriginalExtension();

                    $request->file1->move('productimage1', $imagename);
                    $user->image1 = $imagename;
                }

                $image2 = $request->file2;
                if($image2) {
                    $imagename = time().'.'.$image2->getClientoriginalExtension();

                    $request->file2->move('productimage2', $imagename);
                    $user->image2 = $imagename;
                }

                $image3 = $request->file3;
                if($image3) {
                    $imagename = time().'.'.$image3->getClientoriginalExtension();

                    $request->file3->move('productimage3', $imagename);
                    $user->image3 = $imagename;
                }

                $image4 = $request->file4;
                if($image4) {
                    $imagename = time().'.'.$image4->getClientoriginalExtension();

                    $request->file4->move('productimage4', $imagename);
                    $user->image4 = $imagename;
                }
                $user->save();
                return redirect()->back()->with('message', 'Uploaded successfully ');
//        }catch(Exception $e){
//            return $this->fail(true, "Couldn't create product!", $e->getMessage(), 400);
//
//        }
    }

 //update a product
    public function updateProduct()
    {
        try{

        }catch (Exception $e){
            return $this->fail(true, "Couldn't update product!", $e->getMessage(), 400);
        }
    }

//delete a product
    public function deleteAProduct($productid){
        try{
            $product = product::find($productid);
            $product->delete();
            return $this->success(false, "banner deleted!", $product, 200 );
        }catch (Exception $e){
            return $this->fail(true, "Couldn't delete product", $e->getMessage(), 400);
        }
    }
}
