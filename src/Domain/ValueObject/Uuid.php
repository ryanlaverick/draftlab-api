<?php

namespace Draftlab\Domain\ValueObject;

use Draftlab\Domain\Common\Identity\Identity;
use Draftlab\Domain\Common\Identity\IdentityProvider;
use Draftlab\Domain\Common\Identity\UuidIdentityProvider;
use Draftlab\Domain\Common\ValueObject;

class Uuid extends ValueObject implements Identity
{

    public function __construct(
        private readonly string $id,
    ) {
    }

    public function getValue(): string
    {
        return $this->id;
    }

    public static function getValidationRules(): array
    {
        return [];
    }

    public function generate(IdentityProvider $identityProvider = new UuidIdentityProvider()): Identity
    {
        return new self($identityProvider->generate());
    }
}
