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
    private string $status;

    public function __construct(string $section, string $title, string $information, string $imagePost, \DateTimeImmutable $date, string $status)
    {
        $this->section = $section;
        $this->title = $title;
        $this->information = $information;
        $this->date = $date;
        $this->imagePost = $imagePost;
        $this->status = $status;
    }

    // getters
    public function id() : int
    {
        return $this->id;
    }

    public function section() : string
    {
        return $this->section;
    }

    public function title() : string
    {
        return $this->title;
    }

    public function information() : string
    {
        return $this->information;
    }

    public function imagePost() : string
    {
        return $this->imagePost;
    }

    public function date() : \DateTimeImmutable
    {
        return $this->date;
    }

    public function status() : string
    {
        return $this->status;
    }

    //setters

    public function changeSection(string $section) : void
    {
        $this->section = $section;
    }

    public function changeTitle(string $title) : void
    {
        $this->title = $title;
    }

    public function changeInformation(string $information) : void
    {
        $this->information = $information;
    }

    public function changeImagePost(string $imagePost) : void
    {
        $this->imagePost = $imagePost;
    }

    public function changeDate(\DateTimeImmutable $date) : void
    {
        $this->date = $date;
    }

    public function changeStatus(string $status) : void
    {
        $this->status = $status;
    }


}