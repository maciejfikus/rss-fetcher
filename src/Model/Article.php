<?php

declare(strict_types=1);

namespace MaciejFikus\RSSFetcher\Model;

use DateTime;
use DateTimeInterface;

final class Article
{
    /** @var string */
    private $title;

    /** @var string */
    private $description;

    /** @var string */
    private $link;

    /** @var DateTime */
    private $pubDate;

    /** @var string */
    private $creator;

    public function __construct(
        string $title,
        string $description,
        string $link,
        DateTimeInterface $pubDate,
        ?string $creator = null
    ) {
        $this->title = $title;
        $this->description = $description;
        $this->link = $link;
        $this->creator = $creator;
        $this->pubDate = $pubDate;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function getPubDate(): DateTimeInterface
    {
        return $this->pubDate;
    }

    public function getCreator(): ?string
    {
        return $this->creator;
    }

    public function toArray()
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'link' => $this->link,
            'pubDate' => ($this->pubDate)->format('d F Y H:m:s'),
            'creator' => $this->creator,
        ];
    }
}
