<?php
namespace App\DB;
require "vendor/autoload.php";
use App\Lib\Helpers\Helpers;

new Migration();
class Migration
{

     public function __construct(){
        $this->createUsersTable();
        $this->createBooksTable();
        $this->createPurchacesTable();

        $this->seed();
    }

    private function createUsersTable()
    {
        $queryBuilder = new \App\Lib\Services\SQLiteQueryBuilder();
        $query = $queryBuilder->createTable("users",
            [
                "id INTEGER PRIMARY KEY",
                "name TEXT NOT NULL",
                "last_name TEXT not null"
            ]);

        $sqlite = new \App\Lib\Services\SQLite();
        $sqlite->connect();
        $sqlite->query($query);
    }

    private function createBooksTable()
    {
        $queryBuilder = new \App\Lib\Services\SQLiteQueryBuilder();
        $query = $queryBuilder->createTable("books",
            [
                "id INTEGER PRIMARY KEY",
                "title TEXT NOT NULL",
                "price FLOAT NOT NULL"
            ]);

        $sqlite = new \App\Lib\Services\SQLite();
        $sqlite->connect();
        $sqlite->query($query);
    }

    private function createPurchacesTable()
    {
        $queryBuilder = new \App\Lib\Services\SQLiteQueryBuilder();
        $query = $queryBuilder->createTable("purchaces",
            [
                "id INTEGER PRIMARY KEY",
                "user_id INTEGER NOT NULL",
                "book_id INTEGER NOT NULL",
            ]);

        $sqlite = new \App\Lib\Services\SQLite();
        $sqlite->connect();
        $sqlite->query($query);
    }

    private function seed($number=100)
    {
        $queryBuilder = new \App\Lib\Services\SQLiteQueryBuilder();
        $sqlite = new \App\Lib\Services\SQLite();
        $sqlite->connect();
        $sqlite->query($queryBuilder->table('users')->truncate());
        $sqlite->query($queryBuilder->table('books')->truncate());
        $sqlite->query($queryBuilder->table('purchaces')->truncate());

        for($i=0;$i<$number;$i++){
            $users[] = [$i+1,Helpers::generateRandomString(),Helpers::generateRandomString()];
            $books[] = [$i+1,Helpers::generateRandomString(),rand(100,999999)];
            $purchaces[] = [$i+1,$users[rand(0,$i)][0] , $books[rand(0,$i)][0]];
        }

        $sqlite->query($queryBuilder->table('users')->insert($users));
        $sqlite->query($queryBuilder->table('books')->insert($books));
        $sqlite->query($queryBuilder->table('purchaces')->insert($purchaces));

    }

}
