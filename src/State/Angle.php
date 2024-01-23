<?php
declare(strict_types=1);

namespace Nassau\Turtle\State;

use Stringable;

final readonly class Angle implements Stringable
{
    public static function zero(): self
    {
        return new self(0);
    }

    public static function of(int $degrees): self
    {
        return new self((($degrees % 360) + 360) % 360);
    }

    private function __construct(public int $degrees) {}

    public function add(int $degrees): self
    {
        return self::of($this->degrees + $degrees);
    }

    public function sub(int $degrees): self
    {
        return self::of($this->degrees - $degrees);
    }

    public function rad(): float
    {
        return deg2rad($this->degrees);
    }

    public function __toString(): string
    {
        return sprintf('%d degrees', $this->degrees);
    }
}
