<?php

namespace Draftlab\Tests\Domain\Common;

use Draftlab\Domain\Common\Pipe;

class AlternatePipe implements Pipe
{
    public function __invoke(mixed $passenger): int
    {
        return $passenger / 2;
    }
}
