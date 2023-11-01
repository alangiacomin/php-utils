<?php

use Alangiacomin\PhpUtils\StringUtility;

uses()->group('StringUtility');

test('null string', function () {
    StringUtility::to_kebab_case(null);
})->throws(TypeError::class);

test('lowcase word', function () {
    $ret = StringUtility::to_kebab_case("lowcaseword");
    expect($ret)->toBe("lowcaseword");
});

test('lowcase words', function () {
    $ret = StringUtility::to_kebab_case("lowcase words");
    expect($ret)->toBe("lowcase-words");
});

test('upcase word', function () {
    $ret = StringUtility::to_kebab_case("UPCASEWORD");
    expect($ret)->toBe("upcaseword");
});

test('kebab', function () {
    $ret = StringUtility::to_kebab_case("already-kebab");
    expect($ret)->toBe("already-kebab");
});

test('space separator', function () {
    $ret = StringUtility::to_kebab_case("WORDS WITH SPACES");
    expect($ret)->toBe("words-with-spaces");
});

test('slash separator', function () {
    $ret = StringUtility::to_kebab_case("WORDS/WITH/SLASH");
    expect($ret)->toBe("words-with-slash");
});

test('backslash separator', function () {
    $ret = StringUtility::to_kebab_case("WORDS\\WITH\\BACKSLASH");
    expect($ret)->toBe("words-with-backslash");
});

test('space slash separator', function () {
    $ret = StringUtility::to_kebab_case("WORDS WITH/SPACES/AND SLASH");
    expect($ret)->toBe("words-with-spaces-and-slash");
});

test('space backslash separator', function () {
    $ret = StringUtility::to_kebab_case("WORDS WITH\\SPACES\\AND BACKSLASH");
    expect($ret)->toBe("words-with-spaces-and-backslash");
});

test('slash backslash separator', function () {
    $ret = StringUtility::to_kebab_case("WORDS\\WITH/SLASH/AND\\BACKSLASH");
    expect($ret)->toBe("words-with-slash-and-backslash");
});

test('space slash backslash separator', function () {
    $ret = StringUtility::to_kebab_case("WORDS WITH/SPACES\\AND SLASH\\AND/BACKSLASH");
    expect($ret)->toBe("words-with-spaces-and-slash-and-backslash");
});
