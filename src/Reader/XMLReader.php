<?php

declare(strict_types=1);

namespace MaciejFikus\RSSFetcher\Reader;

final class XMLReader implements ReaderInterface
{
    public static function read(string $sourceFile): array
    {
        $feed = @simplexml_load_file($sourceFile, null, LIBXML_NOCDATA);

        if (!$feed) {
            throw new \InvalidArgumentException('Unable to reach RSS feed!', 404);
        }

        return self::toArray($feed);
    }

    private static function toArray($xml): array
    {
        $array = json_decode(json_encode((array)$xml), true);
        return $array;
    }
}
