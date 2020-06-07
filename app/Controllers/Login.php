<?php namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Login extends Controller
{
    protected $loginValidationParams = [
        'username' => ['label' => 'Username', 'rules' => 'required'],
        'password' => ['label' => 'Password', 'rules' => 'required|min_length[8]']
    ];

    protected $validation;
    protected $session;

    protected $userModels;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
        $this->userModels = new UserModel();
    }

    public function index()
    {
        return view('login');
    }

    public function process()
    {
        $data['username'] = $this->request->getPost('username');
        $data['password'] = $this->request->getPost('password');

        $this->validation->setRules($this->loginValidationParams);
        if ($this->validation->run($data)) {
            if ($this->userModels->getUserWithUsernameAndPassword($data['username'], $data['password'])) {
                $this->session->set([
                    'username' => 'blah',
                ]);

                // TODO
                // redirect to base url
                return redirect('/');
            } else {
                return view('login', [
                    'errorMsg' => 'Invalid login, please try again'
                ]);
            }
        } else {
            return view('login', [
                'errorField' => $this->validation->getErrors()
            ]);
        }
    }
}

