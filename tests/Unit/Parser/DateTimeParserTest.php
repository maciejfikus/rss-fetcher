<?php

declare(strict_types=1);

namespace Tests\MaciejFikus\RSSFetcher\Unit\Parser;

use MaciejFikus\RSSFetcher\Parser\DateTimeParser;
use PHPUnit\Framework\TestCase;

final class DateTimeParserTest extends TestCase
{
    public function testParsingDateFromXML(): void
    {
        $date = 'Tue, 03 Sep 2019 10:00:00 +0200';

        $parser = new DateTimeParser();
        $parsed = $parser->parse($date);

        self::assertSame(
            ((new \DateTime('2019/09/03 10:00:00'))->format('d F Y H:m:s')),
            $parsed->format('d F Y H:m:s')
        );
    }
}