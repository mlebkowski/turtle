<?php
declare(strict_types=1);

namespace Nassau\Turtle\Canvas;

use Nassau\Turtle\State\Point;
use Stringable;

final readonly class Line implements Stringable
{
    public static function of(Point $start, Point $end): self
    {
        return new self($start, $end);
    }

    private function __construct(public Point $start, public Point $end) {}

    public function __toString(): string
    {
        return sprintf('%s → %s', $this->start, $this->end);
    }
}
