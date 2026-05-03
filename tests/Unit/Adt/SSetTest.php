<?php

declare(strict_types=1);

namespace Fikri\OpenDsaTutorial\Tests\Unit\Adt;

use Fikri\OpenDsaTutorial\Adt\Implementations\NaiveSSet;
use Override;
use PHPUnit\Framework\TestCase;

class SSetTest extends TestCase
{
    private NaiveSSet $sSet;

    #[Override]
    protected function setUp(): void
    {
        parent::setUp();
        $this->sSet = new NaiveSSet();
    }

    public function test_find_returns_null_on_empty_set(): void
    {
        $this->assertSame(null, $this->sSet->find("random"));
    }

    public function test_returns_exact_match_or_higher(): void
    {
        $this->sSet->add(1);
        $this->sSet->add(3);
        $this->sSet->add(4);

        $this->assertSame(3, $this->sSet->find(3));
        $this->assertSame(3, $this->sSet->find(2));
    }

    public function test_returns_null_when_the_item_is_larger_than_anything_in_array(): void
    {
        $this->sSet->add(1);
        $this->sSet->add(3);
        $this->sSet->add(4);

        $this->assertSame(null, $this->sSet->find(5));
    }
}
