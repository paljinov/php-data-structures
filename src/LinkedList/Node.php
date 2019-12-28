<?php

namespace App\LinkedList;

class Node
{
    /**
     * Linked list data.
     *
     * @var string
     */
    public $data;

    /**
     * Link to the next node.
     *
     * @var self|null
     */
    public $next;

    public function __construct(string $data)
    {
        $this->data = $data;
        $this->next = null;
    }
}
