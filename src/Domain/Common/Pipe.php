<?php

namespace Draftlab\Domain\Common;

interface Pipe
{
    public function __invoke(mixed $passenger);
}
