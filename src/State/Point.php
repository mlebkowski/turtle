<?php
declare(strict_types=1);

namespace Nassau\Turtle\State;

use Stringable;

final readonly class Point implements Stringable
{
    public static function start(): self
    {
        return self::of(x: 0, y: 0);
    }

    public static function of(int $x, int $y): self
    {
        return new self(x: $x, y: $y);
    }

    private function __construct(public int $x, public int $y) {}

    public function add(Point $vector): self
    {
        return self::of(x: $this->x + $vector->x, y: $this->y + $vector->y);
    }

    public function __toString(): string
    {
        return sprintf('%d×%d', $this->x, $this->y);
    }
}
