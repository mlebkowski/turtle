<?php
declare(strict_types=1);

namespace Nassau\Turtle\Canvas;

final class CanvasSpy implements Canvas
{
    public array $lines = [];

    public function drawLine(Line $line): void
    {
        $this->lines[] = $line;
    }
}
