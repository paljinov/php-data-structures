<?php

namespace App\LinkedList;

use RuntimeException;

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

    public function __toString()
    {
        $data = [];

        $node = $this->firstNode;

        while ($node !== null) {
            $data[] = $node->data;
            $node = $node->next;
        }

        return implode(',', $data);
    }

    /**
     * Add the given data at the given index of linked list.
     *
     * @param string $data
     * @param int $index
     *
     * @throws RuntimeException
     *
     * @return void
     */
    public function addAt(string $data, int $index): void
    {
        $count = $this->count;

        if ($index > $count) {
            throw new RuntimeException(sprintf(
                'Data cannot be added to linked list index "%s" which has "%s" nodes.',
                $index,
                $count
            ));
        }

        $newNode = new Node($data);
        if ($index === 0) {
            // First node
            $this->addFirst($data);
        } elseif ($index === $count) {
            // Last node
            $this->addLast($data);
        } else {
            // Node between first and last node

            $node = $this->firstNode;
            $i = 0;

            while ($node->next !== null) {
                // If next node should be new node index
                if ($i + 1 === $index) {
                    // New node needs to show where current node showed before
                    $newNode->next = $node->next;
                    // Current node shows to new node
                    $node->next = $newNode;
                    // Increment node counter and exit function
                    $this->count++;
                    return;
                }

                $node = $node->next;
                $i++;
            }
        }
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

        if ($this->isEmpty()) {
            // Set last node
            $this->lastNode = $newNode;
        } else {
            // Set link from new first node to old first node
            $newNode->next = $this->firstNode;
        }

        // Set first node
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
            // Set link from old last node to new last node
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
        return $this->count === 0;
    }

    /**
     * Remove node with given index of linked list.
     *
     * @param int $index
     *
     * @throws RuntimeException
     *
     * @return void
     */
    public function removeAt(int $index): void
    {
        $count = $this->count;

        if ($index > $count - 1) {
            throw new RuntimeException(sprintf(
                'Node with index "%s" cannot be removed from linked list which has "%s" nodes.',
                $index,
                $count
            ));
        }

        if ($index === 0) {
            // First node
            $this->removeFirst();
        } elseif ($index === $count - 1) {
            // Last node
            $this->removeLast();
        } else {
            // Node between first and last node

            $node = $this->firstNode;
            $i = 0;

            while ($node->next !== null) {
                // If next node should be remove node index
                if ($i + 1 === $index) {
                    // Move node next step ahead
                    $node->next = $node->next->next;
                    // Decrement node counter and exit function
                    $this->count--;
                    return;
                }

                $node = $node->next;
                $i++;
            }
        }
    }

    /**
     * Remove first node of linked list.
     *
     * @return void
     */
    public function removeFirst(): void
    {
        if ($this->isEmpty()) {
            throw new RuntimeException('It is not possible remove first node from empty linked list.');
        }

        // Save to local variable and destroy first node
        $firstNode = $this->firstNode;
        $this->firstNode = null;

        if ($this->isEmpty()) {
            $this->lastNode = null;
        } else {
            $this->firstNode = $firstNode->next;
        }

        $this->count--;
    }

    /**
     * Remove last node of linked list.
     *
     * @return void
     */
    public function removeLast(): void
    {
        if ($this->isEmpty()) {
            throw new RuntimeException('It is not possible remove last node from empty linked list.');
        }

        // Destroy last node
        $this->lastNode = null;

        if ($this->isEmpty()) {
            $this->firstNode = null;
        } else {
            $node = $this->firstNode;
            while ($node !== null) {
                if ($node->next->next === null) {
                    $node->next = null;
                    $this->lastNode = $node;
                }

                $node = $node->next;
            }
        }

        $this->count--;
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
}
