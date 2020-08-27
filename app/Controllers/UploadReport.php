<?php
namespace App\Controllers;


use App\Helpers\MapUserRoleCourse;
use App\Helpers\UserRoleCourseReaderCSV;

class UploadReport extends CustomBaseController
{
    public function index()
    {
        if ($this->authentication->isAuthenticated()) {
            return $this->view('upload-report');
        }

        return redirect('/');
    }

    public function upload()
    {
        $report_file = $_FILES['report']['tmp_name']; // $this->request->getFile("report");
        if (!$report_file) {
            return $this->response
                ->setStatusCode(400)
                ->setBody($this->view('upload-report'));
        }

        $user_role_course_reader = new UserRoleCourseReaderCSV($report_file);
        $user_role_course_mapper = new MapUserRoleCourse();

        // Skip header
        $user_role_course_reader->next();

        while (true) {
            $line = $user_role_course_reader->next();
            if (!$line) {
                break;
            }
            $user_role_course_mapper->parseNext($line);
        }

        return $this->view('lecturer-report', [
            "overview_data" => $user_role_course_mapper->getListData(),
        ]);
    }

}