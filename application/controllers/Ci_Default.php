<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ci_Default extends CI_Controller {

	/**
	 * Default Controller
	 * inital pages
	 */

	public function index()
	{
        $array['msg'] = 'Hi Sazal from CodeIgniter 3';
		$this->load->view('index', $array);
	}
}
