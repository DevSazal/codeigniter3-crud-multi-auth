<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	/**
	 * User Controller
	 * user modules
	 */
	public function __construct() {
    // load database in autoload libraries
    parent::__construct();
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
    $this->load->model('UserModel');
		// $this->load->library('session');

  }
	public function index()
	{
    $array['msg'] = 'Hi Sazal(USER) from CodeIgniter 3';

		$this->load->view('layouts/header');
		$this->load->view('login', $array);
		$this->load->view('layouts/footer');
	}
	public function login()
	{
		$request = (object) $this->input->post();
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		if ($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('error', 'Please! Enter valid information');
				return redirect(base_url('/login'));
    }else{
				// print_r($this->input->post());
				// echo $request->email;
				// echo $request->password;
				$user = $this->db->where('email',$request->email)
                        		->get('users')
                        		->first_row();
												//print_r($user);
				if ($user) {
					if ($this->UserModel->encrypt_verify($request->password, $user->password)) {
            	//
              $userdata = array(
                    'id' => $user->id,
                    'name' => ucfirst($user->name),
                    'email' => $user->email,
                    'role' => $user->role,
                    'role_type' => $user->role_type,
                    'profile_photo_path' => $user->profile_photo_path,
                    'created_at' => $user->created_at
              );


              $this->session->set_userdata('auth', (array) $user);

							// echo $this->session->auth['name'];
							// print_r($this->session->auth);

              //     $data['status'] = TRUE;
              //     echo json_encode($data);

							$this->session->set_flashdata('msg', 'login done!');
							return redirect(base_url('/'));
            }else {
							$this->session->set_flashdata('error', 'Oppes! You have entered invalid credentials');
							return redirect(base_url('/login'));
            }
				}else {
					$this->session->set_flashdata('error', 'Oppes! You have entered invalid credentials');
					return redirect(base_url('/login'));
				}
  	}
	}

	public function registerPage()
	{
		$this->load->view('layouts/header');
		$this->load->view('register');
		$this->load->view('layouts/footer');
	}

	public function register()
	{
		$request = (object) $this->input->post();
		// print_r($_POST);
		// echo $request->email;
		// echo "<pre>";
		// print_r($request);
		// echo "</pre>";
		$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]',
																array(
																	'required' => 'n-required',
																	'min_length' => 'n-min_length'
																)
															);
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]',
																array(
																	'required' => 'e-required',
																	'valid_email' => 'e-valid_email',
																	'is_unique' => 'e-is_unique'
																)
															);
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]',
																array(
																	'trim' => 'p-trim',
																	'required' => 'p-required',
																	'min_length' => 'p-min_length'
																)
															);
		$this->form_validation->set_rules('cpassword', 'Confirm password', 'matches[password]',
																array(
																	'matches' => 'cp-matches'
																)
															);

		if ($this->form_validation->run() == FALSE){
				$this->session->set_flashdata('errors', $this->form_validation->error_array());
				return redirect(base_url('/register'));
				// echo form_error('name');
				// echo form_error('email');
				// echo form_error('password');
				// echo validation_errors();

    }else{
				// print_r($this->input->post());
				// echo $request->email;
				// echo $request->password;
				$this->UserModel->insert($request, 0, 'user'); // send $request as object
				$this->session->set_flashdata('msg', 'You have been successfully registered as '+$request->email);
				return redirect(base_url('/login'));
  	}
	}

	public function logout()
	{
    unset($_SESSION['auth']);
		$this->session->set_flashdata('msg', 'logged out');
		// $this->session->unset_userdata('userdata');
		return redirect(base_url('/login'));
	}

}
