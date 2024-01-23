<?php
declare(strict_types=1);

namespace Nassau\Turtle\BoundTurtle;

use Nassau\Turtle\State\Point;
use RuntimeException;

final readonly class Rectangle
{
    public static function of(Point $alpha, Point $bravo): self
    {
        if ($alpha->x === $bravo->x || $alpha->y === $bravo->y) {
            throw new RuntimeException('Rectangle needs two dimensions');
        }

        return new self(
            Point::of(
                x: min($alpha->x, $bravo->x),
                y: min($alpha->x, $bravo->x),
            ),
            Point::of(
                x: max($alpha->x, $bravo->x),
                y: max($alpha->x, $bravo->x),
            ),
        );
    }

    private function __construct(
        public Point $bottomLeft,
        public Point $topRight,
    ) {}

    public function contains(Point $position): bool
    {
        return $this->bottomLeft->x <= $position->x && $position->x <= $this->topRight->x
            && $this->bottomLeft->y <= $position->y && $position->y <= $this->topRight->y;
    }
}
