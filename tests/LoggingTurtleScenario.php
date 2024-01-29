<?php
declare(strict_types=1);

namespace Nassau\Turtle;

use Nassau\Turtle\State\TurtleState;
use PHPUnit\Framework\TestCase;

final readonly class LoggingTurtleScenario
{
    private TurtleState $state;
    private TurtleSpy $turtle;
    private LoggerSpy $logger;

    public static function of(TestCase $testCase): self
    {
        return new self($testCase);
    }

    private function __construct(private TestCase $testCase)
    {
        $this->turtle = new TurtleSpy();
        $this->logger = new LoggerSpy();
        $this->state = TurtleState::initial();
    }

    public function whenTurtleTurnsLeft(int $degrees): self
    {
        $sut = new LoggingTurtle($this->turtle, $this->logger);

        $sut->turnLeft($this->state, $degrees);
        return $this;
    }

    public function whenTurtleTurnsRight(int $degrees): self
    {
        $sut = new LoggingTurtle($this->turtle, $this->logger);

        $sut->turnRight($this->state, $degrees);
        return $this;
    }

    public function whenTurtleMovesForward(int $distance): self
    {
        $sut = new LoggingTurtle($this->turtle, $this->logger);

        $sut->moveForward($this->state, $distance);
        return $this;
    }

    public function thenMessageIsLogged(string ...$messages): self
    {
        $actual = array_splice($this->logger->logs, 0);
        $this->testCase::assertSame($messages, $actual);
        return $this;
    }

    public function andTurtleReceivedInstruction(string $instruction, mixed ...$rest): self
    {
        $expected = sprintf($instruction, ...$rest);
        $actual = array_shift($this->turtle->calls);
        $this->testCase::assertSame($expected, $actual);
        return $this;
    }
}
