<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'vendor/autoload.php';
class Tetapan extends CI_Controller {
  function __construct()
	{parent::__construct();
		if(empty($this->session->userdata('username'))){
			redirect(base_url('auth'));
		}
	}
    public function index() {
        $this->load->view('components/header');
        $this->load->view('tetapan/index');
        $this->load->view('components/footer');
    }
    public function profile() {
        $username = $this->session->userdata('username');
      $data['user']=  $this->db->query("SELECT * FROM users inner join staf ON users.NoPekerja = staf.NoPekerja WHERE username like '$username'")->row_array();
        $this->load->view('components/header');
        $this->load->view('tetapan/profile',$data);
        $this->load->view('components/footer');
    }
 
    public function suratperlantikan() {
      $this->form_validation->set_rules('signdetails', 'signdetails', 'required|trim');
      if($this->form_validation->run()==false){
      $data['row']= $this->db->query("SELECT * FROM tetapan ")->row_array();
      $this->load->view('components/header');
      $this->load->view('tetapan/configsurat',$data);
      $this->load->view('components/footer');
      }else{
        if($this->input->post('logo')){
          $file_name = time() . '.' . $file_extension;
          $config['upload_path']          = './assets/img';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $config['file_name'] = $file_name;
                $this->load->library('upload', $config);
                if (  $this->upload->do_upload('file')){
                  $this->db->set('logoheader',$file_name);
                }
        }
        if($this->input->post('sign')){
          $file_name = time() . '.' . $file_extension;
          $config['upload_path']          = './assets/img';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $config['file_name'] = $file_name;
                $this->load->library('upload', $config);
                if (  $this->upload->do_upload('sign')){
                  $this->db->set('sign',$file_name);
                }
        }
        $data = array(
          'tugas'=>$this->input->post('tugas'),
          'tugas2'=>$this->input->post('tugas2'),
          'signdetails'=>$this->input->post('signdetails')
        );
        $this->db->set($data);
        $this->db->where('id', 1);
        $this->db->update('tetapan');
        redirect('tetapan');
      }
    }
    public function mail() {
     $data['row']= $this->db->query("SELECT * FROM tetapan ")->row_array();
      $this->load->view('components/header');
      $this->load->view('tetapan/mail',$data);
      $this->load->view('components/footer');
    }
    public function kemaskiniemail(){
      $this->form_validation->set_rules('email', 'email', 'required|trim');
        if($this->form_validation->run()==false){
      $data['row']= $this->db->query("SELECT * FROM tetapan ")->row_array();
      $this->load->view('components/header');
      $this->load->view('tetapan/editmail',$data);
      $this->load->view('components/footer');
        }else{
          $data = array(
            'email' =>$this->input->post('email'),
            'clientid'=>$this->input->post('clientid'),
            'clientsecret'=>$this->input->post('clientsecret'),
            'refreshtoken'=>$this->input->post('refreshtoken'),
          );
          $this->db->set($data);
          $this->db->where('id', 1);
          $this->db->update('tetapan');
          redirect('tetapan/mail'); 
        }
    }
    public function getrefreshToken(){
      echo "Please run manual and getrefresttoken.php";
    }
    public function accesscontrol(){
      $this->load->view('components/header');
      $this->load->view('tetapan/accesscontrol');
      $this->load->view('components/footer');
    }
}