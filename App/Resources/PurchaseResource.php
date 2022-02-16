<?php
namespace App\Resources;


use App\Models\Purchase;

class PurchaseResource{
    public static function all(Purchase $user){
        return [
            'id'=>$user->id,
            "book_id"=> $user->book_id,
            "user_id"=> $user->user_id,
        ];
    }
}
