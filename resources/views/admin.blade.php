@extends('app')

@section('content')
<div class="row">
    <h3>Add Product (Admin)</h3>
</div>

<form action="/admin/products" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-3 mb-3">
            <label for="sku">SKU</label>
            <input type="text" class="form-control" id="sku" name="sku" required>
        </div>
        <div class="col-md-4 mb-3">
            <label for="name">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="col-md-5 mb-3">
            <label for="description">Product Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3 mb-3">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" step="0.01" required>
        </div>
        <div class="col-md-3 mb-3">
            <label for="image">Product Image</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="col-md-3 mb-3">
            <label for="sku">SKU</label>
            <input type="text" class="form-control" id="sku" name="sku" required>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Add Product</button>
</form>

<br/>

<table class="table table-striped table-hover table-sm">
    <thead class="thead-dark">
        <tr class="d-flex">
            <th scope="col" class="col-2">Product Name</th>
            <th scope="col" class="col-3">Product Desc</th>
            <th scope="col" class="col-2">Price</th>
            <th scope="col" class="col-2">Image</th>
            <th scope="col" class="col-2" style="text-align:center">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
        <tr class="d-flex">
            <td class="col-2">{{$product->name}}</td>
            <td class="col-3">{{$product->description}}</td>
            <td class="col-2">${{$product->price}}</td>
            <td class="col-2">
                <img src="{{ asset('storage/'.$product->image) }}" alt="product image" style="max-height: 50px;">
            </td>
            <td class="col-2" style="text-align:center">
                <a href="/admin/products/{{ $product->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                <form action="/admin/products/{{ $product->id }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection