<?php
require "vendor/autoload.php";
$controller = new \App\Controllers\PersonController();
$files = $controller->listFiles();

// if still no files there , create one
if(empty($files)){
    $files = $controller->createJsonFile();
}
// create person objects
$persons = [];
foreach($files as $file) {
    $contents = $controller->getFileData('public/' . $file);
    $persons[] = $controller->createPerson($contents);
}

//Output To Console :
foreach($persons as $person)
{
    print_r(\App\Repository\PersonResource::all($person));
}



