<?php

namespace Draftlab\Domain\ValueObject;

use Draftlab\Domain\Common\ValueObject;

final class SchoolShortName extends ValueObject
{
    public function __construct(
        private readonly string $shortName,
    ) {
    }

    public function getValue(): string
    {
        return $this->shortName;
    }

    public static function getValidationRules(): array
    {
        return [];
    }
}
