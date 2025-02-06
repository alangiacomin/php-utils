<?php

namespace Alangiacomin\PhpUtils;

class ArrayUtility
{
    /**
     * Determines whether any element of a sequence satisfies a condition.
     *
     * @param  array     $elements   Array whose elements to apply the predicate to.
     * @param  callable  $predicate  A function to test each element for a condition.
     * @return bool True if the source sequence is not empty and at least one of its elements passes the test in the
     *                               specified predicate; otherwise, false.
     */
    static function any(array $elements, callable $predicate): bool
    {
        foreach ($elements as $e) {
            if ($predicate($e)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determines whether all elements of a sequence satisfy a condition.
     *
     * @param  array     $elements   Array that contains the elements to apply the predicate to.
     * @param  callable  $predicate  A function to test each element for a condition.
     * @return bool True if every element of the source sequence passes the test in the specified predicate, or if the
     *                               sequence is empty; otherwise, false.
     */
    static function all(array $elements, callable $predicate): bool
    {
        foreach ($elements as $e) {
            if (!$predicate($e)) {
                return false;
            }
        }

        return true;
    }
}
