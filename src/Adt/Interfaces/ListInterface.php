<?php

declare(strict_types=1);

namespace Fikri\OpenDsaTutorial\Adt\Interfaces;

interface ListInterface
{
    public function size(): int;
    public function get(int $i): mixed;
    // for set and remove, we return the old value so that it wont be lost forever
    public function set(int $i, mixed $x): mixed;
    public function add(int $i, mixed $x): void;
    public function remove(int $i): mixed;
}
