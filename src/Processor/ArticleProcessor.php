<?php

declare(strict_types=1);

namespace MaciejFikus\RSSFetcher\Processor;

use League\Csv\Writer;
use MaciejFikus\RSSFetcher\Converter\ArticlesConverter;
use MaciejFikus\RSSFetcher\Converter\ArticlesConverterInterface;
use MaciejFikus\RSSFetcher\Reader\XMLReader;
use MaciejFikus\RSSFetcher\Writer\WriterInterface;

final class ArticleProcessor implements ProcessorInterface
{
    private const STORAGE_PATH = 'storage/';

    private $articlesConverter;
    private $writer;

    public function __construct(ArticlesConverterInterface $articlesConverter, WriterInterface $writer)
    {
        $this->articlesConverter = $articlesConverter;
        $this->writer = $writer;
    }

    public function process(string $sourceFile, string $outputFile): void
    {
        $xml = XMLReader::read($sourceFile);
        $sourceArticles = $xml['channel']['item'];
        $articles = $this->articlesConverter->convert($sourceArticles);

        $this->writer->write($articles->all(), $this->prepareStoragePath($outputFile));
    }

    private function prepareStoragePath(string $outputFile): string
    {
        //TODO: place $outputFile path in some config, i.e. .env
        //TODO: prepare proper path validation, extension check, trailing slash variants

        if (strpos($outputFile, self::STORAGE_PATH) === 0) {
            return $outputFile;
        }

        return self::STORAGE_PATH . $outputFile;
    }
}
