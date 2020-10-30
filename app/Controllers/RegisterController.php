<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Validation\Validation;
use Config\Services;

class RegisterController extends CustomBaseController
{
    protected $loginValidationParams = [
        'email' => ['label' => 'E-mail', 'rules' => 'required|valid_email'],
        'username' => ['label' => 'Username', 'rules' => 'required'],
        'password' => ['label' => 'Password', 'rules' => 'required|min_length[8]']
    ];

    protected Validation $validation;

    protected UserModel $user_model;

    public function __construct()
    {
        $this->validation = Services::validation();
        $this->user_model = new UserModel();
    }

    public function index()
    {
        if ($this->authentication->isAuthenticated()) {
            return redirect('/');
        }

        return $this->view('register');
    }

    public function process()
    {
        if ($this->authentication->isAuthenticated()) {
            return redirect('/');
        }

        $data['email'] = $this->request->getPost('email');
        $data['username'] = $this->request->getPost('username');
        $data['password'] = $this->request->getPost('password');
        $data['password-confirmation'] = $this->request->getPost('password-confirmation');

        if ($data['password'] !== $data['password-confirmation']) {
            return $this->view('register', [
                'errorField' => [
                    'password-confirmation' => 'Password confirmation does not match'
                ]
            ]);
        }

        $this->validation->setRules($this->loginValidationParams);
        if ($this->validation->run($data)) {
            $is_email_exits = $this->user_model->isEmailExists($data['email']);
            $is_username_exists = $this->user_model->isUsernameExists($data['username']);
            if ($is_username_exists) {
                return $this->view('register', [
                    'errorMsg' => 'Username exists'
                ]);
            } else {
                $result_query = $this->user_model->createNewUser($data['username'], $data['email'], $data['password']);
                return $this->view('register-success', [
                    'resultQuery' => $result_query
                ]);
            }
        } else {
            return $this->view('register', [
                'errorField' => $this->validation->getErrors()
            ]);
        }
    }
}

