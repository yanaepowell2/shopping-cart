<?php
namespace App\Models;

use Illuminate\Support\Facades\DB;

class PaymentMethod
{
    public static function add($user_id, $card_number, $card_type, $expiry_date)
    {
        $params = [
            $user_id,
            $card_number,
            $card_type,
            $expiry_date
        ];
        $sql = "INSERT INTO payment_methods(user_id, card_number, card_type, expiry_date) VALUES(?, ?, ?, ?)";
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
        $sql = "SELECT * FROM payment_methods WHERE user_id = ?";
        try {
            $rs = DB::select($sql, $params);
        } catch (\Illuminate\Database\QueryException $e) {
            $rs = [];
        }
        return $rs;
    }
}
