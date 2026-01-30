<?php

namespace Draftlab\Tests\Domain\Common\ValueObject;

use Draftlab\Domain\Common\Validation\NotNullRule;
use Draftlab\Domain\Common\Validation\StringRule;
use Draftlab\Domain\Common\ValueObject;

final class ExampleValueObject extends ValueObject
{

    public function __construct(
        private string $example,
    ) {
        if (! self::validate($this->example)) {
            throw new \InvalidArgumentException('Invalid Example Value Object!');
        }
    }

    public static function getValidationRules(): array
    {
        return [
            NotNullRule::class,
            StringRule::class,
        ];
    }

    public function getValue(): string
    {
        return $this->example;
    }
}
