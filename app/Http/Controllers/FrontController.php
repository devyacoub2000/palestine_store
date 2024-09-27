<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Service;
use App\Models\Category;
use App\Models\Product;

class FrontController extends Controller
{
    
      public function index() {
           $categories = Category::all();
           return view('front.index', compact('categories'));
        }

      public function about () {
         $teams   =   Team::latest('id')->paginate(3);
         $service =   Service::latest('id')->paginate(3);
         return view('front.about', compact('teams', 'service'));
      }

      public function products () {
         $products = Product::latest('id')->paginate(9);
         return view('front.products', compact('products'));
      }

      public function contact () {
         return view('front.contact');
      }

      public function category ($id) {
         $category = Category::findOrFail($id);
         $products = $category->products()->latest('id')->paginate(9);
         return view('front.category', compact('category', 'products'));
      }

      public function single_product($id) {
         $product = Product::findOrFail($id);
         return view('front.single-product', compact('product'));
      }






}
