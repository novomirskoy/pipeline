<?php

use Novomirskoy\Pipeline\Pipeline;
use Novomirskoy\Pipeline\StageInterface;

require_once __DIR__ . '/../vendor/autoload.php';

class TimesTwoStage implements StageInterface
{
    public function __invoke($payload)
    {
        return $payload * 2;
    }
}


class AddOneStage implements StageInterface
{
    public function __invoke($payload)
    {
        return $payload + 1;
    }
}

$pipeline = (new Pipeline())
    ->pipe(new TimesTwoStage())
    ->pipe(new AddOneStage())
;

$result = $pipeline->process(10);

echo 'Result ' . $result . PHP_EOL;
