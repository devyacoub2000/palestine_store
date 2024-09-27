<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $service = Service::latest('id')->paginate(10);
        return view('admin.service.index', compact('service'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            
             'name_en' => 'required',
             'name_ar' => 'required',
             'body_en' => 'required',
             'body_ar' => 'required',
             'image'   => 'required|image',
        ]);


        $service = Service::create([
             'name' => '',
             'body' => '',         
        ]);

        $img = $request->file('image');
        $img_name = rand().time().$img->getClientOriginalName();
        $img->move(public_path('images'), $img_name);
        
        $service->image()->create([
             'path' => $img_name,
        ]);
        return redirect()->route('admin.service.index')
      ->with('msg', 'Service Added Successfully')
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
    public function edit(Service $service)
    {
        return view('admin.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, service $service)
    {
         $request->validate([ 
             'name_en' => 'required',
             'name_ar' => 'required',
        ]);

        $service->update([
             'name' => '',
             'body' => '',         
        ]);
        
        if($request->hasFile('image')) {
            if($service->image) {
               File::delete(public_path('images/'.$service->image->path));
             }
            $service->image()->delete();
            $img = $request->file('image');
            $img_name = rand().time().$img->getClientOriginalName();
            $img->move(public_path('images'), $img_name);

            $service->image()->create([
                'path' => $img_name,
            ]);

        }
   
         return redirect()->route('admin.service.index')
      ->with('msg', 'Service update Successfully')
      ->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
         $service->delete();
        
         return redirect()->route('admin.service.index')
        ->with('msg', 'Service Delete Successfully..')
        ->with('type', 'danger');
    }
}
