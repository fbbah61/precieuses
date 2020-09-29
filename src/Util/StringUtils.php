<?php


namespace App\Util;


class StringUtils
{
    static function randomAlphanumeric($limit) {
        return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
    }

    static function random6Alphanumeric() {
        return StringUtils::randomAlphanumeric(6);
    }

    static function random2CharsHex() {
        $int = rand(0, 255);
        $hex = ''.dechex($int);
        if(1 === strlen($hex)) $hex = '0'.$hex;
        return $hex;
    }

    static function randomCode($charsLength, $digitsLength) {
        $chars = "";
        while (strlen($chars) < $charsLength) $chars = $chars . str_replace("O", "A", chr(rand(65,90)));
        $digits = "";
        while (strlen($digits) < $digitsLength) $digits = $digits . rand(0, 9);

        return $chars . $digits;
    }

    static function randomCartCode(): string {
        return self::randomCode(3, 0) . '-' . self::randomCode(0, 2) . '-' . self::randomCode(3, 0);
    }

    static function removeExtraWhitespace($string): string {
        if (!$string) return "";
        while (strpos($string, "  ")) $string = str_replace("  ", " ", $string);
        return $string;
    }

    static function extractDigits($string): string {
        if (!$string) return "";
        return preg_replace('/[^0-9]/', '', $string);
    }
}