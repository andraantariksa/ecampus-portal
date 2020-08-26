<?php
namespace App\Controllers;


class UploadReport extends CustomBaseController
{

    public function index()
    {
        if ($this->authentication->isAuthenticated())
        {
            return $this->view('upload-report');
        }
        
        return redirect('/');
    }

}