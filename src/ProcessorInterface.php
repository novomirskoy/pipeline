<?php

namespace Novomirskoy\Pipeline;

interface ProcessorInterface
{
    /**
     * Process the payload using multiple stages.
     *
     * @param StageInterface[]|callable[] $stages
     * @param mixed $payload
     * @return mixed
     */
    public function process(array $stages, $payload);
}
