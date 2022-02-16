<?php
namespace App\Resources;

use App\Models\Book;

class BookResource{

    public static function all(Book $book){
        return [
            'id'=>$book->id,
            "title"=> $book->title,
        ];
    }
}
