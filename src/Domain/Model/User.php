<?php

namespace wiki\src\Domain\Model;
class User
{
    private readonly int $id;
    private string $name;
    private string $email;
    private string $password;
    private string $imageProfile;
    /** @var Post[]  */
    private array $posts;
    private string $status;


    public function __construct(int $id, string $name, string $email, string $password, string $imageProfile)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->imageProfile = $imageProfile;
    }

    public function id() : ?int
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

    public function status() : string
    {
        return $this->status;
    }

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

    public function addPost(Post $post) : void
    {
        $this->posts[] = $post;
    }

    /** @return Post[] */
    public function posts() : array
    {
        return $this->posts;
    }

    public function changeStatus(string $newStatus) : void
    {
        $this->status = $newStatus;
    }
}