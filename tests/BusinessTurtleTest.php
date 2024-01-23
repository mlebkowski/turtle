<?php
declare(strict_types=1);

namespace Nassau\Turtle;

use Nassau\Turtle\State\Point;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use PHPUnit\Framework\TestCase;

final class BusinessTurtleTest extends TestCase
{
    #[DataProviderExternal(BusinessTurtleDataProvider::class, 'move_forward')]
    public function testMoveForward(int $distance, int $angle, Point $expected): void
    {
        BusinessTurtleScenario::of($this)
            ->givenTurtleIsFacing($angle)
            ->whenItMovesForward($distance)
            ->thenItArrivesAt($expected);
    }

    public function testTurnAndMove(): void
    {
        BusinessTurtleScenario::of($this)
            ->whenTurtleTurnsLeft(degrees: 90)
            ->andMovesForward(distance: 100)
            ->thenItArrivesAt(Point::of(x: 0, y: 100));
    }
}
