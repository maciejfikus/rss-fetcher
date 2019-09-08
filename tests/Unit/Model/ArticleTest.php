<?php

declare(strict_types=1);

namespace Tests\MaciejFikus\RSSFetcher\Unit\Model;

use MaciejFikus\RSSFetcher\Model\Article;
use PHPUnit\Framework\TestCase;

final class ArticleTest extends TestCase
{
    public function testCreatingNewArticleWithFullData(): void
    {
        $data = [
            'title' => 'Il declino silenzioso degli ornitorinchi',
            'descrition' => 'Il declino silenzioso degli ornitorinchi',
            'link' => 'http://www.nationalgeographic.it/popoli-culture/2019/08/21/news/un_indizio_su_amelia_earhart_dai_granchi_del_cocco-4514275/?rss',
            'pubDate' => new \DateTime('Tue, 03 Sep 2019 13:04:16 +0200'),
            'creator' => 'Maciej Fikus of Notredame'
        ];

        $article = new Article($data['title'], $data['descrition'], $data['link'], $data['pubDate'], $data['creator']);

        self::assertEquals($data['pubDate']->format('m F Y H:m:s'), $article->getPubDate()->format('m F Y H:m:s'));
        self::assertEquals($data['creator'], $article->getCreator());
        self::assertNotNull($article->getDescription());
        self::assertNotNull($article->getLink());
        self::assertNotNull($article->getTitle());
    }

    public function testCreatingNewArticleWithoutCreator(): void
    {
        $data = [
            'title' => 'Il declino silenzioso degli ornitorinchi',
            'descrition' => 'Il declino silenzioso degli ornitorinchi',
            'link' => 'http://www.nationalgeographic.it/popoli-culture/2019/08/21/news/un_indizio_su_amelia_earhart_dai_granchi_del_cocco-4514275/?rss',
            'pubDate' => new \DateTime('Tue, 03 Sep 2019 13:04:16 +0200')
        ];

        $article = new Article($data['title'], $data['descrition'], $data['link'], $data['pubDate']);

        self::assertEquals($data['pubDate']->format('m F Y H:m:s'), $article->getPubDate()->format('m F Y H:m:s'));
        self::assertNull($article->getCreator());
        self::assertNotNull($article->getDescription());
        self::assertNotNull($article->getLink());
        self::assertNotNull($article->getTitle());
    }
}