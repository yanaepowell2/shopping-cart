@extends('app')

@section('title', 'Products')

@section('content')
    <h2>Products</h2>
    <ul>
        @foreach ($products as $product)
            <li>{{ $product->name }} - ${{ $product->price }}</li>
        @endforeach
    </ul>
@endsection
