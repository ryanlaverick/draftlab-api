<?php

namespace Draftlab\Domain\Model;

use Draftlab\Domain\ValueObject\ImageUrl;
use Draftlab\Domain\ValueObject\SchoolName;
use Draftlab\Domain\ValueObject\SchoolShortName;
use Draftlab\Domain\ValueObject\Uuid;

final class School
{
    private function __construct(
        private readonly Uuid $id,
        private readonly SchoolName $name,
        private readonly SchoolShortName $shortName,
        private readonly ImageUrl $imageUrl,
    ) {
    }

    public function getId(): Uuid
    {
        return $this->id;
    }

    public function getName(): SchoolName
    {
        return $this->name;
    }

    public function getShortName(): SchoolShortName
    {
        return $this->shortName;
    }

    public function getImageUrl(): ImageUrl
    {
        return $this->imageUrl;
    }
}
