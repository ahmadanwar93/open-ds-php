<?php

declare(strict_types=1);

namespace Fikri\OpenDsaTutorial\Tests\Unit\Adt;

use Fikri\OpenDsaTutorial\Adt\Implementations\NaiveList;
use Override;
use PHPUnit\Framework\TestCase;

class ListTest extends TestCase
{
    private NaiveList $list;

    #[Override]
    protected function setUp(): void
    {
        parent::setUp();
        $this->list = new NaiveList();
    }
    public function test_size_is_zero_on_empty_list(): void
    {
        $this->assertSame(0, $this->list->size());
    }

    public function test_setting_element_return_its_old_value(): void
    {
        $this->list->add(0, "old");

        $newValue = $this->list->set(0, "new");

        $this->assertSame("old", $newValue);
        $this->assertSame("new", $this->list->get(0));
    }

    public function test_add_element_shift_existing_element(): void
    {
        $this->list->add(0, "old");
        $this->list->add(0, "new");

        $this->assertSame("new", $this->list->get(0));
        $this->assertSame("old", $this->list->get(1));
    }

    public function test_remove_element_returns_removed_element(): void
    {
        $this->list->add(0, "old");
        $this->list->add(1, "new");

        $removed = $this->list->remove(1);

        $this->assertSame("new", $removed);
        $this->assertSame(1, $this->list->size());
    }
}
