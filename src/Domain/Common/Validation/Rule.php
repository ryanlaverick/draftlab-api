<?php

namespace Draftlab\Domain\Common\Validation;

use Draftlab\Domain\Common\Pipe;

abstract class Rule implements Pipe
{
    abstract public function getFailureMessage(): string;

    abstract public function pauseOnFailure(): bool;
}
