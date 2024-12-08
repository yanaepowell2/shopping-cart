@extends('app')

@section('title', 'Products')

@section('content')
  <h2>Our Products</h2>
  <p>Browse through our collection of crochet items and plushies!</p>
  <div class="row">
    @foreach($products as $product)
      <div class="col-md-4">
        <div class="card">
          <img src="{{ $product->image }}" class="card-img-top" alt="{{ $product->name }}">
          <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">{{ $product->description }}</p>
            <a href="/products/{{ $product->id }}" class="btn btn-primary">View Details</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
@endsection
