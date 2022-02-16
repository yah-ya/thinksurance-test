<?php

namespace App\Models;

class Person{

    public string $firstName ;
    public string $lastName;
    public string $birthday;
    public string $address;
    public string $phoneNumber;

    public function __construct(string $firstName, string $lastName, string $birthday, string $address, string $phoneNumber)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthday = $birthday;
        $this->address = $address;
        $this->phoneNumber = $phoneNumber;
    }


}
