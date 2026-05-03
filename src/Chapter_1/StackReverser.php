<?php

declare(strict_types=1);

namespace Fikri\OpenDsaTutorial\Chapter_1;

use Fikri\OpenDsaTutorial\Adt\Implementations\Queue;
use Fikri\OpenDsaTutorial\Adt\Implementations\Stack;

class StackReverser
{
    public static function reverse(Stack $stack): void
    {
        $queue = new Queue();

        // cant use for loop on stack or queue since we are not exposing the underlying array which implements iterable
        while (!$stack->isEmpty()) {
            $removed = $stack->pop();

            $queue->enqueue($removed);
        }

        while (!$queue->isEmpty()) {
            $removed = $queue->dequeue();

            $stack->push($removed);
        }

        // no return because in place modification
    }
}
