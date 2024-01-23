<?php
declare(strict_types=1);

namespace Nassau\Turtle\State;

enum PenState
{
    case Up;
    case Down;

    public function isUp(): bool
    {
        return $this === self::Up;
    }

    public function isDown(): bool
    {
        return $this === self::Down;
    }
}
