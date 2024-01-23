<?php
declare(strict_types=1);

namespace Nassau\Turtle;

use Nassau\Turtle\State\Angle;
use Nassau\Turtle\State\Point;
use PHPUnit\Framework\TestCase;

final class StatefulTurtleTest extends TestCase
{
    public function testAngles(): void
    {
        StatefulTurtleScenario::of($this)
            ->whenTurtleTurnsLeft(degrees: 90)
            ->thenTheAngleIs(Angle::of(270));
    }

    public function testMoves(): void
    {
        StatefulTurtleScenario::of($this)
            ->whenTurtleTurnsLeft(degrees: 90)
            ->andMovesForward(distance: 100)
            ->thenThePositionIs(Point::of(0, 100));
    }
}
