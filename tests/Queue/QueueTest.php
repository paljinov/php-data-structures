<?php

namespace Tests\Queue;

use App\Queue\Queue;
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
        $queue->enqueue('1');
        $this->assertFalse($queue->isEmpty());

        $queue->enqueue('2');
        $this->assertEquals(['1', '2'], $this->getQueueData($queue));

        return $queue;
    }

    /**
     * @depends testEnqueue
     */
    public function testPeek(Queue $queue): Queue
    {
        $this->assertEquals('1', $queue->peek());
        $this->assertEquals(['1', '2'], $this->getQueueData($queue));

        return $queue;
    }

    /**
     * @depends testPeek
     */
    public function testDequeue(Queue $queue): Queue
    {
        $this->assertEquals('1', $queue->dequeue());
        $this->assertEquals(['2'], $this->getQueueData($queue));

        $this->assertEquals('2', $queue->dequeue());
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

    /**
     * Get queue array data.
     *
     * @param Queue $queue
     *
     * @return string[]
     */
    private function getQueueData(Queue $queue): array
    {
        $queueData = explode(',', (string) $queue);
        return $queueData;
    }
}
