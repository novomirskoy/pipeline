<?php

namespace Novomirskoy\Pipeline;

use InvalidArgumentException;

class Pipeline implements PipelineInterface
{
    /**
     * @var StageInterface[]|callable[]
     */
    private $stages;

    /**
     * @var ProcessorInterface
     */
    private $processor;

    public function __construct(array $stages = [], ProcessorInterface $processor = null)
    {
        foreach ($stages as $stage) {
            if (false === is_callable($stage)) {
                throw new InvalidArgumentException('All stages should be callable');
            }
        }

        $this->stages = $stages;
        $this->processor = $processor ?: new FingersCrossedProcessor();
    }

    /**
     * @inheritDoc
     */
    public function pipe(callable $stage)
    {
        $pipeline = clone $this;
        $pipeline->stages[] = $stage;

        return $pipeline;
    }

    /**
     * @inheritDoc
     */
    public function __invoke($payload)
    {
        return $this->process($payload);
    }

    /**
     * Process the payload
     *
     * @param mixed $payload
     *
     * @return mixed
     */
    public function process($payload)
    {
        return $this->processor->process($this->stages, $payload);
    }
}
