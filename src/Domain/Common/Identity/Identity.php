<?php

namespace Draftlab\Domain\Common\Identity;

interface Identity
{
    public function generate(IdentityProvider $identityProvider): self;
}
