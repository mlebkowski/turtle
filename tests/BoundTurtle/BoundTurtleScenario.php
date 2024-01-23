<?php
declare(strict_types=1);

namespace Nassau\Turtle\BoundTurtle;

use Nassau\Turtle\BusinessTurtle;
use Nassau\Turtle\State\Point;
use Nassau\Turtle\State\TurtleState;
use PHPUnit\Framework\TestCase;
use Throwable;

final class BoundTurtleScenario
{
    private Rectangle $boundingBox;
    private Throwable|TurtleState $actual;

    public static function of(TestCase $testCase): self
    {
        return new self($testCase);
    }

    private function __construct(private readonly TestCase $testCase)
    {
        $this->boundingBox = Rectangle::of(Point::of(1, 1), Point::of(0, 0));
    }

    public function givenBoundingBox(Rectangle $boundingBox): self
    {
        $this->boundingBox = $boundingBox;
        return $this;
    }

    public function whenTurtleMoves(int $distance): self
    {
        $sut = new BoundTurtle($this->boundingBox, new BusinessTurtle());
        try {
            $this->actual = $sut->moveForward(TurtleState::initial(), $distance);
        } catch (Throwable $e) {
            $this->actual = $e;
        }
        return $this;
    }

    public function thenThePositionIs(Point $expected): self
    {
        $this->testCase::assertEquals(
            TurtleState::class,
            $this->actual::class,
            'SUT did not return expected state',
        );
        $this->testCase::assertEquals($expected, $this->actual->position);
        return $this;
    }

    public function thenOutOfBoundsExceptionIsExpected(string $message): self
    {
        $this->testCase::assertEquals(
            OutOfBoundsException::class,
            $this->actual::class,
            'SUT did not throw the expected exception',
        );
        $this->testCase::assertEquals($message, $this->actual->getMessage());
        return $this;
    }
}
