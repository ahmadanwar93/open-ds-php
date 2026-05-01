<?php

declare(strict_types=1);

namespace Fikri\OpenDsaTutorial\Adt\Interfaces;

interface SSetInterface
{
    public function size(): int;

    public function add(mixed $x): bool;

    public function remove(mixed $x): mixed;

    public function find(mixed $x): mixed;
}
