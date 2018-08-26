<?php

namespace Novomirskoy\Pipeline;

interface PipelineInterface extends StageInterface
{
    /**
     * Create a new pipeline with an appended stage.
     *
     * @param callable $stage
     *
     * @return static
     */
    public function pipe(callable $stage);
}
