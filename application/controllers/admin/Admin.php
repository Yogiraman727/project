<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model("login_model");
	}


	public function index()
	{
		$this->load->view('admin/login');
	}
	public function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$this->form_validation->set_rules('email','Email', 'required');
		$this->form_validation->set_rules('password','password','required');
		if($this->form_validation->run() == FALSE)
		{
			$this->session->set_flashdata('message','Email.and.Password.is.required.field');
			redirect('admin/admin/index');
		}else
		{
			$data = array(
				'username'=> $this->input->post('email'),
				'password'=> md5($this->input->post('password')),
			);
			$result = $this->login_model->login($data);
			if($result == TRUE){
				$session_data = array(
					'usernmae' => $data['username'],
					'email' => $data['username'] 
				);
				$this->session->set_userdata('logged_in',$session_data);
				redirect('admin/dashboard');
			}else{
				$this->session->set_flashdata('message',"sorry username and password are incorrect");
				redirect('admin/login');
			}
		}
	}
}
