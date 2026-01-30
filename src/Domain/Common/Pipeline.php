<?php

namespace Draftlab\Domain\Common;

class Pipeline
{
    /**
     * @param list<Pipe> $pipes
     */
    public function __construct(
        private array $pipes = []
    ) {
    }

    public function pipe(mixed $class): self
    {
        $this->pipes[] = $class;

        return new self($this->pipes);
    }

    public function carry(mixed $value): mixed
    {
        $result = $value;

        foreach ($this->pipes as $pipe) {
            if (is_callable($pipe)) {
                $result = $pipe($result);
            } else if(is_string($pipe) && class_exists($pipe)) {
                $instance = new $pipe;
                $result = $instance->__invoke($result);
            } else {
                throw new \InvalidArgumentException('Unsupported pipe type');
            }
        }

        return $result;
    }
}
