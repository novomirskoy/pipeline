<?php

namespace Novomirskoy\Pipeline;

class FingersCrossedProcessor implements ProcessorInterface
{
    /**
     * @inheritdoc
     */
    public function process(array $stages, $payload)
    {
        foreach ($stages as $stage) {
            $payload = $stage($payload);
        }

        return $payload;
    }
}
