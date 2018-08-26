<?php

namespace Novomirskoy\Pipeline;

class PipelineBuilder implements PipelineBuilderInterface
{
    /**
     * @var StageInterface[]|callable[]
     */
    private $stages;

    /**
     * @inheritDoc
     */
    public function add(callable $stage)
    {
        $this->stages[] = $stage;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function build(ProcessorInterface $processor = null)
    {
        return new Pipeline($this->stages, $processor);
    }
}
