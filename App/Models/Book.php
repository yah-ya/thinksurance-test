<?php

namespace App\Models;

class Book{


    public $id;
    public $title;
    public $price;

    public function __construct($id,$title,$price)
    {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
    }
}
