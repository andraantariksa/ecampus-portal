<?php
namespace App\Controllers;


class VideoConferenceController extends CustomBaseController
{
    public function index()
    {
        if (!$this->authentication->isAuthenticated()) {
            // TODO
            // Put into authentication
            $this->session->setFlashdata('auth-error', [
                'redir_to' => uri_string()
            ]);
            return redirect('login');
        }

        return $this->view('video-conference');
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