<?php

declare(strict_types=1);

namespace Tests\MaciejFikus\RSSFetcher\Unit\Reader;

use MaciejFikus\RSSFetcher\Model\Article;
use MaciejFikus\RSSFetcher\Reader\XMLReader;
use PHPUnit\Framework\TestCase;

final class XMLReaderTest extends TestCase
{
    public function testXMLParsing(): void
    {
        $xml = 'http://www.nationalgeographic.it/rss/natura/animali/rss2.0.xml';
        $parsed = XMLReader::read($xml);

        self::assertIsArray($parsed);
    }

    public function testFakeXMLParsing(): void
    {
        self::expectExceptionCode(404);

        $xml = 'http://thereisnoxml.com/';
        XMLReader::read($xml);
    }
}