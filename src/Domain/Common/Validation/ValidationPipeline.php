<?php

namespace Draftlab\Domain\Common\Validation;

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
            $this->errors[] = $pipe->getFailMessage();
        }
    }

    /**
     * @return list<string>
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}
