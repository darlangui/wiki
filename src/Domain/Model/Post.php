<?php

namespace wiki\src\Domain\Model;

use Cassandra\Date;

class Post
{
    private readonly int $id;
    private string $section;
    private string $title;
    private string $information;
    private string $imagePost;
    private \DateTimeImmutable $date;

    public function __construct(string $section, string $title, string $information, string $imagePost, \DateTimeImmutable $date)
    {
        $this->section = $section;
        $this->title = $title;
        $this->information = $information;
        $this->date = $date;
        $this->imagePost = $imagePost;
    }

    public function section(): string
    {
        return $this->section;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function information(): string
    {
        return $this->information;
    }

    public function date(): \DateTimeImmutable
    {
        return $this->date;
    }

    public function alterSection(string $section) : void
    {
        $this->section = $section;
    }

    public function alterTitle(string $title) : void
    {
        $this->title = $title;
    }

    public function alterInformation(string $information) : void
    {
        $this->information = $information;
    }
}