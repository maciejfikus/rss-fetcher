<?php

declare(strict_types=1);

namespace MaciejFikus\RSSFetcher\Processor;

interface ProcessorInterface
{
    public function process(string $sourceFile, string $outputFile): void;
}
