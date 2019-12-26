<?php

namespace App\Stack;

use RuntimeException;

/**
 * Implementation of stack data structure - LIFO (last in, first out).
 * Wiki: https://en.wikipedia.org/wiki/Stack_(abstract_data_type)
 */
class Stack
{
    /**
     * Stack items collection.
     *
     * @var string[]
     */
    private $items;

    public function __construct()
    {
        $this->items = [];
    }

    /**
     * Checks if stack is empty.
     *
     * @return boolean
     */
    public function isEmpty(): bool
    {
        return !count($this->items);
    }

    /**
     * Returns the item at the top of the stack without removing it.
     * 
     * @return string
     */
    public function peek(): string
    {
        $lastIndex = count($this->items) - 1;
        return $this->items[$lastIndex];
    }

    /**
     * Removes and returns the item at the top of the stack.
     * 
     * @throws RuntimeException If stack is empty
     * 
     * @return string
     */
    public function pop(): string
    {
        if ($this->isEmpty()) {
            throw new RuntimeException('Stack is empty.');
        }

        $lastIndex = count($this->items) - 1;

        $item = $this->items[$lastIndex];
        unset($this->items[$lastIndex]);

        return $item;
    }

    /**
     * Inserts the item at the top of the stack.
     *
     * @param string $item
     * 
     * @return void
     */
    public function push(string $item): void
    {
        $this->items[] = $item;
    }
}
