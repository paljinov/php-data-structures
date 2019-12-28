<?php

namespace App\LinkedList;

/**
 * Implementation of linked list data structure.
 * Wiki: https://en.wikipedia.org/wiki/Linked_list
 */
class LinkedList
{
    /**
     * Number of nodes.
     *
     * @var int
     */
    private $count;

    /**
     * First linked list node.
     *
     * @var Node|null
     */
    private $firstNode;

    /**
     * Last linked list node.
     *
     * @var Node|null
     */
    private $lastNode;

    public function __construct()
    {
        $this->count = 0;
        $this->firstNode = null;
        $this->lastNode = null;
    }

    /**
     * Add the given data at the beginning of linked list.
     *
     * @param string $data
     * 
     * @return void
     */
    public function addFirst(string $data): void
    {
        // New node
        $newNode = new Node($data);

        // If linked list is not empty
        if (!$this->isEmpty()) {
            // Set new first node
            $newNode->next = $this->firstNode;
        }

        // Set new first node
        $this->firstNode = $newNode;
        $this->count++;
    }

    /**
     * Add the given data at the end of linked list.
     *
     * @param string $data
     * 
     * @return void
     */
    public function addLast(string $data): void
    {
        // New node
        $newNode = new Node($data);

        // If linked list is empty
        if ($this->isEmpty()) {
            // Set first node
            $this->firstNode = $newNode;
        } else {
            // Set current last node to link to the new node 
            $this->lastNode->next = $newNode;
        }

        // Set new last node
        $this->lastNode = $newNode;
        $this->count++;
    }

    /**
     * Checks if linked list is empty.
     * 
     * @return boolean
     */
    public function isEmpty(): bool
    {
        return $this->lastNode === null;
    }

    /**
     * Get linked list size.
     *
     * @return int
     */
    public function size(): int
    {
        return $this->count;
    }

    /**
     * Traverse linked list and get data.
     *
     * @return string[]
     */
    public function traverse(): array
    {
        $data = [];

        $node = $this->firstNode;
        $count = $this->count;

        while ($count > 0) {
            $data[] = $node->data;
            $node = $node->next;

            $count--;
        }

        return $data;
    }
}
