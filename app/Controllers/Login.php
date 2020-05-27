<?php namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Login extends Controller
{
    protected $loginValidationParams = [
        'username' => ['label' => 'Username', 'rules' => 'required'],
        'password' => ['label' => 'Password', 'rules' => 'required|min_length[8]']
    ];

    protected $validation;
    protected $session;

    function __construct(RequestInterface $request, ResponseInterface $response)
    {
        $this->validation = \Config\Services::validation();
        $this->session = \Config\Services::session();
    }

	public function index()
	{
        // TODO
        // Change the view
		return view('home');
    }
    
    public function process()
    {
        $data['username'] = $this->request->getPost('username');
        $data['password'] = $this->request->getPost('password');

        $this->validation->setRules($this->loginValidationParams);
        if ($this->validation->run($data))
        {
            // TODO
            // Validate user exists and match the credential
            if (true)
            {
                $this->session->set([
                    'username' => 'blah',
                ]);
                
                return redirect($this->baseUrl);
            }
            else
            {
                // TODO
                return view('home');
            }
        }
        else
        {
            // TODO
            // Change the view
            // with validation error
            return view('home');
        }
    }
}

