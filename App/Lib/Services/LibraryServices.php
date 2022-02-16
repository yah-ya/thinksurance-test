<?php
class LibraryServices
{
    private $pdo = null;
    public function __construct()
    {
        $this->pdo = new \App\Lib\Services\SQLite();
        $this->pdo->connect();
    }

    public function getAllBooks(): array
    {
        $queryBuilder = new \App\Lib\Services\SQLiteQueryBuilder();
        $allBooksQuery = $queryBuilder->table('books')->select('*')->get();
        return $this->pdo->fetchData($allBooksQuery);
    }

    public function getAllUsers(): array
    {
        $queryBuilder = new \App\Lib\Services\SQLiteQueryBuilder();
        $allUsersQuery = $queryBuilder->table('users')->select('*')->get();
        return $this->pdo->fetchData($allUsersQuery);
    }

    public function getAllUserPurchaces(\App\Models\User $user): array
    {
        $queryBuilder = new \App\Lib\Services\SQLiteQueryBuilder();
        $res = $queryBuilder
            ->table('purchaces')
            ->select('*')
            ->where('user_id='.$user->id)
            ->get();
        return $this->pdo->fetchData($res);
    }
}
