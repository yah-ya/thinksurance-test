<?php
namespace App\Repository;

use App\Models\Person;

class PersonResource{
    public static function all(Person $person){
        return [
            'First Name'=>$person->firstName,
            "Last Name"=> $person->lastName,
            "Birth Day"=> $person->birthday,
            "Address" => $person->address,
            "Phone Number" => $person->phoneNumber
        ];
    }
}
