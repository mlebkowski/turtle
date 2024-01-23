<?php
declare(strict_types=1);

namespace Nassau\Turtle\Canvas;

use Nassau\Turtle\State\Point;
use Nassau\Turtle\State\TurtleState;
use Nassau\Turtle\Turtle;

final readonly class CanvasTurtle implements Turtle
{
    public function __construct(
        private Canvas $canvas,
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
        $start = $state->position;
        $state = $this->turtle->moveForward($state, $distance);
        $end = $state->position;

        if ($state->pen->isDown()) {
            $this->canvas->drawLine(
                Line::of(
                    start: Point::of(x: $start->x, y: $start->y * -1),
                    end: Point::of(x: $end->x, y: $end->y * -1),
                ),
            );
        }

        return $state;
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
