<?php

namespace Alangiacomin\PhpUtils;

class StringUtility
{
    static function abbreviation(string $string, int $numChars = 1, bool $addSpaces = true): string
    {
        $tokens = explode(' ', $string);

        return array_reduce(
            $tokens,
            function ($initial, $token) use ($numChars, $addSpaces) {
                $abbr = substr($token, 0, min(strlen($token), $numChars));
                if ($abbr != $token) {
                    $abbr .= '.';
                }

                return $addSpaces
                    ? trim(sprintf('%s %s', $initial, $abbr))
                    : sprintf('%s%s', $initial, $abbr);
            },
            ''
        );
    }
}
