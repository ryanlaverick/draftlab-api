<?php

namespace Draftlab\Domain\Common\Identity;

use Ramsey\Uuid\Uuid;

final readonly class UuidIdentityProvider implements IdentityProvider
{

    public function generate(): string
    {
        return Uuid::uuid4()->toString();
    }
}
