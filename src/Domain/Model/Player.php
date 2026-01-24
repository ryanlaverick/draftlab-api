<?php

namespace Draftlab\Domain\Model;

final class Player
{
    public function __construct(
        private string $id,
        private string $name,
    ) {
    }
}
