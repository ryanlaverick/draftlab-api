<?php

namespace Draftlab\Domain\Common\Identity;

interface IdentityProvider
{
    public function generate(): mixed;
}
