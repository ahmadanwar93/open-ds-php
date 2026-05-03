<?php

declare(strict_types=1);

namespace Fikri\OpenDsaTutorial\Tests\Unit\Adt;

use Fikri\OpenDsaTutorial\Adt\Implementations\NaiveUSet;
use Override;
use PHPUnit\Framework\TestCase;


class USetTest extends TestCase
{
    private NaiveUSet $uSet;

    #[Override]
    protected function setUp(): void
    {
        parent::setUp();
        $this->uSet = new NaiveUSet();
    }

    public function test_find_returns_null_on_empty_set(): void
    {
        $this->assertSame(null, $this->uSet->find("random"));
    }

    public function test_add_returns_true_when_success(): void
    {
        $res = $this->uSet->add('first');

        $this->assertSame(true, $res);
        $this->assertSame('first', $this->uSet->find('first'));
    }

    public function test_add_returns_false_on_duplicates(): void
    {
        $this->uSet->add("duplicate");

        $this->assertSame("duplicate", $this->uSet->find("duplicate"));
        $this->assertSame(1, $this->uSet->size());

        $res = $this->uSet->add("duplicate");
        $this->assertSame(false, $res);
        $this->assertSame(1, $this->uSet->size());
    }

    public function test_remove_returns_the_removed_element(): void
    {
        $this->uSet->add(1);
        $this->uSet->add(2);
        $this->uSet->add(3);

        $this->assertSame(3, $this->uSet->size());
        $this->assertSame(2, $this->uSet->remove(2));
    }
}
