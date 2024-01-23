<?php
declare(strict_types=1);

namespace Nassau\Turtle\Canvas;

use Nassau\Turtle\BusinessTurtle;
use Nassau\Turtle\StatefulTurtle;
use PHPUnit\Framework\TestCase;

final class CanvasTurtleScenario
{
    private StatefulTurtle $sut;

    public static function of(TestCase $testCase): self
    {
        return new self($testCase);
    }

    private function __construct(
        private readonly TestCase $testCase,
        private readonly Canvas $canvas = new CanvasSpy(),
    ) {
        $this->sut = StatefulTurtle::create(new CanvasTurtle($canvas, new BusinessTurtle()));
    }

    public function whenOddSidesOfRectangleAreDrawn(int $sideLength): self
    {
        $this->sut->moveForward($sideLength);
        $this->sut->turnRight(90);
        $this->sut->penUp();
        $this->sut->moveForward($sideLength);
        $this->sut->turnRight(90);
        $this->sut->penDown();
        $this->sut->moveForward($sideLength);
        $this->sut->turnRight(90);
        $this->sut->penUp();
        $this->sut->moveForward($sideLength);
        $this->sut->turnRight(90);
        $this->sut->penDown();
        return $this;
    }

    public function thenCanvasLinesAreExpected(string ...$lines): self
    {
        $this->testCase::assertEquals($lines, $this->canvas->lines);
        return $this;
    }
}
