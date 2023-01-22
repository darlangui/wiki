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
    private string $category;

    public function __construct(int $id, string $title, string $information, \DateTimeImmutable $date, string $status, string $image, string $category)
    {
        $this->id = $id;
        $this->title = $title;
        $this->information = $information;
        $this->date = $date;
        $this->status = $status;
        $this->image = $image;
        $this->category = $category;
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

    public function category(): string
    {
        return $this->category;
    }

    public function information(): string
    {
        return $this->information;
    }

    public function date() : \DateTimeImmutable
    {
        return $this->date;
    }

    public function changeCategory(string $category) : void
    {
        $this->category = $category;
    }

    public function changeDate(\DateTimeImmutable $date): void
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