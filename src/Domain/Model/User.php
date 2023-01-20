<?php

namespace pdo\Domain\Model;
class User
{
    private readonly int $id;
    private string $name;
    private string $email;
    private string $password;
    private string $image;
    private string $description;
    /** @var Post[]  */
    private array $posts;
    /** @var Specialization[] */
    private array $specialization;

    public function __construct(int $id, string $name, string $email, string $password, string $description, string $image)
    {
        $this->id = $id;
        $this->email = $email;
        $this->name = $name;
        $this->password = $password;
        $this->image = $image;
        $this->description = $description;
    }

    // Getters
    public function id() : int
    {
        return $this->id;
    }

    public function name() : string
    {
        return $this->name;
    }

    public function password(): string
    {
        return $this->password;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function image(): string
    {
        return $this->image;
    }

    public function description() : string
    {
        return $this->description;
    }

    // Setters

    public function changeName(string $name): void
    {
        $this->name = $name;
    }

    public function changeEmail(string $email) : void
    {
        $this->email = $email;
    }

    public function changeDescription(string $description) : void
    {
        $this->description = $description;
    }

    public function changeImage(string $image): void
    {
        $this->image = $image;
    }

    public function addPost(Post $post) : void
    {
        $this->posts[] = $post;
    }

    public function addSpecialization(Specialization $specialization) : void
    {
        $this->$specialization[] = $specialization;
    }
}