<?php
namespace App\Lib\Helpers;

class BinarySearch
{
    public function search(int $element, array $data): int
    {
        $begin = 0;
        $end = count($data) - 1;
        $prevBegin = $begin;
        $prevEnd = $end;
        while (true) {
            $position = round(($begin + $end) / 2);
            if (isset($data[$position])) {
                if ($data[$position] == $element) {
                    return (int)$position;
                }
                if ($data[$position] > $element) {
                    $end = floor(($begin + $end) / 2);
                } elseif ($data[$position] < $element) {
                    $begin = ceil(($begin + $end) / 2);
                }
            }
            if ($prevBegin == $begin && $prevEnd == $end) {
                return -1;
            }
            $prevBegin = $begin;
            $prevEnd = $end;
        }
    }
}
