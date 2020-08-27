<?php

namespace App\Helpers;


class MapUserRoleCourse
{
    private int $name_column_idx;
    private int $email_column_idx;
    private int $category_column_idx;
    private int $course_name_column_idx;
    private int $course_id_column_idx;
    private int $participation_count_column_idx;
    private int $teaching_count_column_idx;

    private string $name_column_name;
    private string $email_column_name;
    private string $category_column_name;
    private string $course_name_column_name;
    private string $course_id_column_name;
    private string $participation_count_column_name;
    private string $teaching_count_column_name;

    private array $list_data = [];
    private array $overview_data = [];

    // TODO
    // No idea the use of the string
    function __construct(
        string $name_column_name = "userfullname",
        int $name_column_idx = 0,
        string $email_column_name = "useremail",
        int $email_column_idx = 1,
        string $category_column_name = "categoryname",
        int $category_column_idx = 2,
        string $course_name_column_name = "coursefullname",
        int $course_name_column_idx = 3,
        string $course_id_column_name = "courseidnumber",
        int $course_id_column_idx = 4,
        string $participation_count_column_name = "participationcount",
        int $participation_count_column_idx = 5,
        string $teaching_count_column_name = "teachingcount",
        int $teaching_count_column_idx = 6
    )
    {
        $this->name_column_idx = $name_column_idx;
        $this->email_column_idx = $email_column_idx;
        $this->category_column_idx = $category_column_idx;
        $this->course_name_column_idx = $course_name_column_idx;
        $this->course_id_column_idx = $course_id_column_idx;
        $this->participation_count_column_idx = $participation_count_column_idx;
        $this->teaching_count_column_idx = $teaching_count_column_idx;

        $this->name_column_name = $name_column_name;
        $this->email_column_name = $email_column_name;
        $this->category_column_name = $category_column_name;
        $this->course_name_column_name = $course_name_column_name;
        $this->course_id_column_name = $course_id_column_name;
        $this->participation_count_column_name = $participation_count_column_name;
        $this->teaching_count_column_name = $teaching_count_column_name;
    }

    function parseNext(array $line_data)
    {
        $this->parseListData($line_data);
        $this->parseOverviewData($line_data);
    }

    function parseListData(array &$line_data)
    {
        array_push($this->list_data, [
            "name" => $line_data[$this->name_column_idx],
            "email" => $line_data[$this->email_column_idx],
            "course_name" => $line_data[$this->course_name_column_idx],
            "course_id" => $line_data[$this->course_id_column_idx],
            "category" => $line_data[$this->category_column_idx],
            "participation_count" => $line_data[$this->participation_count_column_idx],
            "teaching_count" => $line_data[$this->teaching_count_column_idx],
            "is_qualified_activity" => MapUserRoleCourse::isQualifiedActivity(
                    $line_data[$this->teaching_count_column_idx],
                    $line_data[$this->participation_count_column_idx]
            ),
        ]);
    }

    function parseOverviewData(array &$line_data)
    {
        $course_id = $line_data[$this->course_id_column_idx];

        $overview_data[$course_id] = new UserRoleCourse(
            $line_data[$this->course_name_column_idx],
            $line_data[$this->category_column_idx],
        );

        $name = $line_data[$this->name_column_idx];
        $email = $line_data[$this->email_column_idx];
        $participation_count = $line_data[$this->participation_count_column_idx];
        $lecturer_idx = $overview_data[$course_id]->get_lecturer_idx($name, $email);

        // If no lecturer match
        if ($lecturer_idx === null) {
            $overview_data[$course_id]->add_lecturer($name, $email);
        } else {
            // TODO
            // Only participation count
            // New count = current data count + old count
            $new_count = $participation_count + $overview_data[$course_id]->lecturers[$lecturer_idx]->count;
            $overview_data[$course_id]->lecturers[$lecturer_idx] = new UserRoleCourseLecturer($name, $email, $new_count);
        }
    }

    function getOverviewData(): array
    {
        return $this->overview_data;
    }

    function getListData(): array
    {
        return $this->list_data;
    }

    // 6. total kehadiran (if teaching >1 and participating >1, kehadiran = 1, else 0
    static function isQualifiedActivity(int $teaching_count, int $participation_count): int
    {
        return $teaching_count > 1 && $participation_count > 1;
    }
}
