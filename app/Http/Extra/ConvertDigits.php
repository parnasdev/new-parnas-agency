<?php


namespace App\Http\Extra;


trait ConvertDigits
{
    public function convertEn($string) {
        $newNumbers = range(0, 9);
        $persian = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
        return str_replace($persian, $newNumbers, $string);
    }

    public function convertFa($string) {
        $newNumbers = range(0, 9);
        $persian = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
        return str_replace($newNumbers,$persian, $string);
    }
}
