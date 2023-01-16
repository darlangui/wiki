<?php

namespace wiki\src\Domain\Model;

class Post
{
    private readonly int $id;
    private string $section;
    private string $title;
    private string $information;

    public function __construct(string $section, string $title, string $information)
    {
        $this->section = $section;
        $this->title = $title;
        $this->information = $information;
    }

    public function section(): string
    {
        return $this->section;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function information() : string
    {
        return $this->information;
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