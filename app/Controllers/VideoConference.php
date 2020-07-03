<?php
namespace App\Controllers;


class VideoConference extends CustomBaseController
{

    public function index()
    {
        return $this->view('video-conference');
    }

}