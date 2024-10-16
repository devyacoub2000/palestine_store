<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{  
     public function __construct() {
          return $this->middleware('auth');
     }
     
     public function store_rate(Request $request, $id) {
           
            $request->validate([
                 'star' => 'required|integer|between:1,5',
                 'comment' => 'nullable'
            ]);

            Review::create([
                'product_id' => $id,
                'user_id' =>  auth()->id(),
                'star' =>    $request->star,
                'comment' => $request->comment??'',
                'status' => $request->status ? false : true,
            ]); 

            return redirect()->route('front.single_product', $id)
            ->with('msg', 'Add Rate Successfully')
            ->with('type', 'success');

     }


}
