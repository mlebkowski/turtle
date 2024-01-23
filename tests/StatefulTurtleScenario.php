<?php
declare(strict_types=1);

namespace Nassau\Turtle;

use PHPUnit\Framework\TestCase;

final class StatefulTurtleScenario
{
    public static function of(TestCase $testCase): self
    {
        return new self($testCase, StatefulTurtle::create());
    }

    private function __construct(
        private readonly TestCase $testCase,
        private readonly StatefulTurtle $turtle,
    ) {}

    public function andMovesForward(int $distance): self
    {
        $this->turtle->moveForward(distance: $distance);
        return $this;
    }

    public function thenTheAngleIs(State\Angle $expected): self
    {
        $this->testCase::assertEquals($expected, $this->turtle->angle());
        return $this;
    }

    public function thenThePositionIs(State\Point $expected): self
    {
        $this->testCase::assertEquals($expected, $this->turtle->position());
        return $this;
    }

    public function whenTurtleTurnsLeft(int $degrees): self
    {
        $this->turtle->turnLeft(degrees: $degrees);
        return $this;
    }
}
