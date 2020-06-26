<?php namespace App\Controllers;

use App\Models\ImplAuthenticationSession;
use App\Models\UserModel;
use CodeIgniter\Controller;

class LoginController extends Controller
{
    protected $loginValidationParams = [
        'username' => ['label' => 'Username', 'rules' => 'required'],
        'password' => ['label' => 'Password', 'rules' => 'required|min_length[8]']
    ];

    protected \CodeIgniter\Validation\Validation $validation;
    protected ImplAuthenticationSession $authentication;

    protected $userModels;

    public function __construct()
    {
        $this->validation = \Config\Services::validation();
        $this->authentication = ImplAuthenticationSession::getInstance();
        $this->userModels = new UserModel();
    }

    public function index()
    {
        if ($this->authentication->isAuthenticated())
        {
            return redirect('/');
        }

        return view('login');
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
            $user = $this->userModels->getUserWithUsernameAndPassword($data['username'], $data['password']);
            if ($user) {
                $this->authentication->authenticate([
                    'id' => $user->id
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

