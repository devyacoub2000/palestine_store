<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::withCount('products')->latest('id')->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        $category = new Category();
        return view('admin.categories.create', compact('category'));
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
      ]);

      $data = $request->except('_token', 'image');


      $desc = [
              'en' => $request->description_en,
              'ar' => $request->description_ar,
      ];
      $category = Category::create([
            
            'name' => '',
            'description' => json_encode($desc, JSON_UNESCAPED_UNICODE),
      ]);

      
      // Add Image to relation 

      $img_name = rand().time().$request->file('image')->getClientOriginalName();
      $request->file('image')->move(public_path('images'), $img_name); 

      $category->image()->create([
           'path' => $img_name
      ]);



      return redirect()->route('admin.categories.index')
      ->with('msg', 'Category Added Successfully')
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

    // Route Model Bind
    public function edit(Category $category)
    {
        // $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {  

        $request->validate([
            'name_en' => 'required',
            'name_ar' => 'required',
      ]);
 
      if($request->hasFile('image')) {
          if($category->image) {
             File::delete(public_path('images/'.$category->image->path)); 
          }
          $category->image()->delete();
          $img = $request->file('image');
          $img_name = rand().time().$img->getClientOriginalName();
          $img->move(public_path('images'), $img_name);
          $category->image()->create([
              'path' => $img_name,
          ]);
      }
     
      $desc = [
              'en' => $request->description_en,
              'ar' => $request->description_ar,
      ];
      $category->update([
         
           'name' => '',
           'description' => json_encode($desc, JSON_UNESCAPED_UNICODE),

      ]);

      // Add Image to relation

      return redirect()->route('admin.categories.index')
      ->with('msg', 'Category Updated Successfully')
      ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {   
       $category->delete();
       return redirect()->route('admin.categories.index')
      ->with('msg', 'Category Deleted Successfully')
      ->with('type', 'danger');

    }
}
