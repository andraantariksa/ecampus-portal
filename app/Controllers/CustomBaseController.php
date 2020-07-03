<?php
namespace App\Controllers;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 *
 * @package CodeIgniter
 */

use App\Controllers\Authentication\ImplAuthenticationSession;
use CodeIgniter\Controller;

class CustomBaseController extends Controller
{

	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = [];

	protected ImplAuthenticationSession $authentication;

	/**
	 * Constructor.
	 */
    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.:
		// $this->session = \Config\Services::session();

        $this->authentication = ImplAuthenticationSession::getInstance();
	}

	protected function injectRender(array $data) : array
    {
        // Injecting render data to the view renderer
        $data['authentication'] = $this->authentication;
        return $data;
    }

    protected function errorNotFound() : string
    {

        $this->response->setStatusCode(404);
        return $this->view('errors/html/error_404');
    }

	protected function view(string $name, array $data = [], array $options = []) : string
    {
        return view($name, $this->injectRender($data), $options);
    }

}
