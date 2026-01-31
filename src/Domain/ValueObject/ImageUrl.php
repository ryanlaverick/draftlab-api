<?php

namespace Draftlab\Domain\ValueObject;

use Draftlab\Domain\Common\ValueObject;

final class ImageUrl extends ValueObject
{
    public function __construct(
        private readonly string $imageUrl,
    ) {
    }

    public function getValue(): string
    {
        return $this->imageUrl;
    }

    public static function getValidationRules(): array
    {
        return [];
    }
}
