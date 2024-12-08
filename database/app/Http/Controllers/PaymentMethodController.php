<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $methods = PaymentMethod::list(auth()->id());
        return view('shop.payment_methods', compact('methods'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'card_number' => 'required|string|max:20',
            'card_type' => 'nullable|string|max:50',
            'expiry_date' => 'required|date',
        ]);

        PaymentMethod::add(auth()->id(), $validated['card_number'], $validated['card_type'], $validated['expiry_date']);
        return redirect()->route('payment-methods.index')->with('success', 'Payment method added');
    }
}
