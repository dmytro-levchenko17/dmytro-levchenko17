<?php

declare(strict_types=1);

namespace Model;

class HistoryCollection implements \IteratorAggregate, \Countable, \ArrayAccess
{
    /**
     * @var list<BattleHistory>
     */
    private array $items = [];

    /**
     * @param list<BattleHistory> $battles
     */
    public function __construct(array $battles)
    {
        foreach ($battles as $battle) {
            $this->add($battle);
        }
    }

    public function add(BattleHistory $battle): self
    {
        $this->items[] = $battle;
        return $this;
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->items);
    }

    public function count(): int
    {
        return count($this->items);
    }

    public function remove(int $offset): self
    {
        unset($this->items[$offset]);
        return $this;
    }

    public function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
    }

    public function offsetGet($offset)
    {
        /** @var BattleHistory $item */
        foreach ($this->items as $item) {
            if ($item->getBattleId() === (int) $offset) {
                return $item;
            }
        }
        return null;
    }

    public function offsetSet($offset, $value)
    {
        // TODO: Implement offsetSet() method.
    }

    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
    }
}