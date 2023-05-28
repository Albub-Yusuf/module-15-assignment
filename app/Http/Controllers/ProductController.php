<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 
class ProductController extends Controller
{
    function __construct(){
        $this->middleware('log');
   }
   
    public function index()
    {
        $data['title'] = 'Product List';
        $data['products'] = Product::orderBy('id','DESC')->get();
        return view('product.index',$data);
    }

    
    public function create()
    {
        $data['title'] = 'Add Product';
        return view('product.create',$data);
    }

    
    public function store(Request $request)
    {

        $name = $request->name;
        $price = $request->price;
        $details = $request->description;
        $product_image = '';
        
        //File Upload product
        if($request->hasFile('product_image')){
            $file = $request->file('product_image');
            $file->move('assets/img/products/',$file->getClientOriginalName());
            $product_image = 'assets/img/products/'.$file->getClientOriginalName();
        }

        Product::create([
                'name'=> $name,
                'price' => $price,
                'description' => $details,
                'product_image' => $product_image
        ]);


        return redirect('/Product')->with('message','Product Created Successfully!');

    }

   
    public function edit($id)
    {
        $data['title'] = 'Edit Product Details';
        $data['productInfo'] = Product::where('id',$id)->first();  
        return view('product.edit',$data);
    }

    
    public function update(Request $request, $id)
    {

        $name = $request->name;
        $price = $request->price;
        $details = $request->description;
        $product_image = '';
      

         //File Upload
        
         
             if($request->hasFile('product_image')){
                 $file = $request->file('product_image');
                 $file->move('assets/img/products/',$file->getClientOriginalName());
                 File::delete($request->file);
                 $product_image = 'assets/img/products/'.$file->getClientOriginalName();
             }

            
 
         
         if($product_image != NULL){
             Product::where('id',$id)->update([
                'product_image'=>$product_image
             ]);
         }

      

         if($product_image === ""){
            $product_image = $request->image_address;
            Product::where('id',$id)->update([
                'product_image'=>$product_image
             ]);
            
         }


          Product::where('id',$id)->update([
                    'name'=> $name,
                    'price' => $price,
                    'description' => $details,
                  
            ]);


            return redirect('/Product')->with('message','Product Updated Successfully!');

    }

   
    public function destroy( $id)
    {   
      
       Product::where('id',$id)->delete();
       return redirect('/Product')->with('message','Product deleted successfully!');
    }
}
