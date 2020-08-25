<?php

namespace App\Helpers;


class UserRoleCourse
{
    public string $course_name;
    public string $course_category;
    public array $lecturers = [];

    public function __construct(string $course_name, string $course_category, array $lecturer = [])
    {
        $this->course_name = $course_name;
        $this->course_category = $course_category;
        $this->lecturers = $lecturer;
    }

    public function add_lecturer(string $name, string $email, int $count = 0)
    {
        array_push($this->lecturers, new UserRoleCourseLecturer($name, $email, $count));
    }

    // Get the lecturer index based on his/her name and email
    public function get_lecturer_idx(string $name, string $email): ?int
    {
        foreach ($this->lecturers as $key => $lecturer) {
            if ($lecturer->name === $name && $lecturer->email === $email) {
                return $key;
            }
        }
        return null;
    }
}
