<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function create()
    {
        return view('checkout');
    }

    public function store(Request $request)
    {
        $cart = Cart::getByUser(auth()->id());
        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty');
        }

        $cart_id = $cart[0]->id;
        $items = CartItem::list($cart_id);
        $total = array_reduce($items, fn($sum, $item) => $sum + ($item->quantity * $item->price), 0);

        Order::create(auth()->id(), $total);
        $order = Order::list(auth()->id());
        $order_id = end($order)->id;

        foreach ($items as $item) {
            OrderItem::add($order_id, $item->product_id, $item->quantity, $item->price);
        }

        // Clear the cart
        CartItem::delete($cart_id);

        return redirect()->route('orders.index')->with('success', 'Order placed successfully');
    }

    public function index()
    {
        $orders = Order::list(auth()->id());
        return view('shop.orders', compact('orders'));
    }
}
