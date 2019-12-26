<?php

namespace App;

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
     * Converts stack collection to string output.
     */
    public function __toString(): string
    {
        $itemsString = implode(', ', $this->items);
        $toString = sprintf('Stack: "%s"', $itemsString);

        return $toString;
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
     * Returns the object at the top of the stack without removing it.
     * 
     * @return string
     */
    public function peek(): string
    {
        $lastIndex = count($this->items) - 1;
        return $this->items[$lastIndex];
    }

    /**
     * Removes and returns the object at the top of the stack.
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
     * Inserts an object at the top of the stack.
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
