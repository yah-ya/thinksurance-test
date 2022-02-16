<?php
namespace App\Lib\Interfaces;

interface FileSystemInterface
{
    public function write(string $path , string $content);
    public function read(string $path);
    public function listFiles(string $path):bool|array;
    public function remove(string $path):bool;
}
