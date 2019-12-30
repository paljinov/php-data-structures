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
        $this->assertEquals(['3', '4', '5'], $this->getLinkedListData($linkedList));

        return $linkedList;
    }

    /**
     * @depends testAddLast
     */
    public function testAddFirst(LinkedList $linkedList): LinkedList
    {
        $linkedList->addFirst('1');
        $this->assertEquals(['1', '3', '4', '5'], $this->getLinkedListData($linkedList));

        return $linkedList;
    }

    /**
     * @depends testAddFirst
     */
    public function testAddAt(LinkedList $linkedList): LinkedList
    {
        $linkedList->addAt('2', 1);
        $this->assertEquals(['1', '2', '3', '4', '5'], $this->getLinkedListData($linkedList));

        return $linkedList;
    }

    /**
     * @depends testAddAt
     */
    public function testSizeAfterAdding(LinkedList $linkedList): LinkedList
    {
        $this->assertEquals(5, $linkedList->size());

        return $linkedList;
    }

    /**
     * @depends testSizeAfterAdding
     */
    public function testRemoveAt(LinkedList $linkedList): LinkedList
    {
        $linkedList->removeAt(2);
        $this->assertFalse($linkedList->isEmpty());

        $this->assertEquals(['1', '2', '4', '5'], $this->getLinkedListData($linkedList));

        return $linkedList;
    }

    /**
     * @depends testRemoveAt
     */
    public function testRemoveLast(LinkedList $linkedList): LinkedList
    {
        $linkedList->removeLast();
        $this->assertFalse($linkedList->isEmpty());

        $linkedList->removeLast();
        $this->assertEquals(['1', '2'], $this->getLinkedListData($linkedList));

        return $linkedList;
    }

    /**
     * @depends testRemoveLast
     */
    public function testRemoveFirst(LinkedList $linkedList): LinkedList
    {
        $linkedList->removeFirst();
        $linkedList->removeFirst();

        $this->assertTrue($linkedList->isEmpty());

        return $linkedList;
    }

    /**
     * @depends testRemoveFirst
     */
    public function testSizeAfterRemoving(LinkedList $linkedList): LinkedList
    {
        $this->assertEquals(0, $linkedList->size());

        return $linkedList;
    }

    /**
     * Get linked list array data.
     *
     * @param LinkedList $linkedList
     *
     * @return string[]
     */
    private function getLinkedListData(LinkedList $linkedList): array
    {
        $linkedListData = explode(',', (string) $linkedList);
        return $linkedListData;
    }
}
