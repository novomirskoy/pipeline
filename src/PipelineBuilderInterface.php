<?php

namespace Novomirskoy\Pipeline;

interface PipelineBuilderInterface
{
    /**
     * Add an stage
     *
     * @param callable $stage
     *
     * @return PipelineBuilderInterface
     */
    public function add(callable $stage);

    /**
     * Build a new Pipeline object
     *
     * @param ProcessorInterface $processor
     *
     * @return PipelineInterface
     */
    public function build(ProcessorInterface $processor);
}
