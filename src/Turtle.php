<?php
declare(strict_types=1);

namespace Nassau\Turtle;

use Nassau\Turtle\State\TurtleState;

interface Turtle
{
    public function penUp(TurtleState $state): TurtleState;

    public function penDown(TurtleState $state): TurtleState;

    /**
     * @throws TurtleException
     */
    public function moveForward(TurtleState $state, int $distance): TurtleState;

    public function turnLeft(TurtleState $state, int $degrees): TurtleState;

    public function turnRight(TurtleState $state, int $degrees): TurtleState;
}
