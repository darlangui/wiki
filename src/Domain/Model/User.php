<?php

namespace wiki\src\Domain\Model;
class User
{
    private readonly int $id;
    private string $name;
    private string $email;
    private string $password;
    private string $imageProfile;
    private bool $status;
    /** @var Post[]  */
    private array $posts;
    /** @var Formation[] */
    private array $formations;


    public function __construct(int $id, string $name, string $email, string $password, string $imageProfile, bool $status)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->imageProfile = $imageProfile;
        $this->status = $status;
    }

    // getters
    public function id() : int
    {
        return $this->id;
    }

    public function name() : string
    {
        return $this->name;
    }

    public function email() : string
    {
        return $this->email;
    }


    public function password() : string
    {
        return $this->password;
    }

    public function imageProfile() : string
    {
        return $this->imageProfile;
    }

    public function status() : bool
    {
        return $this->status;
    }

    /** @return Post[] */
    public function posts() : array
    {
        return $this->posts;
    }

    /** @return Formation[] */
    public function formation() : array
    {
        return $this->formations;
    }

    //setters

    public function changeName(string $newName) : void
    {
        $this->name = $newName;
    }

    public function changeEmail(string $newEmail) : void
    {
        $this->email = $newEmail;
    }

    public function changeImageProfile(string $newImageProfile) : void
    {
        $this->imageProfile = $newImageProfile;
    }


    public function changeStatus(bool $newStatus) : void
    {
        $this->status = $newStatus;
    }

    public function addPost(Post $post) : void
    {
        $this->posts[] = $post;
    }

    public function addFormation(Formation $formation) : void
    {
        $this->formations[] = $formation;
    }
}