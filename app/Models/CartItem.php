<?php
namespace App\Models;

use Illuminate\Support\Facades\DB;

class CartItem
{
    public static function add($cart_id, $product_id, $quantity, $price)
    {
        $params = [
            $cart_id,
            $product_id,
            $quantity,
            $price
        ];
        $sql = "INSERT INTO cart_items(cart_id, product_id, quantity, price) VALUES(?, ?, ?, ?)";
        try {
            DB::insert($sql, $params);
            $rs = true;
        } catch (\Illuminate\Database\QueryException $e) {
            $rs = false;
        }
        return $rs;
    }

    public static function list($cart_id)
    {
        $params = [$cart_id];
        $sql = "SELECT * FROM cart_items WHERE cart_id = ?";
        try {
            $rs = DB::select($sql, $params);
        } catch (\Illuminate\Database\QueryException $e) {
            $rs = [];
        }
        return $rs;
    }

    public static function delete($item_id)
    {
        $params = [$item_id];
        $sql = "DELETE FROM cart_items WHERE id = ?";
        try {
            DB::delete($sql, $params);
            $rs = true;
        } catch (\Illuminate\Database\QueryException $e) {
            $rs = false;
        }
        return $rs;
    }
}
