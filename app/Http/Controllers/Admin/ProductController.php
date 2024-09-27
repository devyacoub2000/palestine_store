<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;
use App\Models\Category;
use App\Models\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $products = Product::latest('id')->paginate(10);
         return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $categories = Category::select('id', 'name')->get();
        $product = new Product();
        return view('admin.products.create', compact('categories', 'product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
              
              'name_en' => 'required',
              'name_ar' => 'required',

              'image' => 'required|image',

              'galary' => 'required',

              'price' => 'required',

              'description_en' => 'required',
              'description_ar' => 'required',

              'quantity' => 'required',


              'category_id' => 'required'

        ]);

        $data = $request->except('_token', 'image', 'galary');

        $name = [
             'en' => $request->name_en ,
             'ar' => $request->name_ar 
          ];

        $desc = [
             'en' => $request->description_en ,
             'ar' => $request->description_ar 
          ];

        $product = Product::create([
               'name' => json_encode($name, JSON_UNESCAPED_UNICODE),
               'description' => json_encode($desc, JSON_UNESCAPED_UNICODE),
               'price' => $request->price,
               'quantity' => $request->quantity,
               'category_id' => $request->category_id,
        ]);



        $img = $request->file('image');
        $img_name = rand().time().$img->getClientOriginalName();
        $img->move(public_path('images'), $img_name);

        $product->image()->create([
              'path' => $img_name,
        ]);

        foreach($request->galary as $img) {
           $img_name = rand().time().$img->getClientOriginalName();
           $img->move(public_path('images'), $img_name);
           $product->galary()->create([
               'path' => $img_name,
               'type' => 'galary',
            ]);
        }

       return redirect()->route('admin.products.index')
      ->with('msg', 'Product Added Successfully')
      ->with('type', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {  
       $categories = Category::select('id', 'name')->get(); 
       return view('admin.products.edit', compact('product', 'categories'));   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {    
         $request->validate([
                'name_en' => 'required',
                'name_ar' => 'required',
                'price' => 'required',
                'quantity' => 'required',
                'category_id' => 'required',
                
         ]);

         $product->update([
              'name' => '',
              'description' => '',
              'price' => $request->price,
              'quantity' => $request->quantity,
              'category_id' => $request->category_id,
         ]);

        if($request->hasFile('image')) {
             if($product->image) {
                  File::delete(public_path('images/'.$product->image->path));
             }
             $product->image()->delete();
             $img = $request->file('image');
             $img_name = rand().time().$img->getClientOriginalName();
             $img->move(public_path('images'), $img_name);
             $product->image()->create([
                 'path' => $img_name,
             ]); 
        }
        
         if($request->has('galary')) {
             foreach($request->galary as $img) {  
                 $img_name = rand().time().$img->getClientOriginalName();
                 $img->move(public_path('images'), $img_name);
                 $product->galary()->create([
                     'path' => $img_name,
                     'type' => 'galary',
                 ]);
         }
         }
        

        return redirect()->route('admin.products.index')
          ->with('msg', 'Product Updated     Successfully')
          ->with('type', 'info');



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {    

        if($product->image && $product->galary) {
          // Delete From Folder Images 
            File::delete(public_path('images/'.$product->image->path));

            foreach($product->galary as $img) {
                File::delete(public_path('images/'.$img->path));
          }
        }
       
        
        // Delete From DB
        $product->image()->delete();
        $product->galary()->delete();
        $product->delete();

        return redirect()->route('admin.products.index')
       ->with('msg', 'Product Deleted Successfully')
       ->with('type', 'danger');

    }

    // delete img galary 

    public function delete_img($id) {
        $img = Image::find($id);
        File::delete(public_path('images/'.$img->path));
        return Image::destroy($id);

    }
}
