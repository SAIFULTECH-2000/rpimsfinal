<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;
//Alias the League Google OAuth2 provider class
use League\OAuth2\Client\Provider\Google;

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');
require 'vendor/autoload.php';
class Pengesahan extends CI_Controller {
    function __construct()
	{parent::__construct();
		if(empty($this->session->userdata('username'))){
			redirect(base_url('auth'));
		}
	}
    public function index(){
        $this->load->view('components/header');
        $this->load->view('pengesahan/index');
        $this->load->view('components/footer');
    }
}