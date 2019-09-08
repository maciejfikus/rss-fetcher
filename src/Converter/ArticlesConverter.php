<?php

declare(strict_types=1);

namespace MaciejFikus\RSSFetcher\Converter;

use MaciejFikus\RSSFetcher\Model\Article;
use MaciejFikus\RSSFetcher\Model\Articles;
use MaciejFikus\RSSFetcher\Parser\DateTimeParserInterface;
use MaciejFikus\RSSFetcher\Parser\HTMLParserInterface;

final class ArticlesConverter implements ArticlesConverterInterface
{
    private $htmlParser;
    private $dateTimeParser;

    public function __construct(HTMLParserInterface $htmlParser, DateTimeParserInterface $dateTimeParser)
    {
        $this->htmlParser = $htmlParser;
        $this->dateTimeParser = $dateTimeParser;
    }

    public function convert(iterable $rssArticles): Articles
    {
        return new Articles(...$this->convertRSSArticles($rssArticles));
    }

    private function convertRSSArticles(iterable $rssArticles): iterable
    {
        foreach ($rssArticles as $article) {

            //TODO: Validate incoming array for existence of required keys

            yield new Article(
                $article['title'],
                $this->htmlParser->parse($article['description']),
                $article['link'],
                $this->dateTimeParser->parse($article['pubDate']),
                $article['author'] ?? null
            );
        }
    }
}
