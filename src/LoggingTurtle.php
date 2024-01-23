<?php
declare(strict_types=1);

namespace Nassau\Turtle;

use Nassau\Turtle\State\TurtleState;
use Psr\Log\LoggerInterface;

final readonly class LoggingTurtle implements Turtle
{
    public function __construct(
        private Turtle $turtle,
        private LoggerInterface $logger,
    ) {}

    public function penUp(TurtleState $state): TurtleState
    {
        if ($state->pen->isDown()) {
            $this->logger->info(sprintf('[%s] Pen up', $state->position));
        }
        return $this->turtle->penUp($state);
    }

    public function penDown(TurtleState $state): TurtleState
    {
        if ($state->pen->isUp()) {
            $this->logger->info(sprintf('[%s] Pen down', $state->position));
        }
        return $this->turtle->penDown($state);
    }

    public function moveForward(TurtleState $state, int $distance): TurtleState
    {
        $this->logger->info(
            sprintf(
                '[%s] Move forward by %d units at an angle %s',
                $state->position,
                $distance,
                $state->angle,
            ),
        );
        return $this->turtle->moveForward($state, $distance);
    }

    public function turnLeft(TurtleState $state, int $degrees): TurtleState
    {
        $this->logger->info(sprintf('[%s] Turn left by %d degrees', $state->position, $degrees));
        return $this->turtle->turnLeft($state, $degrees);
    }

    public function turnRight(TurtleState $state, int $degrees): TurtleState
    {
        $this->logger->info(sprintf('[%s] Turn right by %d degrees', $state->position, $degrees));
        return $this->turtle->turnRight($state, $degrees);
    }
}
