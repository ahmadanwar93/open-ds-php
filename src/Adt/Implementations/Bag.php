<?php

declare(strict_types=1);

namespace Fikri\OpenDsaTutorial\Adt\Implementations;

use Fikri\OpenDsaTutorial\Adt\Interfaces\BagInterface;
use Fikri\OpenDsaTutorial\Adt\Interfaces\USetInterface;
use Override;

class Bag implements BagInterface
{
    // $keys are used to track which values exist
    // but honestly it is redundant. This is just a practice of using composition
    // technically, when the user pass in $x, we can just search buckets for the key if it exists. It will have O(1) speed as well.
    private USetInterface $keys;

    // buckets to store the actual duplicates per values
    private array $buckets = [];

    public function __construct()
    {
        // this is like container binding but from first principle and we are doing the binding manually
        $this->keys = new NaiveUSet();
    }

    #[Override]
    public function add(mixed $x): void
    {
        // cannot find the key in the USet
        if ($this->keys->find($x) === null) {
            $this->keys->add($x);
            $this->buckets[$x] = [];
        }
        $this->buckets[$x][] = $x;
    }

    #[Override]
    public function find(mixed $x): mixed
    {
        return $this->keys->find($x);
    }

    #[Override]
    public function remove(mixed $x): mixed
    {
        if ($this->find($x) === null) {
            return null;
        }

        array_splice($this->buckets[$x], 0, 1);

        // only remove the key from the buckets if the array is empty
        if (\count($this->buckets[$x]) === 0) {
            $this->keys->remove($x);
            unset($this->buckets[$x]);
        }

        return $x;
    }

    #[Override]
    public function findAll(mixed $x): array
    {
        if ($this->find($x) === null) {
            return [];
        }

        return $this->buckets[$x];
    }
}
