<?php

declare(strict_types=1);

namespace MaciejFikus\RSSFetcher\Parser;

interface HTMLParserInterface
{
    public function parse(string $html): string;
}
