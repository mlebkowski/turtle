<?php
declare(strict_types=1);

namespace Nassau\Turtle;

use PHPUnit\Framework\TestCase;

final class LoggingTurtleTest extends TestCase
{
    public function testTurnsLeft(): void
    {
        LoggingTurtleScenario::of($this)
            ->whenTurtleTurnsLeft(degrees: 90)
            ->thenMessageIsLogged('[0×0] Turn left by 90 degrees')
            ->andTurtleReceivedInstruction(TurtleSpy::TURN_LEFT, 90);
    }

    public function testTurnsRight(): void
    {
        LoggingTurtleScenario::of($this)
            ->whenTurtleTurnsRight(degrees: 60)
            ->thenMessageIsLogged('[0×0] Turn right by 60 degrees')
            ->andTurtleReceivedInstruction(TurtleSpy::TURN_RIGHT, 60);
    }

    public function testMovesForward(): void
    {
        LoggingTurtleScenario::of($this)
            ->whenTurtleMovesForward(distance: 10)
            ->thenMessageIsLogged('[0×0] Move forward by 10 units at an angle 0 degrees')
            ->andTurtleReceivedInstruction(TurtleSpy::MOVE_FORWARD, 10);
    }
}
