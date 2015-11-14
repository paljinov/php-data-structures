<?php

/**
 * Implementation of queue data structure - FIFO (first in ifirst out).
 * Wiki: https://en.wikipedia.org/wiki/Queue_%28abstract_data_type%29
 */
class Queue
{
	/**
	 * Queue items collection.
	 * @param mixed[]
	 */
	private $items;

	public function __construct()
	{
		$this->items = array();
	}

	/**
	 * Adds an element on the collection top.
	 * @param mixed $item
	 */
	public function enqueue($item)
	{
		$this->items[] = $item;
	}

	/**
	 * If queue is not empty, removes the element that was last added.
	 */
	public function dequeue()
	{
		if(!$this->isEmpty())
			array_shift($this->items);
	}

	/**
	 * Checks if queue is empty.
	 */
	private function isEmpty()
	{
		return count($this->items) ? false : true;
	}

	/**
	 * Converts queue collection to string output.
	 */
	public function __toString()
	{
		if($this->isEmpty())
			$itemsString = 'Queue is empty.';
		else
			$itemsString = implode(', ', $this->items);

		$itemsString .= PHP_EOL; 
		return $itemsString;
	}

}

$queue = new Queue();

$queue->enqueue('A');		echo (string)$queue; // A
$queue->dequeue();			echo (string)$queue; // Queue is empty.
$queue->dequeue();			echo (string)$queue; // Queue is empty.
$queue->enqueue('B');		echo (string)$queue; // B
$queue->enqueue('C');		echo (string)$queue; // B, C
$queue->enqueue('D');		echo (string)$queue; // B, C, D
$queue->dequeue();			echo (string)$queue; // C, D
$queue->dequeue();			echo (string)$queue; // D