<?php
declare(strict_types=1);

namespace Nassau\Turtle;

use Nassau\Turtle\State\Angle;
use Nassau\Turtle\State\TurtleState;
use PHPUnit\Framework\TestCase;

final class BusinessTurtleScenario
{
    private TurtleState $state;

    public static function of(TestCase $testCase): self
    {
        return new self($testCase);
    }

    private function __construct(private readonly TestCase $testCase)
    {
        $this->state = TurtleState::initial();
    }

    public function givenTurtleIsFacing(int $angle): self
    {
        $this->state = $this->state->withAngle(Angle::of($angle));
        return $this;
    }

    public function whenTurtleTurnsLeft(int $degrees): self
    {
        $sut = new BusinessTurtle();

        $this->state = $sut->turnLeft($this->state, $degrees);
        return $this;
    }

    public function whenTurtleMovesForward(int $distance): self
    {
        $sut = new BusinessTurtle();

        $this->state = $sut->moveForward($this->state, $distance);
        return $this;
    }

    public function whenItMovesForward(int $distance): self
    {
        return $this->whenTurtleMovesForward($distance);
    }

    public function andMovesForward(int $distance): self
    {
        return $this->whenTurtleMovesForward($distance);
    }

    public function thenItArrivesAt(State\Point $expected): self
    {
        $this->testCase::assertEquals($expected, $this->state->position);
        return $this;
    }
}
