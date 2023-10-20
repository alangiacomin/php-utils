<?php

use Alangiacomin\PhpUtils\Path;

uses()->group('Path');

test('One path', function () {
    expect(Path::combine("first"))
        ->toBe("first");
});

test('Two paths', function () {
    expect(Path::combine("first", "second"))
        ->toBe("first".DIRECTORY_SEPARATOR."second");
});

test('Three paths', function () {
    expect(Path::combine("first", "second", "third"))
        ->toBe("first".DIRECTORY_SEPARATOR."second".DIRECTORY_SEPARATOR."third");
});

test('Four paths', function () {
    expect(Path::combine("first", "second", "third", "fourth"))
        ->toBe("first".DIRECTORY_SEPARATOR."second".DIRECTORY_SEPARATOR."third".DIRECTORY_SEPARATOR."fourth");
});
