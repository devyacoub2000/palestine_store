<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    
  
    public function create_order(Request $request) {
         $request->validate([
                'total' => 'required|numeric',
            ]);

    // Start a transaction to ensure data integrity
    \DB::transaction(function () use ($request) {
        // Create the order
        $order = Order::create([
            'user_id' => Auth::id(),
            'total' => $request->total,
        ]);

        // Get cart items for the authenticated user
        $carts = Cart::where('user_id', Auth::id())->get();

        // Loop through cart items to create order details
        foreach ($carts as $cart) {
            OrderDetail::create([
                'order_id' => $order->id,
                'user_id' => Auth::id(),
                'product_id' => $cart->product_id,
                'price' => $cart->product->price,
                'quantity' => $cart->quantity,
                'total' => $cart->total,
            ]);
        }

        // Optionally, clear the cart after creating the order
        Cart::where('user_id', Auth::id())->delete();
    });

    return redirect()->route('front.mycart')
    ->with('msg', 'Order placed successfully!')->with('type', 'success');

    }

    public function all_orders() {
        $orders = Order::latest('id')->paginate(10);
        return view('admin.order.all_orders', compact('orders'));
    }

    public function single_order($id) {
        $order = Order::findOrFail($id);
        return view('admin.order.single_order', compact('order'));
    }

}
