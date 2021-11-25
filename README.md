# PHP Utils

PHP Utilities

## Requirements

- PHP >= 8

## Installation

```
composer require alangiacomin/php-utils
```

## Usage

### DateTime

Retrieve and format datetime with microseconds precision

```php
$d = DateTime::now();
// $d = "2021-11-25 21:28:57.654789"
```

### Guid

Get a new guid

```php
$g = Guid::newGuid();
// $g = "C8E067BA-7F7C-4411-B8EF-7ED357EA18FD"
```

Check if guid is valid

```php
$v = Guid::isValid("C8E067BA-7F7C-4411-B8EF-7ED357EA18FD");
// $v = true
```