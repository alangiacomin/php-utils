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

    static function to_kebab_case(string $text): string
    {
        foreach ([' ', '/', '\\'] as $separator)
        if(str_contains($text, $separator))
        {
            $tokens = [];
            foreach (explode($separator, $text) as $t)
            {
                $tokens[] = self::to_kebab_case($t);
            }
            return implode('-', $tokens);
        }

        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $text, $matches);
        $ret = $matches[0];
        foreach ($ret as &$match) {
            $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }
        return implode('-', $ret);
    }
}
