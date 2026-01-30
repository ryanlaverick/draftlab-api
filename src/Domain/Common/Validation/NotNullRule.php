<?php

namespace Draftlab\Domain\Common\Validation;

final class NotNullRule extends Rule
{
    public function __invoke(mixed $passenger): mixed
    {
        if (is_null($passenger['value'])) {
            return false;
        }

        return $passenger;
    }

    public function getFailureMessage(): string
    {
        return 'This value cannot be null.';
    }

    public function pauseOnFailure(): bool
    {
        return true;
    }
}
