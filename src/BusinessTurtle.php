<?php
declare(strict_types=1);

namespace Nassau\Turtle;

use Nassau\Turtle\State\PenState;
use Nassau\Turtle\State\Point;
use Nassau\Turtle\State\TurtleState;

final readonly class BusinessTurtle implements Turtle
{
    public function penUp(TurtleState $state): TurtleState
    {
        return $state->withPen(PenState::Up);
    }

    public function penDown(TurtleState $state): TurtleState
    {
        return $state->withPen(PenState::Down);
    }

    public function moveForward(TurtleState $state, int $distance): TurtleState
    {
        $angle = $state->angle->rad() * -1;
        $xFactor = cos($angle);
        $yFactor = sin($angle);
        $xDistance = (int)round($distance * $xFactor);
        $yDistance = (int)round($distance * $yFactor);
        $vector = Point::of(x: $xDistance, y: $yDistance);

        return $state->withPosition($state->position->add($vector));
    }

    public function turnLeft(TurtleState $state, int $degrees): TurtleState
    {
        return $state->withAngle($state->angle->sub($degrees));
    }

    public function turnRight(TurtleState $state, int $degrees): TurtleState
    {
        return $state->withAngle($state->angle->add($degrees));
    }
}
