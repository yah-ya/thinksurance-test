<?php
require "vendor/autoload.php";

$libraryController = new LibraryController();

switch($_GET['route']) {
    case 'getAllUsers':
        print_r($libraryController->getUsers());
        break;
    case 'getAllBook':
        print_r($libraryController->getBooks());
        break;

    case 'getPurchaces':
       print_r($libraryController->getAllUserPurchaces($_GET['user_id']));
        break;
}


