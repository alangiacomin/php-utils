<?php

use Alangiacomin\PhpUtils\Guid;

uses()->group('Guid');

test('new value is string', function () {
    expect(Guid::newGuid())->toBeString();
});

test('is valid should return true', function ($guid) {
    expect(Guid::isValid($guid))->toBeTrue();
})->with('guid.valid');

test('is valid should return false', function ($guid) {
    expect(Guid::isValid($guid))->toBeFalse();
})->with('guid.wrong');
