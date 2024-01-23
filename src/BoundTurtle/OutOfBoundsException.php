<?php
declare(strict_types=1);

namespace Nassau\Turtle\BoundTurtle;

use Exception;
use Nassau\Turtle\State\Point;
use Nassau\Turtle\TurtleException;

final class OutOfBoundsException extends Exception implements TurtleException
{
    /**
     * @throws OutOfBoundsException
     */
    public static function whenMovedOutsideTheBoundingBox(Point $position, Rectangle $boundingBox): void
    {
        if (false === $boundingBox->contains($position)) {
            throw new self(
                sprintf(
                    'Moved to %s outside of rect<%s, %s>',
                    $position,
                    $boundingBox->bottomLeft,
                    $boundingBox->topRight,
                ),
            );
        }
    }
}
