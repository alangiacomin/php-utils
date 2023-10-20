<?php

namespace Alangiacomin\PhpUtils;

class Path
{
    public static function combine(string ...$paths): string
    {
        return join(DIRECTORY_SEPARATOR, $paths);
    }
}
