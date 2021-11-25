<?php

namespace Alangiacomin\PhpUtils;

use DateTime as GlobalDateTime;

class DateTime extends GlobalDateTime
{
    static function now($format = "Y-m-d H:i:s.u"): string
    {
        $datetime = DateTime::createFromFormat('U.u', microtime(true));
        $string = $datetime->format($format);

        return $string;
    }
}
