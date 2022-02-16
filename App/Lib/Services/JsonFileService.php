<?php
namespace App\Lib\Services;

use App\Lib\Helpers\Helpers;

class JsonFileService
{

    private $content;
    private $disk;
    public function __construct()
    {
        $this->disk = new Disk();
    }

    public function setContent(string $content): static
    {
        $this->content = $content;
        return $this;
    }

    public function read(string $filePath)
    {
        return json_decode($this->disk->read($filePath));
    }

    /**
     * @throws \Exception
     */
    public function save(string $path='public/'): bool
    {
        if(empty($this->content)){
            throw new \Exception('Content is empty');
        }
        return $this->disk->write($path ,$this->content);
    }



}
