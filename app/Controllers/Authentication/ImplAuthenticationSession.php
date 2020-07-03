<?php
namespace App\Controllers\Authentication;

class ImplAuthenticationSession implements IAuthentication
{
    protected static ?ImplAuthenticationSession $instance = null;

    protected \CodeIgniter\Session\Session $session;

    public function __construct()
    {
        $this->session = \Config\Services::session();
    }

    public static function getInstance() : self
    {
        if (!self::$instance)
        {
            self::$instance = new ImplAuthenticationSession();
        }

        return self::$instance;
    }

    public function authenticate(array $credential) : void
    {
        $this->session->set([
            'user_id' => $credential['id'],
        ]);
    }

    public function isAuthenticated(): bool
    {
        return $this->session->has('user_id');
    }
}