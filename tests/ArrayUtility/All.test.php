<?php

use Alangiacomin\PhpUtils\ArrayUtility;

uses()->group('ArrayUtility');

test('elements null', function () {
    /** @noinspection PhpParamsInspection */
    ArrayUtility::all(null, fn($e) => true);
})->throws(TypeError::class);

test('elements not array', function () {
    /** @noinspection PhpParamsInspection */
    ArrayUtility::all("string", fn($e) => true);
})->throws(TypeError::class);

test('predicate null', function () {
    /** @noinspection PhpParamsInspection */
    ArrayUtility::all([], null);
})->throws(TypeError::class);

test('predicate not array', function () {
    /** @noinspection PhpParamsInspection */
    ArrayUtility::all([], "string");
})->throws(TypeError::class);

test('empty elements', function () {
    $elements = [];
    $predicate = fn($e) => $e < 10;
    expect(ArrayUtility::all($elements, $predicate))->toBeTrue();
});

test('all elements satisfy condition', function () {
    $elements = [1, 2, 3, 4, 5];
    $predicate = fn($e) => $e < 10;
    expect(ArrayUtility::all($elements, $predicate))->toBeTrue();
});

test('some elements satisfy condition', function () {
    $elements = [1, 2, 3, 4, 5];
    $predicate = fn($e) => $e < 4;
    expect(ArrayUtility::all($elements, $predicate))->toBeFalse();
});

test('one element satisfy condition', function () {
    $elements = [1, 2, 3, 4, 5];
    $predicate = fn($e) => $e < 2;
    expect(ArrayUtility::all($elements, $predicate))->toBeFalse();
});

test('no elements satisfy condition', function () {
    $elements = [1, 2, 3, 4, 5];
    $predicate = fn($e) => $e < 0;
    expect(ArrayUtility::all($elements, $predicate))->toBeFalse();
});
