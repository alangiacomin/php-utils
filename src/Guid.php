<?php

namespace Alangiacomin\PhpUtils;

class Guid
{
    static function newGuid(): string
    {
        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }

    static function isValid(String $guid): bool
    {
        return preg_match("/^[A-F0-9]{8}-[A-F0-9]{4}-[A-F0-9]{4}-[A-F0-9]{4}-[A-F0-9]{12}$/i", $guid) == 1
            || preg_match("/^[A-F0-9]{32}$/i", $guid) == 1;
    }
}
