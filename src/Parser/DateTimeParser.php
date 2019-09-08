<?php

namespace MaciejFikus\RSSFetcher\Parser;

use DateTime;
use DateTimeInterface;

final class DateTimeParser implements DateTimeParserInterface
{
    public function parse(string $dateTime): DateTimeInterface
    {
        return new DateTime($dateTime);
    }
}
