<?php

namespace Draftlab\Domain\ValueObject;

use Draftlab\Domain\Common\ValueObject;

final class SchoolName extends ValueObject
{
    public function __construct(
        private readonly string $name,
    ) {
    }

    public function getValue(): string
    {
        return $this->name;
    }

    public static function getValidationRules(): array
    {
        return [];
    }
}
