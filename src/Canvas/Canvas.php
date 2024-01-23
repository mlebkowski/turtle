<?php
declare(strict_types=1);

namespace Nassau\Turtle\Canvas;

interface Canvas
{
    public function drawLine(Line $line): void;
}
