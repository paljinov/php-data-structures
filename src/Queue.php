<?php

namespace App;

use RuntimeException;

/**
 * Implementation of queue data structure - FIFO (first in, first out).
 * Wiki: https://en.wikipedia.org/wiki/Queue_%28abstract_data_type%29
 */
class Queue
{
    /**
     * Queue items collection.
     *
     * @var string[]
     */
    private $items;

    public function __construct()
    {
        $this->items = [];
    }

    /**
     * Removes and returns the item at the front of the queue.
     * 
     * @throws RuntimeException If queue is empty
     *
     * @return string
     */
    public function dequeue(): string
    {
        if ($this->isEmpty()) {
            throw new RuntimeException('Queue is empty.');
        }

        $frontItem = array_shift($this->items);

        return $frontItem;
    }

    /**
     * Inserts the item at the back of the queue.
     *
     * @param string $item
     * 
     * @return void
     */
    public function enqueue(string $item): void
    {
        $this->items[] = $item;
    }

    /**
     * Checks if queue is empty.
     * 
     * @return boolean
     */
    public function isEmpty(): bool
    {
        return count($this->items) ? false : true;
    }

    /**
     * Returns the item at the front of the queue without removing it.
     * 
     * @return string
     */
    public function peek(): string
    {
        return $this->items[0];
    }
}
