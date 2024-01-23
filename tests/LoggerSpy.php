<?php
declare(strict_types=1);

namespace Nassau\Turtle;

use Psr\Log\LoggerInterface;
use Psr\Log\LoggerTrait;
use Stringable;

final class LoggerSpy implements LoggerInterface
{
    use LoggerTrait;

    public array $logs = [];

    public function log($level, string|Stringable $message, array $context = []): void
    {
        $this->logs[] = (string)$message;
    }
}
