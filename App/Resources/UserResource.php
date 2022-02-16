<?php
namespace App\Resources;

use App\Models\User;

class UserResource{
    public static function all(User $user){
        return [
            'id'=>$user->id,
            "first_name"=> $user->name,
            "last_name"=> $user->last_name,
        ];
    }
}
