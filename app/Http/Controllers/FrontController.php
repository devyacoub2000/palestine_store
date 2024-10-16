<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use App\Models\Service;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
class FrontController extends Controller
{
    
      public function index() {
           $categories = Category::all();
           $carts = Cart::where('user_id', Auth::id())->latest('id')->get();
           return view('front.index', compact('categories', 'carts'));
        }

      public function about () {
         $teams   =   Team::latest('id')->paginate(3);
         $service =   Service::latest('id')->paginate(3);
         $carts = Cart::where('user_id', Auth::id())->latest('id')->get();

         return view('front.about', compact('teams', 'service', 'carts'));
      }

      public function products () {
         $products = Product::latest('id')->paginate(9);
         $carts = Cart::where('user_id', Auth::id())->latest('id')->get();

          return view('front.products', compact('products', 'carts'));
      }

      public function contact () {
        $carts = Cart::where('user_id', Auth::id())->latest('id')->get();
         return view('front.contact', compact('carts'));
      }

      public function category ($id) {
         $category = Category::findOrFail($id);
         $products = $category->products()->latest('id')->paginate(9);
         $carts = Cart::where('user_id', Auth::id())->latest('id')->get();

         return view('front.category', compact('category', 'products', 'carts'));
      }

      public function single_product($id) {
         $product = Product::findOrFail($id);
         $carts = Cart::where('user_id', Auth::id())->latest('id')->get();

         return view('front.single-product', compact('product', 'carts'));
      }






}
