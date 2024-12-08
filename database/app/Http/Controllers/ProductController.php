<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::list();
        return view('Products', compact('products'));
    }

    public function show($id)
    {
        $product = Product::get($id);
        if (empty($product)) {
            abort(404, 'Product not found');
        }
        return view('product_detail', compact('product'));
    }
}
