<?php
namespace App\Models;

use Illuminate\Support\Facades\DB;

class Product
{
    public static function add($sku, $name, $description, $price, $image)
    {
        $params = [
            $sku,
            $name,
            $description,
            $price,
            $image
        ];
        $sql = "INSERT INTO products(sku, name, description, price, image) VALUES(?, ?, ?, ?, ?)";
        try {
            DB::insert($sql, $params);
            $rs = true;
        } catch (\Illuminate\Database\QueryException $e) {
            $rs = false;
        }
        return $rs;
    }

    public static function list()
    {
        $sql = "SELECT * FROM products";
        try {
            $rs = DB::select($sql);
        } catch (\Illuminate\Database\QueryException $e) {
            $rs = [];
        }
        return $rs;
    }

    public static function get($product_id)
    {
        $params = [$product_id];
        $sql = "SELECT * FROM products WHERE id = ?";
        try {
            $rs = DB::select($sql, $params);
        } catch (\Illuminate\Database\QueryException $e) {
            $rs = [];
        }
        return $rs;
    }
}
