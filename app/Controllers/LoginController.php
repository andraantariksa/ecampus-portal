<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Validation\Validation;
use Config\Services;

class LoginController extends CustomBaseController
{
    protected $loginValidationParams = [
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

        $auth_error = $this->session->getFlashdata('auth-error');
        if (isset($auth_error)) {
            $data['errorMsg'] = isset($auth_error['message']) ? $auth_error['message'] : 'Please login to continue';
            $data['redir_to'] = $auth_error['redir_to'];
        }


        return $this->view('login', $data);
    }

    public function process()
    {
        if ($this->authentication->isAuthenticated())
        {
            return redirect('/');
        }

        $data['username'] = $this->request->getPost('username');
        $data['password'] = $this->request->getPost('password');

        $this->validation->setRules($this->loginValidationParams);
        if ($this->validation->run($data)) {
            $user = $this->user_model->getUserWithUsernameAndPassword($data['username'], $data['password']);
            if ($user) {
                $this->authentication->authenticate([
                    'id' => $user->id
                ]);

                // TODO
                // redirect to base url
                return redirect('/');
            } else {
                return $this->view('login', [
                    'errorMsg' => 'Invalid login, please try again'
                ]);
            }
        } else {
            return $this->view('login', [
                'errorField' => $this->validation->getErrors()
            ]);
        }
    }
}

