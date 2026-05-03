<?php

declare(strict_types=1);

namespace Fikri\OpenDsaTutorial\Tests\Unit\Chapter_1;

use Fikri\OpenDsaTutorial\Chapter_1\DyckValidator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class DyckTest extends TestCase
{
    #[DataProvider("dyckTestProvider")]
    public function test_is_dyck(array $sequence, bool $expected)
    {
        $this->assertSame($expected, DyckValidator::isDyck($sequence));
    }

    public static function dyckTestProvider(): array
    {
        return [
            'valid basic'        => [[1, -1], true],
            'starts negative'    => [[-1, 1], false],
            'valid nested'       => [[1, 1, -1, -1], true],
            'ends non-zero'      => [[1, -1, 1], false],
            'empty sequence'     => [[], true],
        ];
    }
}
