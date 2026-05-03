<?php

declare(strict_types=1);

namespace Fikri\OpenDsaTutorial\Adt\Implementations;

use Fikri\OpenDsaTutorial\Adt\Interfaces\ListInterface;

class Queue
{
    private ListInterface $list;

    public function __construct()
    {
        $this->list = new NaiveList();
    }

    public function enqueue(mixed $x): void
    {
        $this->list->add($this->list->size(), $x);
    }

    public function dequeue(): mixed
    {
        return $this->list->remove(0);
    }

    public function isEmpty(): bool
    {
        return $this->list->size() === 0;
    }
}
