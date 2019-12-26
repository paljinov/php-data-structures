<?php

namespace Tests;

use App\Stack;
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
        $stack->push('A');
        $this->assertSame('A', $stack->peek());
        $this->assertFalse($stack->isEmpty());

        return $stack;
    }

    /**
     * @depends testPush
     */
    public function testPeek(Stack $stack): Stack
    {
        $this->assertSame('A', $stack->peek());
        $this->assertFalse($stack->isEmpty());

        return $stack;
    }

    /**
     * @depends testPeek
     */
    public function testPop(Stack $stack): Stack
    {
        $this->assertSame('A', $stack->pop());
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
}
