<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItem;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::getByUser(auth()->id());
        $items = $cart ? CartItem::list($cart[0]->id) : [];
        return view('cart', compact('items'));
    }

    public function store(Request $request)
    {
        $cart = Cart::getByUser(auth()->id());
        if (empty($cart)) {
            Cart::create(auth()->id());
            $cart = Cart::getByUser(auth()->id());
        }

        $cart_id = $cart[0]->id;
        $product_id = $request->input('product_id');
        $quantity = $request->input('quantity', 1);
        $price = $request->input('price');

        CartItem::add($cart_id, $product_id, $quantity, $price);
        return redirect()->route('cart.index')->with('success', 'Item added to cart');
    }

    public function update(Request $request)
    {
        $cart_item_id = $request->input('cart_item_id');
        $quantity = $request->input('quantity');

        if (empty($cart_item_id) || empty($quantity)) {
            return redirect()->route('cart.index')->with('error', 'Invalid input.');
        }

        try {
            $cart_item = CartItem::get($cart_item_id);

            if (!$cart_item) {
                return redirect()->route('cart.index')->with('error', 'Cart item not found.');
            }

            if ($quantity <= 0) {
                CartItem::delete($cart_item_id);
                return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
            }

            CartItem::update($cart_item_id, $quantity);
            return redirect()->route('cart.index')->with('success', 'Cart item updated successfully.');
        } catch (\Exception $e) {
            return redirect()->route('cart.index')->with('error', 'An error occurred while updating the cart.');
        }
    }

    public function destroy($id)
    {
        CartItem::delete($id);
        return redirect()->route('cart.index')->with('success', 'Item removed from cart');
    }
}
