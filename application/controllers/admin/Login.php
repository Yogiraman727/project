<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	
	public function index()
	{
		$this->load->view('admin/login');
	}
	public function check()
	{
		print_r($_POST);
	}
}
