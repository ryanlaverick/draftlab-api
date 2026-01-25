<?php

namespace Draftlab\Domain;

/**
 * @implements \IteratorAggregate<int, Collectable>
 */
class AbstractCollection implements \IteratorAggregate
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
}
