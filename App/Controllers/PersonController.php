<?php

namespace App\Controllers;


use App\Lib\Helpers\Faker;
use App\Lib\Services\Disk;
use App\Lib\Services\JsonFileService;

class PersonController{
    /**
     * @throws \Exception
     */
    public function createJsonFile(): bool|string
    {
        $service = new JsonFileService();

        //Keys
        $keys = ["first name","last name","birthday","address","phone number"];

        $faker = new Faker();
        $fakeArray = $faker->generateFakeArray($keys);
        return $service->setContent(json_encode($fakeArray))->save();
    }

    public function listFiles(): bool|array
    {
        $disk = new Disk();
        return $disk->listFiles();
    }

    public function getFileData($filePath): bool|string
    {
        $disk = new Disk();
        return $disk->read($filePath);
    }

    public function createPerson($content): \App\Models\Person
    {
        $contents = json_decode($content);

        $newObject = new \App\Models\Person(
            $contents->{"first name"},
            $contents->{"last name"},
            $contents->{"birthday"},
            $contents->{"address"},
            $contents->{"phone number"}
        );
        return $newObject;
    }
}
