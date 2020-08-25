<?php


namespace App\Helpers;


class UserRoleCourseLecturer
{

    public int $count;
    public string $lecturer;
    public string $email;

    public function __construct(string $lecturer, string $email, int $count = 0)
    {
        $this->lecturer = $lecturer;
        $this->email = $email;
        $this->count = $count;
    }
}
