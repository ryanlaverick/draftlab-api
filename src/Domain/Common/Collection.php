<?php

namespace Draftlab\Domain\Common;

/**
 * @implements \IteratorAggregate<int, Collectable>
 */
class Collection implements \IteratorAggregate
{
    /**
     * @param list<Collectable> $items
     */
    public function __construct(
        private array $items = [],
    ) {
    }

    public function add(Collectable $collectable): void
    {
        $this->items[] = $collectable;
    }

    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->items);
    }

    public function isEmpty(): bool
    {
        return count($this->items) === 0;
    }
}
