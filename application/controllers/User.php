<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * User Controller
	 * user modules
	 */

	public function index()
	{
        $array['msg'] = 'Hi Sazal(USER) from CodeIgniter 3';
		
		$this->load->view('layouts/header');
		$this->load->view('index', $array);
		$this->load->view('layouts/footer');
	}
	public function testu()
	{
        $array['msg'] = 'Hi Sazal(USER-T) from CodeIgniter 3';
		
		$this->load->view('layouts/header');
		$this->load->view('index', $array);
		$this->load->view('layouts/footer');
	}
}
