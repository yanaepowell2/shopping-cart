<?php
namespace App\Models;

use Illuminate\Support\Facades\DB;

class Payment
{
    public static function add($order_id, $amount, $payment_method, $status, $transaction_id)
    {
        $params = [
            $order_id,
            $amount,
            $payment_method,
            $status,
            $transaction_id
        ];
        $sql = "INSERT INTO payments(order_id, amount, payment_method, status, transaction_id) VALUES(?, ?, ?, ?, ?)";
        try {
            DB::insert($sql, $params);
            $rs = true;
        } catch (\Illuminate\Database\QueryException $e) {
            $rs = false;
        }
        return $rs;
    }

    public static function list($order_id)
    {
        $params = [$order_id];
        $sql = "SELECT * FROM payments WHERE order_id = ?";
        try {
            $rs = DB::select($sql, $params);
        } catch (\Illuminate\Database\QueryException $e) {
            $rs = [];
        }
        return $rs;
    }
}
