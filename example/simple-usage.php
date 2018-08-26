<?php

use Novomirskoy\Pipeline\Pipeline;

require_once __DIR__ . '/../vendor/autoload.php';

$pipeline = (new Pipeline())->pipe(function ($payload) {
    return $payload * 10;
});

$result = $pipeline(1);

echo 'Result ' . $result . PHP_EOL;
