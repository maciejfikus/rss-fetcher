<?php

declare(strict_types=1);

namespace MaciejFikus\RSSFetcher\Converter;

use MaciejFikus\RSSFetcher\Model\Articles;

interface ArticlesConverterInterface
{
    public function convert(iterable $rssArticles): Articles;
}