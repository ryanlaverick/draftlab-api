<?php

namespace Draftlab\Tests\Domain\Common\ValueObject;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class ValueObjectTest extends TestCase
{
    #[DataProvider('provideInvalidValues')]
    public function testValidation(mixed $value, array $errors): void
    {
        $example = ExampleValueObject::validate($value);
        $this->assertEquals($errors, ExampleValueObject::getErrorBag());
    }

    public static function provideInvalidValues(): \Generator
    {
        yield 'Null Value' => [null, ['This value cannot be null.']];
    }
}
