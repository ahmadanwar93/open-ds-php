<?php

declare(strict_types=1);

namespace Fikri\OpenDsaTutorial\Tests\Unit\Chapter_1;

use Fikri\OpenDsaTutorial\Chapter_1\BracketMatcher;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class BracketMatcherTest extends TestCase
{
    #[DataProvider("bracketMatcherProvider")]
    public function test_is_match(string $sequence, bool $expected): void
    {
        $this->assertSame($expected, BracketMatcher::isBalanced($sequence));
    }

    public static function bracketMatcherProvider(): array
    {
        return [
            "empty" => ["", true],
            "simple_bracket" => ["()", true],
            "multiple_bracket" => ["{[()]}", true],
            "unclosed" => ["(", false],
            "empty_stack_on_pop" => [")", false],
            "wrong_order" => ["([)]", false],
            "non_chars_ignored" => ["hello (world)", true]
        ];
    }
}
