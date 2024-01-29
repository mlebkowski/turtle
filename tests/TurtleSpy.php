<?php
declare(strict_types=1);

namespace Nassau\Turtle;

use Nassau\Turtle\State\TurtleState;

final class TurtleSpy implements Turtle
{
    public const string TURN_LEFT = 'turn left %d';
    public const string TURN_RIGHT = 'turn right %d';
    public const string MOVE_FORWARD = 'move forward %d';
    public const string PEN_UP = 'pen up';
    public const string PEN_DOWN = 'pen down';

    public array $calls = [];

    public function penUp(TurtleState $state): TurtleState
    {
        $this->calls[] = self::PEN_UP;
        return $state;
    }

    public function penDown(TurtleState $state): TurtleState
    {
        $this->calls[] = self::PEN_DOWN;
        return $state;
    }

    public function moveForward(TurtleState $state, int $distance): TurtleState
    {
        $this->calls[] = sprintf(self::MOVE_FORWARD, $distance);
        return $state;
    }

    public function turnLeft(TurtleState $state, int $degrees): TurtleState
    {
        $this->calls[] = sprintf(self::TURN_LEFT, $degrees);
        return $state;
    }

    public function turnRight(TurtleState $state, int $degrees): TurtleState
    {
        $this->calls[] = sprintf(self::TURN_RIGHT, $degrees);
        return $state;
    }
}
