<?php

declare(strict_types=1);

namespace Fikri\OpenDsaTutorial\Chapter_1;

class DyckValidator
{
    public static function isDyck(array $sequence): bool
    {
        $sum = 0;

        foreach ($sequence as $value) {
            $sum += $value;

            if ($sum < 0) {
                return false;
            }
        }

        return $sum === 0;
    }
}
