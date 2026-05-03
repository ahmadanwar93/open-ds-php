<?php

declare(strict_types=1);

namespace Fikri\OpenDsaTutorial\Tests\Unit\Chapter_1;

use Fikri\OpenDsaTutorial\Adt\Implementations\Stack;
use Fikri\OpenDsaTutorial\Chapter_1\StackReverser;
use PHPUnit\Framework\TestCase;

class StackReverserTest extends TestCase
{
    public function test_reverse_three_elements(): void
    {
        $stack = new Stack();
        $stack->push(1);
        $stack->push(2);
        $stack->push(3); // 3 is on top

        StackReverser::reverse($stack);

        // after reverse, 1 should be on top
        $this->assertSame(1, $stack->pop());
        $this->assertSame(2, $stack->pop());
        $this->assertSame(3, $stack->pop());
    }
}
