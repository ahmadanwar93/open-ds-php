<?php

declare(strict_types=1);

namespace Fikri\OpenDsaTutorial\Adt\Implementations;

use Fikri\OpenDsaTutorial\Adt\Interfaces\ListInterface;

class Stack
{
    // using composition rather than inheritance is that, i only want to expose these methods
    // if i do inheritance, techinically i can use the parents method
    private ListInterface $list;

    public function __construct()
    {
        $this->list = new NaiveList();
    }
    public function push(mixed $x): void
    {
        $this->list->add($this->list->size(), $x);
    }

    public function pop(): mixed
    {
        return $this->list->remove($this->list->size() - 1);
    }

    public function isEmpty(): bool
    {
        return $this->list->size() === 0;
    }
}
