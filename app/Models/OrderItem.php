<?php
namespace App\Models;

use Illuminate\Support\Facades\DB;

class OrderItem
{
    public static function add($order_id, $product_id, $quantity, $price)
    {
        $params = [
            $order_id,
            $product_id,
            $quantity,
            $price
        ];
        $sql = "INSERT INTO order_items(order_id, product_id, quantity, price) VALUES(?, ?, ?, ?)";
        try {
            DB::insert($sql, $params);
            $rs = true;
        } catch (\Illuminate\Database\QueryException $e) {
            $rs = false;
        }
        return $rs;
    }
}
