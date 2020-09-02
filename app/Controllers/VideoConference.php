<?php
namespace App\Controllers;


class VideoConference extends CustomBaseController
{

    public function index()
    {
    	if ($this->authentication->isAuthenticated())
        {
            return $this->view('video-conference', ['log' => True]);
        }
        return $this->view('video-conference', ['log' => False]);
    }

    public function request()
    {
    	$data['date'] = $this->request->getPost('date');
        $data['starthour'] = $this->request->getPost('starthour');
        $data['duration'] = $this->request->getPost('duration');

        echo "Video conference requested on: " . $data['date'] . " at " . $data['starthour'] . " hours for " . $data['duration'] . " minutes.";
        echo '<br><a href="/video-conference">back</a>';
    }

}