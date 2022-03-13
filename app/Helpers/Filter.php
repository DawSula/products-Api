<?php

namespace App\Helpers;

class Filter
{
    public function formatData(string $str)
    {
        $arr = trim($str);
        $arr = explode(" ", $arr);
        $newArr = [];
        foreach ($arr as $value) {
            if ($value != "") {
                $newArr[] = $value;
            }
        }
        $formated = implode(' ', $newArr);
        $formated = ucfirst($formated);

        return $formated;
    }
}
