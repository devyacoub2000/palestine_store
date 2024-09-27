<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        // $products = Product::all();
        // $array_products = [];
        // foreach($products as $product) {
        //     $array_products[] = [
        //          'name' => $product->trans_name,
        //          'price' => $product->price,
        //     ];
        // }
        // return $array_products;

        return [
              'status' => true,
              'message' => 'All Products',
              'Products' => ProductResource::collection(Product::all()),

        ];
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

        // $data = $request->except('_token', 'image', 'galary');

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
         
        return response()->json([ 
                'status' => 'true',
                'message' => 'Added New Product',
                'Product' => new ProductResource($product),
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        
        if($product) {
            return response()->json([ 
                'status' => true,
                'message' => 'Product Found',
                'Product' => new ProductResource($product),
        ], 200);

        } else {
           return response()->json([
                'status' => false,
                'message' => 'Product Not Found',
           ], 401); 
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
