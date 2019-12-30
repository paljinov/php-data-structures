<?php

namespace Tests\Stack;

use App\Stack\Stack;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class StackTest extends TestCase
{
    public function testEmpty(): Stack
    {
        $stack = new Stack();
        $this->assertTrue($stack->isEmpty());

        return $stack;
    }

    /**
     * @depends testEmpty
     */
    public function testPush(Stack $stack): Stack
    {
        $stack->push('1');
        $this->assertFalse($stack->isEmpty());

        $stack->push('2');
        $this->assertEquals(['1', '2'], $this->getStackData($stack));

        return $stack;
    }

    /**
     * @depends testPush
     */
    public function testPeek(Stack $stack): Stack
    {
        $this->assertEquals('2', $stack->peek());
        $this->assertEquals(['1', '2'], $this->getStackData($stack));

        return $stack;
    }

    /**
     * @depends testPeek
     */
    public function testPop(Stack $stack): Stack
    {
        $this->assertEquals('2', $stack->pop());
        $this->assertEquals(['1'], $this->getStackData($stack));

        $this->assertEquals('1', $stack->pop());
        $this->assertTrue($stack->isEmpty());

        return $stack;
    }

    /**
     * @depends testPop
     */
    public function testPopWhenEmpty(Stack $stack): void
    {
        $this->expectException(RuntimeException::class);
        $stack->pop();
    }

    /**
     * Get stack array data.
     *
     * @param Stack $stack
     *
     * @return string[]
     */
    private function getStackData(Stack $stack): array
    {
        $stackData = explode(',', (string) $stack);
        return $stackData;
    }
}
