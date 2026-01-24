<?php

namespace Draftlab\Domain\ValueObject;

final class PlayerId
{
    public function __construct(
        private string $id,
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }
}
