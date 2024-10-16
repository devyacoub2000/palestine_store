<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    
    public function __construct() {
        return $this->middleware('auth');
    }  
    public function store_cart(Request $request, $id) {

        $product = Product::findOrFail($id); 

        if(!$product || $product->quantity < $request->quantity) {
          
               return redirect()->route('front.single_product', $id)
               ->with('msg', 'Product not Available in desired quantity.')
               ->with('type', 'danger');
        }

        // Check if The Products is already in the cart for the user 

        $cartItem = Cart::where('user_id', auth()->user()->id)
        ->where('product_id', $id)
        ->first();

        if($cartItem) {
            // update the existing cart item (increase quantity)
            $cartItem->quantity += $request->quantity;
            $cartItem->total = $cartItem->quantity * $cartItem->price;
            $cartItem->save();
        } else {
            // Add new product to cart 
            Cart::create([
               'user_id' => auth()->user()->id,
               'product_id' => $product->id,
               'price' => $product->price,
               'quantity' => $request->quantity,
               'total' => $product->price * $request->quantity,
            ]);
        }

        // Decrease quantity Product 

        $product->quantity -= $request->quantity;
        $product->save();

        return redirect()->route('front.single_product', $id)
               ->with('msg', 'Product Added To Cart')
               ->with('type', 'success');
  }

      public function mycart() {
          $carts = Cart::where('user_id', Auth::id())->latest('id')->get();
          return view('front.mycart', compact('carts'));
      }

      public function remove($id)  {
          $cart = Cart::findOrFail($id);
          $cart->delete();
          return redirect()->route('front.mycart',)
               ->with('msg', 'Product Deleted From To Cart')
               ->with('type', 'danger');
      }
















}










