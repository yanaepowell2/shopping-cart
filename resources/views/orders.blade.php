@extends('app')

@section('title', 'Orders')

@section('content')
  <h2>Your Orders</h2>
  @if(count($orders) > 0)
    <table class="table">
      <thead>
        <tr>
          <th>Order ID</th>
          <th>Total</th>
          <th>Status</th>
          <th>Order Date</th>
        </tr>
      </thead>
      <tbody>
        @foreach($orders as $order)
          <tr>
            <td>{{ $order->id }}</td>
            <td>${{ $order->total }}</td>
            <td>{{ $order->status }}</td>
            <td>{{ $order->created_at }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  @else
    <p>You haven't placed any orders yet.</p>
  @endif
@endsection