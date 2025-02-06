<?php

use Alangiacomin\PhpUtils\Guid;

uses()->group('Guid');

test('new value is string', function () {
    expect(Guid::newGuid())->toBeString();
});

test('newGuid generates unique values', function () {
    $guids = [];
    for ($i = 0; $i < 10000; $i++) {
        $guid = Guid::newGuid();
        expect(in_array($guid, $guids))->toBeFalse(); // Controlla che il GUID non sia già stato generato
        $guids[] = $guid;
    }
});

test('is valid should return true', function ($guid) {
    expect(Guid::isValid($guid))->toBeTrue();
})->with('guid.valid');

test('is valid should return false', function ($guid) {
    expect(Guid::isValid($guid))->toBeFalse();
})->with('guid.wrong');
