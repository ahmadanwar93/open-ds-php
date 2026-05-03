<?php

declare(strict_types=1);

namespace Fikri\OpenDsaTutorial\Adt\Implementations;

use Fikri\OpenDsaTutorial\Adt\Interfaces\USetInterface;
use Override;

class NaiveUSet implements USetInterface
{
    // for naive u set, we store the data in plain indexed array like $arr = ['a', 'b', 'c'];
    private array $arr = [];

    #[Override]
    public function size(): int
    {
        return \count($this->arr);
    }

    #[Override]
    public function find(mixed $x): mixed
    {
        // the assumption is that, null is not stored as one of the element, else, returning that item (null) would be a false positive
        // better way is to do an exception
        foreach ($this->arr as $item) {
            if ($item === $x) {
                return $item;
            }
        }
        return null;
    }

    #[Override]
    public function add(mixed $x): bool
    {
        if ($this->find($x) !== null) {
            // if already exists, dont add
            return false;
        }

        $this->arr[] = $x;
        return true;
    }

    #[Override]
    public function remove(mixed $x): mixed
    {
        $index = array_search($x, $this->arr);

        if ($index === false) {
            return null;
        }

        array_splice($this->arr, $index, 1, []);
        return $x;
    }
}
