<?php

namespace MaciejFikus\RSSFetcher\Parser;

final class HTMLParser implements HTMLParserInterface
{
    public function parse(string $html): string
    {
        return ltrim(strip_tags($html), ' ');
    }
}
