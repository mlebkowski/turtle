<?php
declare(strict_types=1);

namespace Nassau\Turtle;

use Nassau\Turtle\State\Point;

final class BusinessTurtleDataProvider
{
    public static function move_forward(): iterable
    {
        yield [10, 0, Point::of(10, 0)];
        yield [10, 90, Point::of(0, -10)];
        yield [10, 180, Point::of(-10, 0)];
        yield [10, 270, Point::of(0, 10)];
        yield [10, -45, Point::of(7, 7)];
        yield [10, -30, Point::of(9, 5)];
        yield [10, -30 - 90, Point::of(-5, 9)];
        yield [10, -30 - 180, Point::of(-9, -5)];
        yield [10, -30 - 270, Point::of(5, -9)];
    }
}
