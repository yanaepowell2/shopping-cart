@extends('app')

@section('title', 'Cart')

@section('content')
  <h2>Your Cart</h2>
  @if(count($cartItems) > 0)
    <table class="table">
      <thead>
        <tr>
          <th>Product</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Total</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($cartItems as $item)
          <tr>
            <td>{{ $item->product->name }}</td>
            <td>{{ $item->quantity }}</td>
            <td>${{ $item->price }}</td>
            <td>${{ $item->quantity * $item->price }}</td>
            <td>
              <form action="/cart/remove/{{ $item->id }}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger">Remove</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    <a href="/checkout" class="btn btn-success">Proceed to Checkout</a>
  @else
    <p>Your cart is empty.</p>
  @endif
@endsection