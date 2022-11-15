<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Manual extends CI_Controller {
function __construct()
	{parent::__construct();
		if(empty($this->session->userdata('username'))){
			redirect(base_url('auth'));
		}
	}
    public function index() {
        $this->load->view('components/header');
        $this->load->view('manual/manual');
        $this->load->view('components/footer');
    }

}