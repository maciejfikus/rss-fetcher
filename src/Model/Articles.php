<?php

declare(strict_types=1);

namespace MaciejFikus\RSSFetcher\Model;

final class Articles
{
    /** @var Article[] */
    private $articles;

    public function __construct(Article ...$articles)
    {
        $this->articles = $articles;
    }

    public function all(): array
    {
        return array_map(
            static function (Article $article): array {
                return $article->toArray();
            },
            $this->articles
        );
    }
}
