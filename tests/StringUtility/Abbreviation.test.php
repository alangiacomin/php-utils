<?php

use Alangiacomin\PhpUtils\StringUtility;

uses()->group('StringUtility');

test('null string', function () {
    StringUtility::abbreviation(null);
})->throws(TypeError::class);

test('default params one word', function () {
    $ret = StringUtility::abbreviation("First");
    expect($ret)->toBe("F.");
});

test('default params many words', function () {
    $ret = StringUtility::abbreviation("First Second Third");
    expect($ret)->toBe("F. S. T.");
});

test('many chars one word', function () {
    $ret = StringUtility::abbreviation("First", 2);
    expect($ret)->toBe("Fi.");
});

test('many chars many words', function () {
    $ret = StringUtility::abbreviation("First Second Third", 2);
    expect($ret)->toBe("Fi. Se. Th.");
});

test('all chars one word', function () {
    $ret = StringUtility::abbreviation("First", 5);
    expect($ret)->toBe("First");
});

test('too many chars many words', function () {
    $ret = StringUtility::abbreviation("First Second Third", 8);
    expect($ret)->toBe("First Second Third");
});

test('mixed chars many words', function () {
    $ret = StringUtility::abbreviation("One Two Three Four", 4);
    expect($ret)->toBe("One Two Thre. Four");
});

test('with spaces many words', function () {
    $ret = StringUtility::abbreviation("First Second Third");
    expect($ret)->toBe("F. S. T.");
});

test('without spaces many words', function () {
    $ret = StringUtility::abbreviation("First Second Third", 1, false);
    expect($ret)->toBe("F.S.T.");
});
