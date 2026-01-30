<?php

namespace Draftlab\Domain\Common\Validation;

final class StringRule extends Rule
{

    public function __invoke(mixed $passenger): false|string
    {
        if (! is_string($passenger)) {
            return false;
        }

        return $passenger;
    }

    public function getFailureMessage(): string
    {
        return 'This value must be a string.';
    }

    public function pauseOnFailure(): bool
    {
        return true;
    }
}
