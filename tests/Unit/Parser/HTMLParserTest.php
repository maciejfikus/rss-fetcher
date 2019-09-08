<?php

declare(strict_types=1);

namespace Tests\MaciejFikus\RSSFetcher\Unit\Parser;

use MaciejFikus\RSSFetcher\Parser\HTMLParser;
use PHPUnit\Framework\TestCase;

final class HTMLParserTest extends TestCase
{
    public function testParsingHTMLString(): void
    {
        $date = '<a href="#"><button type="button"> TEST</button></a>';

        $parser = new HTMLParser();
        $parsed = $parser->parse($date);

        self::assertSame('TEST', $parsed);
    }
}