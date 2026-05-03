<?php

declare(strict_types=1);

namespace Fikri\OpenDsaTutorial\Adt\Interfaces;

interface BagInterface
{
    // here it allows for duplicates hence why add returns void not bool as in USet
    public function add(mixed $x): void;
    public function remove(mixed $x): mixed;

    public function find(mixed $x): mixed;

    public function findAll(mixed $x): array;
}
