<?php
declare(strict_types=1);

namespace Nassau\Turtle\Canvas;

use PHPUnit\Framework\TestCase;

final class CanvasTurtleTest extends TestCase
{
    public function test(): void
    {
        CanvasTurtleScenario::of($this)
            ->whenOddSidesOfRectangleAreDrawn(sideLength: 100)
            ->thenCanvasLinesAreExpected(
                '0×0 → 100×0',
                '100×100 → 0×100',
            );
    }
}
