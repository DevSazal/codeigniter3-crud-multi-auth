<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ci_Default extends CI_Controller {

	/**
	 * Default Controller
	 * inital pages
	 * Only for authorize user by sign in
	 */

	public function __construct() {
     	// load database in autoload libraries
     	parent::__construct();
 			$this->load->helper(array('form'));
 			$this->load->library('form_validation');
     	// $this->load->model('UserModel');
 			// $this->load->library('session');
			if (!$this->session->auth) {
				return redirect(base_url('/login'));
			}

  }

	public function index()
	{
		// bebug session
		// if (!$this->session->auth) {
		// 	return redirect(base_url('/login'));
		// }

		// echo "<pre>";
		// print_r($this->session);
		// echo "</pre>";
		// echo "<pre>";
		// print_r($_SESSION);
		// echo "</pre>";
		// unset($_SESSION['auth']);
		// $this->session->unset_userdata('userdata','auth');
		$array['msg'] = 'Hi Sazal from CodeIgniter 3';

		$this->load->view('layouts/header');
		$this->load->view('index', $array);
		$this->load->view('layouts/footer');
	}

	public function test()
	{
        $array['msg'] = 'Hi Sazal from CodeIgniter 3';

		$this->load->view('layouts/header');
		$this->load->view('index', $array);
		$this->load->view('layouts/footer');
	}
}
