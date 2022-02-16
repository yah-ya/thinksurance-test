<?php

namespace App\Models;

class User {

    public $name;
    public $id;
    public $last_name;
    public function __construct($id,$name,$last_name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->last_name = $last_name;
    }
}
