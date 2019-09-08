<?php

declare(strict_types=1);

namespace MaciejFikus\RSSFetcher\Writer;

interface WriterInterface
{
    public function write(array $data, string $outputFile): void;
}
