<?php
declare(strict_types=1);

namespace Nassau\Turtle\State;

final readonly class TurtleState
{
    public static function initial(): self
    {
        return new self(
            pen: PenState::Down,
            angle: Angle::zero(),
            position: Point::start(),
        );
    }

    private function __construct(
        public PenState $pen,
        public Angle $angle,
        public Point $position,
    ) {}

    public function withAngle(Angle $angle): self
    {
        return new self(
            pen: $this->pen,
            angle: $angle,
            position: $this->position,
        );
    }

    public function withPen(PenState $pen): self
    {
        return new self(
            pen: $pen,
            angle: $this->angle,
            position: $this->position,
        );
    }

    public function withPosition(Point $position): self
    {
        return new self(
            pen: $this->pen,
            angle: $this->angle,
            position: $position,
        );
    }
}
