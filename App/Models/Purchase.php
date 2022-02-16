<?php

namespace App\Models;

class Purchase {

    public $user_id;
    public $id;
    public $book_id;
    public function __construct($id,$user_id,$book_id)
    {
        $this->id = $id;
        $this->user_id = $user_id;
        $this->book_id = $book_id;
    }
}
