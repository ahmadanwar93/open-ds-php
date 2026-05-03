<?php

declare(strict_types=1);

namespace Fikri\OpenDsaTutorial\Chapter_1;

use Fikri\OpenDsaTutorial\Adt\Implementations\Stack;

class BracketMatcher
{
    public static function isBalanced(string $input): bool
    {
        $matches = [')' => '(', ']' => '[', '}' => '{'];
        $stack = new Stack();

        foreach (str_split($input) as $char) {
            if (in_array($char, $matches)) {
                $stack->push($char);
            } elseif (isset($matches[$char])) {
                // have to check first if its empty before pop so thatit wont trigger OutofRangeException
                if ($stack->isEmpty()) {
                    return false;
                }
                $removed = $stack->pop();
                if ($removed !== $matches[$char]) {
                    return false;
                }
            }
        }

        return $stack->isEmpty();
    }
}
