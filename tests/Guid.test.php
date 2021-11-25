<?php

use Alangiacomin\PhpUtils\Guid;

test('new value is string', function () {
    expect(Guid::newGuid())->toBeString();
});

test('is valid shuold return true', function ($guid) {
    expect(Guid::isValid($guid))->toBeTrue();
})->with('validGuid');

test('is valid shuold return false', function ($guid) {
    expect(Guid::isValid($guid))->toBeFalse();
})->with('wrongGuid');
