<?php

declare(strict_types=1);

namespace MaciejFikus\RSSFetcher\Writer;

use League\Csv\Reader;

final class CSVExtendedWriter implements WriterInterface
{
    /** @var WriterInterface */
    private $writer;

    public function __construct(WriterInterface $writer)
    {
        $this->writer = $writer;
    }

    public function write(array $data, string $outputFile): void
    {
        if (file_exists($outputFile)) {
            $csv = Reader::createFromPath($outputFile, 'r');
            $csv->setHeaderOffset(0);

            $data = array_merge($data, iterator_to_array($csv->getRecords()));
        }

        $this->writer->write($data, $outputFile);
    }
}
