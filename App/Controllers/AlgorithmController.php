<?php
namespace App\Controllers;
class AlgorithmController
{
    public function createOneMilionRecords():array
    {
        $data = [];
        for($i=0;$i<1000000;$i++){
            $data[] = rand(0,999999);
        }
        return $data;
    }
}
