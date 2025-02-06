<?php

use Alangiacomin\PhpUtils\DateTime;

uses()->group('DateTime');

test('null', function () {
    DateTime::now(null);
})->throws(TypeError::class);

test('empty', function () {
    expect(DateTime::now(''))->toBeEmpty();
});

test('not set', function () {
    $result = DateTime::now();
    expect($result)->toBeString()
        ->and(
            DateTime::createFromFormat('Y-m-d H:i:s.u', $result)
        )->not->toBeFalse();
});

test('custom set', function () {
    $format = 'd/m/Y H:i';
    $result = DateTime::now($format);
    expect($result)->toBeString()
        ->and(
            DateTime::createFromFormat($format, $result)
        )->not->toBeFalse();
});
