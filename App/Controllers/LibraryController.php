<?php
class LibraryController{

    private $service = null;
    public function __construct()
    {
        // ToDo : Separate Library Service into Users Service And Books Service And Purchase Service
        // Because of limited functionality , i just put all those service in one file.
        $this->service  = new LibraryServices();
    }

    public function getBooks()
    {
        $out = [];
        foreach($this->service->getAllBooks() as $book){
            $book = new \App\Models\Book($book['id'],$book['title'],$book['price']);
            $out[] = \App\Resources\BookResource::all($book);
        }
        return $out;
    }

    public function getUsers()
    {
        $out = [];
        foreach($this->service->getAllUsers() as $user){
            $user = new \App\Models\User($user['id'],$user['name'],$user['last_name']);
            $out[] = \App\Resources\UserResource::all($user);
        }
        return $out;
    }

    public function getAllUserPurchaces(\App\Models\User $user)
    {
        $out = [];
        foreach($this->service->getAllUserPurchaces($user) as $pr){;
            $purchase = new \App\Models\Purchase($pr['id'],$pr['user_id'],$pr['book_id']);
            $out[] = \App\Resources\PurchaseResource::all($purchase);
        }
        return $out;
    }
}
