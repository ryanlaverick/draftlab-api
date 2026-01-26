<?php

namespace Draftlab\Domain\Common;

abstract class ValueObject
{
    private readonly Collection $errorBag;

    public function __construct(
    ) {
        $this->errorBag = new Collection();
    }

    abstract public function getValidationRules(): array;

    abstract public function getValue(): mixed;

    abstract public function getFieldName(): string;

    public function equals(ValueObject $object): bool
    {
        if (get_class($this) !== get_class($object)) {
            return false;
        }

        return $this->getValue() === $object->getValue();
    }

    public function validate(mixed $value): bool
    {

    }

    protected function isValid(mixed $value): bool
    {
        self::validate($value);

        return $this->errorBag->isEmpty();
    }
}
