<?php

namespace Draftlab\Domain\Common\Validation;

use Draftlab\Domain\Common\Pipe;
use Draftlab\Domain\Common\Pipeline;

final class ValidationPipeline extends Pipeline
{
    /**
     * @var list<string>
     */
    private array $errors = [];

    /**
     * @param Rule $pipe
     */
    public function afterEach(mixed $result, mixed $pipe): void
    {
        if (false === $result) {
            /** @var Rule $rule */
            $rule = $this->getInstanceFor($pipe);
            $this->errors[] = $rule->getFailureMessage();
        }
    }

    /**
     * @return list<string>
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    protected function getInstanceFor(mixed $pipe): Pipe
    {
        if (is_callable($pipe)) {
            return $pipe;
        } else if(is_string($pipe) && class_exists($pipe)) {
            return new $pipe;
        }

        throw new \InvalidArgumentException('Unable to parse failure message from Rule');
    }
}
