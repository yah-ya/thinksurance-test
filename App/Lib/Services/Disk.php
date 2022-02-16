<?php
namespace App\Lib\Services;

use App\Lib\Interfaces\FileSystemInterface;

class Disk implements FileSystemInterface
{

    public function listFiles($path = 'public/'): bool|array
    {
        return array_filter(scandir($path), function($item) {
            return $item[0] !== '.';
        });
    }

    public function read(string $path): bool|string
    {
         return file_get_contents($path);
    }

    public function write($path,string $content): bool|string
    {
        $filename = $path.rand(0,9999).time().'.json';
        try{
            $writer = fopen($filename,'w');
            fwrite($writer, $content);
            fclose($writer);
        } catch (\Exception $exception) {
            print $exception->getMessage();
            return false;
        }
        return $filename;
    }

    public function remove($path):bool
    {
        unset($path);
        return true;
    }

}
