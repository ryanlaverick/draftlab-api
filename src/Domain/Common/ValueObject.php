<?php

namespace Draftlab\Domain\Common;

use Draftlab\Domain\Common\Validation\Rule;
use Draftlab\Domain\Common\Validation\ValidationPipeline;

abstract class ValueObject
{
    private static array $errorBag = [];

    /**
     * @return list<Rule>
     */
    abstract public static function getValidationRules(): array;

    abstract public function getValue(): mixed;

    public function equals(ValueObject $object): bool
    {
        if (get_class($this) !== get_class($object)) {
            return false;
        }

        return $this->getValue() === $object->getValue();
    }

    public static function validate(mixed $value): bool
    {
        $pipeline = new ValidationPipeline(
            static::getValidationRules()
        );

        $pipeline->carry($value);
        static::$errorBag = $pipeline->getErrors();

        return empty(static::$errorBag);
    }

    protected static function isValid(mixed $value): bool
    {
        self::validate($value);

        return empty(static::$errorBag);
    }

    /**
     * @return array
     */
    public static function getErrorBag(): array
    {
        return static::$errorBag;
    }
}
