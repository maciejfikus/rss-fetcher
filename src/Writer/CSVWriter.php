<?php

declare(strict_types=1);

namespace MaciejFikus\RSSFetcher\Writer;

use League\Csv\Writer;

final class CSVWriter implements WriterInterface
{
    public function write(array $data, string $outputFile): void
    {
        $writer = Writer::createFromPath($outputFile, 'w+');

        $writer->insertOne(['title', 'description', 'link', 'pubDate', 'creator']);
        $writer->insertAll($data);
    }
}
