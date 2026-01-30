<?php

namespace Draftlab\Tests\Domain\Common\Pipeline;

use Draftlab\Domain\Common\Pipe;

class ExamplePipe implements Pipe
{
    public function __invoke(mixed $passenger): int
    {
        return $passenger * 15;
    }
}
