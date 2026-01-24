<?php

namespace Draftlab\Domain\Model;

use Draftlab\Domain\ValueObject\PlayerId;

final class Player
{
    public function __construct(
        private PlayerId $id,
        private string $name,
    ) {
    }
}
