<?php

declare(strict_types=1);

namespace MaciejFikus\RSSFetcher\Parser;

use DateTimeInterface;

interface DateTimeParserInterface
{
    public function parse(string $dateTime): DateTimeInterface;
}
