<?php
defined('BASEPATH') or exit('No direct script access allowed');
require_once 'vendor/google-login/vendor/autoload.php';
class Auth extends CI_Controller
{
	public function index()
	{
		if (!empty($this->session->userdata('username'))) {
			$role = $this->session->userdata('role_id');

			if ($role == 3) {
				redirect('user');
			}
			redirect('dashboard');
		}
		$this->form_validation->set_rules('username', 'username', 'required|trim');
		$this->form_validation->set_rules('password', 'password', 'required|trim');
		if ($this->form_validation->run() == false) {

			// init configuration
			$clientID = '929083255985-e98qov8jla0e1bapa4o337cni877mgpo.apps.googleusercontent.com';
			$clientSecret = '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';

			$redirectUri = base_url();
			//$redirectUri = 'http://localhost/system/auth';

			// create Client Request to access Google API
			$client = new Google_Client();
			$client->setClientId($clientID);
			$client->setClientSecret($clientSecret);
			$client->setRedirectUri($redirectUri);
			$client->addScope("email");
			$client->addScope("profile");
			// authenticate code from Google OAuth Flow
			if (isset($_GET['code'])) {
				$token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
				$client->setAccessToken($token['access_token']);
				// get profile info
				$google_oauth = new Google_Service_Oauth2($client);
				$google_account_info = $google_oauth->userinfo->get();
				$email =  $google_account_info->email;
				// getting profile information
				$google_oauth = new Google_Service_Oauth2($client);
				$google_account_info = $google_oauth->userinfo->get();
				if (!empty($email)) {
					//login berjaya
					$this->_google($email);
				}
			}
			$data['gmail'] =  "<a href='" . $client->createAuthUrl() . "' style='color:red' >Login with Google</a><br>";
			//$this->_check();
			$this->load->view('auth/login', $data);
		} else {
			$this->_login();
		}
	}
	private function _check()
	{
		$this->db->trans_start();
		$this->db->query("UPDATE perlantikan set status='inactive' where TarikhTamat<=CAST(CURRENT_TIMESTAMP AS DATE)");
		$this->db->query("INSERT INTO perlantikantamat SELECT * FROM perlantikan WHERE status='inactive'");
		$this->db->query("DELETE FROM perlantikan WHERE status='inactive'");
		$this->db->query("UPDATE STAF set status='tidak active' where TarikhPencen=CAST(CURRENT_TIMESTAMP AS DATE)");
		$this->db->query("
        INSERT INTO  notifikasi (NoPekerja, NamaStaf, KodKursus, TarikhMula, TarikhTamat, SuratPerlantikan)
                                       SELECT perlantikan.NoPekerja, staf.NamaStaf, perlantikan.KodKursus, perlantikan.TarikhMula, perlantikan.TarikhTamat,perlantikan.SuratPerlantikan FROM perlantikan
                                       INNER JOIN staf ON perlantikan.NoPekerja=staf.NoPekerja 
                                       WHERE CURRENT_DATE >= (CAST(TarikhTamat AS DATE) + INTERVAL -1 MONTH)
                                       AND  NOT EXISTS (SELECT * 
                                                        FROM notifikasi
                                                        WHERE notifikasi.NoPekerja = perlantikan.NoPekerja
                                                        AND notifikasi.KodKursus = perlantikan.KodKursus
                                                        AND notifikasi.TarikhMula =perlantikan.TarikhMula)
        ");
		$this->db->trans_complete();
	}
	private function _google($email)
	{
		$user = $this->db->get_where('users', ['email' => $email])->row_array();
		if ($user) {
			$data = [
				'username' => $user['username'],
				'role_id' => $user['role_id'],
			];
			$this->session->set_userdata($data);
			if ($user['role_id'] == 3) {
				redirect('user');
			}
			redirect('dashboard');
		} else {
			redirect('auth/fail');
		}
	}
	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$user = $this->db->get_where('users', ['username' => $username])->row_array();
		if ($user['pwd'] == $password) {
			$data = [
				'username' => $username,
				'NoPekerja' => $user['NoPekerja'],
				'role_id' => $user['role_id'],
			];
			$this->session->set_userdata($data);
			if ($user['role_id'] == 3) {
				redirect('user');
			}
			redirect('dashboard');
		} else {
			redirect('auth/fail');
		}
	}

	public function fail()
	{

		$this->load->view('auth/failed');
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth');
	}
	public function _login2($username, $password)
	{
		$user = $this->db->get_where('users', ['username' => $username])->row_array();
		if ($user['pwd'] == $password) {
			$data = [
				'username' => $username,
				'NoPekerja' => $user['NoPekerja'],
				'role_id' => $user['role_id'],
			];

			$this->session->set_userdata($data);
			if ($user['role_id'] == 4) {
				redirect('user');
			}
			redirect('dashboard');
		} else {
			redirect('auth/fail');
		}
	}
	public function bypass()
	{
		$username =  $this->uri->segment(3);
		$password = $this->uri->segment(4);
		$this->_login2($username, $password);
	}
}