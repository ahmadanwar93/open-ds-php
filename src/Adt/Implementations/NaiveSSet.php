<?php

declare(strict_types=1);

namespace Fikri\OpenDsaTutorial\Adt\Implementations;

use Fikri\OpenDsaTutorial\Adt\Interfaces\SSetInterface;
use Override;

class NaiveSSet implements SSetInterface
{
    private array $arr = [];

    #[Override]
    public function find(mixed $x): mixed
    {
        $low = 0;
        $high = count($this->arr);

        while ($low < $high) {
            $mid = intdiv($low + $high, 2);
            if ($this->arr[$mid] < $x) {
                $low = $mid + 1;
            } else {
                $high = $mid;
            }
        }

        return $low < count($this->arr) ? $this->arr[$low] : null;
    }

    #[Override]
    public function size(): int
    {
        return \count($this->arr);
    }

    #[Override]
    public function add(mixed $x): bool
    {
        $ele = $this->find($x);

        $existing = array_search($x, $this->arr);
        if ($existing !== false) {
            // will still not add any duplicates
            return false;
        }

        if ($ele === null) {
            $this->arr[] = $x;

            return true;
        }

        $index = array_search($ele, $this->arr);
        array_splice($this->arr, $index, 0, [$x]);

        return true;
    }

    #[Override]
    public function remove(mixed $x): mixed
    {
        $ele = $this->find($x);
        $index = array_search($x, $this->arr);

        if ($ele === null) {
            return null;
        }

        array_splice($this->arr, $index, 1, []);
        return $x;
    }
}
