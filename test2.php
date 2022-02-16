<?php
require "vendor/autoload.php";

if (defined('STDIN')) {
    $num = (int) $argv[1];
} else {
    $num = (int) $_GET['num'];
}

if(empty($num) || !is_int($num)){
    die("Please Specify number in GET num variable as INT".PHP_EOL);
}
$algorithmController = new \App\Controllers\AlgorithmController();
$data = $algorithmController->createOneMilionRecords();
sort($data);

$binarySearch = new \App\Lib\Helpers\BinarySearch();
print $binarySearch->search($num,$data).PHP_EOL;




