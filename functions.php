<?php

use Novomirskoy\Pipeline\Pipeline;
use Novomirskoy\Pipeline\PipelineBuilder;

if (!function_exists('pipeline')) {
    function pipeline($stages, $processor) {
        return new Pipeline($stages, $processor);
    }
}

if (!function_exists('pipelineBuilder')) {
    function pipelineBuilder() {
        return new PipelineBuilder();
    }
}
