<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('LOGGED')) {
			redirect('home', 'refresh');
		}
	}

	public function index()
	{
		$this->load->view('login');
	}
}

/* End of file Login.php */
