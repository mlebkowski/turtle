<?php
declare(strict_types=1);

namespace Nassau\Turtle;

use Nassau\Turtle\State\Angle;
use Nassau\Turtle\State\PenState;
use Nassau\Turtle\State\Point;
use Nassau\Turtle\State\TurtleState;

final class StatefulTurtle
{
    public static function create(Turtle $turtle = new BusinessTurtle()): self
    {
        return new self(TurtleState::initial(), $turtle);
    }

    private function __construct(
        private TurtleState $state,
        private readonly Turtle $turtle,
    ) {}

    public function position(): Point
    {
        return $this->state->position;
    }

    public function angle(): Angle
    {
        return $this->state->angle;
    }

    public function pen(): PenState
    {
        return $this->state->pen;
    }

    public function penUp(): void
    {
        $this->state = $this->turtle->penUp($this->state);
    }

    public function penDown(): void
    {
        $this->state = $this->turtle->penDown($this->state);
    }

    public function moveForward(int $distance): void
    {
        $this->state = $this->turtle->moveForward($this->state, $distance);
    }

    public function turnLeft(int $degrees): void
    {
        $this->state = $this->turtle->turnLeft($this->state, $degrees);
    }

    public function turnRight(int $degrees): void
    {
        $this->state = $this->turtle->turnRight($this->state, $degrees);
    }
}
