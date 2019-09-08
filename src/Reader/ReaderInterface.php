<?php

namespace MaciejFikus\RSSFetcher\Reader;

interface ReaderInterface
{
    public static function read(string $sourceFile): array;
}
