<?php

namespace App\Helpers;


class MapUserRoleCourse
{
    private int $name_idx;
    private int $email_idx;
    private int $category_idx;
    private int $course_name_idx;
    private int $course_id_idx;
    private int $count_idx;

    private int $name_column_name;
    private int $email_column_name;
    private int $category_column_name;
    private int $course_name_column_name;
    private int $course_id_column_name;
    private int $count_column_name;

    private array $data = [];

    function __construct(
        string $count_column_name,
        int $count_idx = 5,
        string $name_column_name = "userfullname",
        int $name_idx = 0,
        string $email_column_name = "useremail",
        int $email_idx = 1,
        string $category_column_name = "categoryname",
        int $category_idx = 2,
        string $course_name_column_name = "coursefullname",
        int $course_name_idx = 3,
        string $course_id_column_name = "courseidnumber",
        int $course_id_idx = 4
    )
    {
        $this->name_idx = $name_idx;
        $this->email_idx = $email_idx;
        $this->category_idx = $category_idx;
        $this->course_name_idx = $course_name_idx;
        $this->course_id_idx = $course_id_idx;
        $this->count_idx = $count_idx;

        $this->name_column_name = $name_column_name;
        $this->email_column_name = $email_column_name;
        $this->category_column_name = $category_column_name;
        $this->course_name_column_name = $course_name_column_name;
        $this->course_id_column_name = $course_id_column_name;
        $this->count_column_name = $count_column_name;
    }

    function parse_next(array $line_data)
    {
        $course_id = $line_data[$this->course_id_column_name];

        $data[$course_id] = new UserRoleCourse(
            $line_data[$this->course_name_column_name],
            $line_data[$this->category_column_name],
        );

        $name = $line_data[$this->name_column_name];
        $email = $line_data[$this->email_column_name];
        $count = $line_data[$this->count_column_name];
        $lecturer_idx = $data[$course_id]->get_lecturer_idx($name, $email);

        // If no lecturer match
        if ($lecturer_idx === null) {
            $data[$course_id]->add_lecturer($name, $email);
        } else {
            // New count = current data count + old count
            $new_count = $count + $data[$course_id]->lecturers[$lecturer_idx]->count;
            $data[$course_id]->lecturers[$lecturer_idx] = new UserRoleCourseLecturer($name, $email, $new_count);
        }
    }

    function get_result(): array
    {
        return $this->data;
    }
}
