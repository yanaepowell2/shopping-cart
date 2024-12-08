<?php
namespace App\Models;

use Illuminate\Support\Facades\DB;

class Cart
{
    public static function create($user_id)
    {
        $params = [$user_id];
        $sql = "INSERT INTO carts(user_id) VALUES(?)";
        try {
            DB::insert($sql, $params);
            $rs = true;
        } catch (\Illuminate\Database\QueryException $e) {
            $rs = false;
        }
        return $rs;
    }

    public static function getByUser($user_id)
    {
        $params = [$user_id];
        $sql = "SELECT * FROM carts WHERE user_id = ?";
        try {
            $rs = DB::select($sql, $params);
        } catch (\Illuminate\Database\QueryException $e) {
            $rs = [];
        }
        return $rs;
    }
}
