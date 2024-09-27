<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\File;


class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $teams = Team::latest('id')->paginate(); 
        return view('admin.team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {    
         $team = new Team();
         return view('admin.team.create', compact('team'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
         
         $request->validate([
             'name_en'    => 'required',
             'name_ar'    => 'required',
             'special_en' => 'required',
             'special_ar' => 'required',
             'image'      => 'required|image'
         ]);

         $special = [
              'en' => $request->special_en,
              'ar' => $request->special_ar, 
         ]; 

         $team = Team::create([
            'name' => '',
            'special' => json_encode($special, JSON_UNESCAPED_UNICODE),
         ]);

         $img = $request->File('image');
         $img_name = rand().time().$img->getClientOriginalName();
         $img->move(public_path('images'), $img_name);
         $team->image()->create([
            'path' => $img_name, 
         ]);

          return redirect()->route('admin.team.index')
              ->with('msg', 'Team Added Successfully')
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
    public function edit(Team $team)
    {
        return view('admin.team.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Team $team)
    {
        $request->validate([
             'name_en' => 'required',
             'name_ar' => 'required',
             'special_en' => 'required',
             'special_ar' => 'required',
         ]);

         $special = [
              'en' => $request->special_en,
              'ar' => $request->special_ar, 
         ]; 

         $team->update([
            'name' => '',
            'special' => json_encode($special, JSON_UNESCAPED_UNICODE),
         ]);
         
         if ($request->hasFile('image')) {
             if($team->image->path) {
                   File::delete(public_path('images', $team->image->path));
             }
             $team->image()->delete(); 
             $img = $request->File('image');
             $img_name = rand().time().$img->getClientOriginalName();
             $img->move(public_path('images'), $img_name);
             $team->image()->create([
                'path' => $img_name, 
             ]);

         }
        

          return redirect()->route('admin.team.index')
              ->with('msg', 'Team update Successfully')
              ->with('type', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
       $team->delete();
       return redirect()->route('admin.team.index')
      ->with('msg', 'Team Deleted Successfully')
      ->with('type', 'danger');
        
    }
}
