<?php

namespace Novomirskoy\Pipeline;

class InterruptibleProcessor implements ProcessorInterface
{
    /**
     * @var callable
     */
    private $check;

    /**
     * InterruptibleProcessor constructor.
     * @param callable $check
     */
    public function __construct(callable $check)
    {
        $this->check = $check;
    }

    /**
     * @inheritDoc
     */
    public function process(array $stages, $payload)
    {
        $check = $this->check;

        foreach ($stages as $stage) {
            $payload = $stage($payload);

            if (true !== $check($payload)) {
                return $payload;
            }
        }

        return $payload;
    }
}
