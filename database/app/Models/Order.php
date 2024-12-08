<?php
namespace App\Models;

use Illuminate\Support\Facades\DB;

class Order
{
    public static function create($user_id, $total)
    {
        $params = [
            $user_id,
            $total
        ];
        $sql = "INSERT INTO orders(user_id, total) VALUES(?, ?)";
        try {
            DB::insert($sql, $params);
            $rs = true;
        } catch (\Illuminate\Database\QueryException $e) {
            $rs = false;
        }
        return $rs;
    }

    public static function list($user_id)
    {
        $params = [$user_id];
        $sql = "SELECT * FROM orders WHERE user_id = ?";
        try {
            $rs = DB::select($sql, $params);
        } catch (\Illuminate\Database\QueryException $e) {
            $rs = [];
        }
        return $rs;
    }
}
