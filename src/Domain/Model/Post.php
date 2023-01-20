<?php

namespace pdo\Domain\Model;

class Post
{
    private readonly int $id;
    private string $title;
    private string $information;
    private \DateTimeImmutable $date;
    private string $status;
    private string $image;

    public function __construct(int $id, string $title, string $information, \DateTimeImmutable $date, string $status, string $image)
    {
        $this->id = $id;
        $this->title = $title;
        $this->information = $information;
        $this->date = $date;
        $this->status = $status;
        $this->image = $image;
    }

    // Getters
    public function id(): int
    {
        return $this->id;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function information(): string
    {
        return $this->information;
    }

    public function date(\DateTimeImmutable $date): void
    {
        $this->date = $date;
    }

    public function status(): string
    {
        return $this->status;
    }

    public function image(): string
    {
        return $this->image;
    }

    // Setters

    public function changeTitle(string $title): void
    {
        $this->title = $title;
    }

    public function changeInformation(string $information) : void
    {
        $this->information = $information;
    }

    public function changeImage(string $image) : void
    {
        $this->image = $image;
    }

    public function changeStatus(string $status) : void
    {
        $this->status = $status;
    }


}