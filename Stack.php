<?php

/**
 * Implementation of stack data structure - LIFO (last in, first out).
 * Wiki: https://en.wikipedia.org/wiki/Stack_%28abstract_data_type%29
 */
class Stack
{
	/**
	 * Stack items collection.
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
	public function push($item)
	{
		$this->items[] = $item;
	}

	/**
	 * If stack is not empty, removes the element that was last added.
	 */
	public function pop()
	{
		if(!$this->isEmpty())
			array_pop($this->items);
	}

	/**
	 * Checks if stack is empty.
	 */
	private function isEmpty()
	{
		return count($this->items) ? false : true;
	}

	/**
	 * Converts stack collection to string output.
	 */
	public function __toString()
	{
		if($this->isEmpty())
			$itemsString = 'Stack is empty.';
		else
			$itemsString = implode(', ', $this->items);

		$itemsString .= PHP_EOL; 
		return $itemsString;
	}

}

$stack = new Stack();

$stack->push('A');		echo (string)$stack; // A
$stack->pop();			echo (string)$stack; // Stack is empty.
$stack->pop();			echo (string)$stack; // Stack is empty.
$stack->push('B');		echo (string)$stack; // B
$stack->push('C');		echo (string)$stack; // B, C
$stack->push('D');		echo (string)$stack; // B, C, D
$stack->pop();			echo (string)$stack; // B, C
$stack->pop();			echo (string)$stack; // B