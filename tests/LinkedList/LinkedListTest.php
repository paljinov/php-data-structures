<?php

namespace Tests\LinkedList;

use App\LinkedList\LinkedList;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class LinkedListTest extends TestCase
{
    public function testEmpty(): LinkedList
    {
        $linkedList = new LinkedList();
        $this->assertTrue($linkedList->isEmpty());

        return $linkedList;
    }

    /**
     * @depends testEmpty
     */
    public function testAddLast(LinkedList $linkedList): LinkedList
    {
        $linkedList->addLast('3');
        $this->assertFalse($linkedList->isEmpty());

        $linkedList->addLast('4');
        $linkedList->addLast('5');
        $this->assertEquals(['3', '4', '5'], $linkedList->traverse());

        return $linkedList;
    }

    /**
     * @depends testAddLast
     */
    public function testAddFirst(LinkedList $linkedList): LinkedList
    {
        $linkedList->addFirst('2');
        $linkedList->addFirst('1');
        $this->assertEquals(['1', '2', '3', '4', '5'], $linkedList->traverse());

        return $linkedList;
    }
}
