<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
	{parent::__construct();
		if(empty($this->session->userdata('username'))){
			redirect(base_url('auth'));
		}
	}
    public function index()
    {
        $role = $this->session->userdata('role_id');
        $data['role'] = $role;
        $data['result'] = $this->db->query("SELECT * FROM `accesscontrol` INNER JOIN menu on accesscontrol.menu_id =menu.id WHERE role_id =$role and accesscontrol.isactive=1")->result_array();
        $this->load->view('components/header');
        $this->load->view('dashboard/home', $data);
        $this->load->view('components/footer');
    }
}