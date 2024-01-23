<?php
declare(strict_types=1);

namespace Nassau\Turtle\BoundTurtle;

use Nassau\Turtle\State\TurtleState;
use Nassau\Turtle\Turtle;

final readonly class BoundTurtle implements Turtle
{
    public function __construct(
        private Rectangle $boundingBox,
        private Turtle $turtle,
    ) {}

    public function penUp(TurtleState $state): TurtleState
    {
        return $this->turtle->penUp($state);
    }

    public function penDown(TurtleState $state): TurtleState
    {
        return $this->turtle->penDown($state);
    }

    public function moveForward(TurtleState $state, int $distance): TurtleState
    {
        $newState = $this->turtle->moveForward($state, $distance);
        OutOfBoundsException::whenMovedOutsideTheBoundingBox($newState->position, $this->boundingBox);
        return $newState;
    }

    public function turnLeft(TurtleState $state, int $degrees): TurtleState
    {
        return $this->turtle->turnLeft($state, $degrees);
    }

    public function turnRight(TurtleState $state, int $degrees): TurtleState
    {
        return $this->turtle->turnRight($state, $degrees);
    }
}
