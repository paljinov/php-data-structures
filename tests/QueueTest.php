<?php

namespace Tests;

use App\Queue;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class QueueTest extends TestCase
{
    public function testEmpty(): Queue
    {
        $queue = new Queue();
        $this->assertTrue($queue->isEmpty());

        return $queue;
    }

    /**
     * @depends testEmpty
     */
    public function testEnqueue(Queue $queue): Queue
    {
        $queue->enqueue('A');
        $this->assertSame('A', $queue->peek());
        $this->assertFalse($queue->isEmpty());

        return $queue;
    }

    /**
     * @depends testEnqueue
     */
    public function testPeek(Queue $queue): Queue
    {
        $this->assertSame('A', $queue->peek());
        $this->assertFalse($queue->isEmpty());

        return $queue;
    }

    /**
     * @depends testPeek
     */
    public function testDequeue(Queue $queue): Queue
    {
        $this->assertSame('A', $queue->dequeue());
        $this->assertTrue($queue->isEmpty());

        return $queue;
    }

    /**
     * @depends testDequeue
     */
    public function testDequeueWhenEmpty(Queue $queue): void
    {
        $this->expectException(RuntimeException::class);
        $queue->dequeue();
    }
}
