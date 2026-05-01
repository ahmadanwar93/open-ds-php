<?php

declare(strict_types=1);

namespace Fikri\OpenDsaTutorial\Adt\Implementations;

use Fikri\OpenDsaTutorial\Adt\Interfaces\ListInterface;
use Override;

class NaiveList implements ListInterface
{
    private array $arr = [];

    #[Override]
    public function size(): int
    {
        return \count($this->arr);
    }

    #[Override]
    public function get(int $i): mixed
    {
        $this->outOfRangeCheck($i);

        return $this->arr[$i];
    }

    #[Override]
    public function set(int $i, mixed $x): mixed
    {
        $this->outOfRangeCheck($i);

        $prev = $this->arr[$i];
        $this->arr[$i] = $x;

        return $prev;
    }

    #[Override]
    public function add(int $i, mixed $x): void
    {
        if ($i < 0 || $i > $this->size()) {
            // for add(), $i can be equal to the size to put at the end
            throw new \OutOfRangeException("Index $i is out of bounds");
        }

        array_splice($this->arr, $i, 0, [$x]);
    }

    #[Override]
    public function remove(int $i): mixed
    {
        $this->outOfRangeCheck($i);

        $removed = $this->arr[$i];

        array_splice($this->arr, $i, 1, []);

        return $removed;
    }

    private function outOfRangeCheck(int $i): void
    {
        if ($i < 0 || $i >= $this->size()) {
            throw new \OutOfRangeException("Index $i is out of bounds");
        }
    }
}
