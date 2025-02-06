<?php

namespace Alangiacomin\PhpUtils;

use DateTime as GlobalDateTime;

class DateTime extends GlobalDateTime
{
    static function now(string $format = "Y-m-d H:i:s.u"): string
    {
        $datetime = DateTime::createFromFormat('U.u', microtime(true));
        return $datetime->format($format);
    }
}
