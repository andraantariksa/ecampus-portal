<?php
namespace App\Controllers;


class LecturerReport extends CustomBaseController
{

    public function index()
    {
        return $this->view('lecturer-report');
    }

}