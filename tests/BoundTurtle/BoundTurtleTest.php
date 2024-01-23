<?php
declare(strict_types=1);

namespace Nassau\Turtle\BoundTurtle;

use Nassau\Turtle\State\Point;
use PHPUnit\Framework\TestCase;

final class BoundTurtleTest extends TestCase
{
    public function testMovesWithinBounds(): void
    {
        BoundTurtleScenario::of($this)
            ->givenBoundingBox(Rectangle::of(Point::of(-50, -50), Point::of(50, 50)))
            ->whenTurtleMoves(distance: 30)
            ->thenThePositionIs(Point::of(x: 30, y: 0));
    }

    public function testDoesNotMoveOutOfBounds(): void
    {
        BoundTurtleScenario::of($this)
            ->givenBoundingBox(Rectangle::of(Point::of(-50, -50), Point::of(50, 50)))
            ->whenTurtleMoves(distance: 100)
            ->thenOutOfBoundsExceptionIsExpected(
                'Moved to 100×0 outside of rect<-50×-50, 50×50>',
            );
    }
}
