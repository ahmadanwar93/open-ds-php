<?php

declare(strict_types=1);

namespace Fikri\OpenDsaTutorial\Tests\Unit\Adt;

use Fikri\OpenDsaTutorial\Adt\Implementations\Bag;
use Override;
use PHPUnit\Framework\TestCase;

class BagTest extends TestCase
{
    private Bag $bag;

    #[Override]
    protected function setUp(): void
    {
        parent::setUp();
        $this->bag = new Bag();
    }

    public function test_add_duplicate_elements(): void
    {
        $this->bag->add(1);
        $this->bag->add(1);

        $this->assertSame(2, \count($this->bag->findAll(1)));
    }

    public function test_remove_items_from_bag(): void
    {
        $this->bag->add(1);
        $this->bag->add(1);
        $this->bag->remove(1);

        $this->assertSame(1, \count($this->bag->findAll(1)));

        $this->bag->remove(1);
        $this->assertSame(0, \count($this->bag->findAll(1)));

        $this->assertSame(null, $this->bag->remove(1));
    }

    public function test_find_missing_item_from_bag(): void
    {
        $this->assertSame(null, $this->bag->find("undefined_item"));
    }
}
