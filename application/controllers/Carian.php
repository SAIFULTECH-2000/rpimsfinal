<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;
//Alias the League Google OAuth2 provider class
use League\OAuth2\Client\Provider\Google;

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');
require 'vendor/autoload.php';
class Carian extends CI_Controller
{	
	function __construct()
	{
		parent::__construct();
		if(empty($this->session->userdata('username'))){
			redirect(base_url('auth'));
		}
	}
	public function index()
	{
		$this->load->view('components/header');
		$this->load->view('carian/pencarian');
		$this->load->view('components/footer');
	}
	public function jabatan()
	{
		$this->form_validation->set_rules('search', 'search', 'required|trim');
		if ($this->form_validation->run() == false) {
			$data['result'] = $this->db->query("SELECT * FROM jabatan where status='active' ORDER BY KodJab ASC")->result_array();
			$this->load->view('components/header');
			$this->load->view('carian/jabatan', $data);
			$this->load->view('components/footer');
		} else {
			$search = $this->input->post('search');
			$data['result'] = $this->db->query("SELECT * FROM jabatan where status='active'and (KodJab LIKE '$search' OR NamaJabBhg LIKE '$search')  ORDER BY KodJab ASC")->result_array();
			$data['search'] = $search;
			$this->load->view('components/header');
			$this->load->view('carian/jabatan', $data);
			$this->load->view('components/footer');
		}
	}
	public function kemaskini_jabatan()
	{
		$KodJab = $this->input->post('KodJab');
		if ($KodJab == null) {
			redirect('carian/jabatan');
		} else {
			$this->form_validation->set_rules('NamaJabBhg', 'NamaJabBhg', 'required|trim');
			if ($this->form_validation->run() == false) {
				$data['row'] = $this->db->query("Select * from jabatan where KodJab like '$KodJab'")->row_array();
				$this->load->view('components/header');
				$this->load->view('carian/edit/editjabatan', $data);
				$this->load->view('components/footer');
			} else {
				$data = array(
					'KodJab' => $this->input->post('KodJab'),
					'NamaJabBhg' => $this->input->post('NamaJabBhg'),

				);
				$this->db->set($data);
				$this->db->where('KodJab', $KodJab);
				$this->db->update('jabatan');
				redirect('carian/jabatan');
			}
		}
	}
	public function padam_jabatan()
	{
		$KodJab = $this->input->post('KodJab');
		if ($KodJab == null) {
			redirect('carian/jabatan');
		} else {
			$this->form_validation->set_rules('NamaJabBhg', 'NamaJabBhg', 'required|trim');
			if ($this->form_validation->run() == false) {
				$data['row'] = $this->db->query("Select * from jabatan where KodJab like '$KodJab'")->row_array();
				$this->load->view('components/header');
				$this->load->view('carian/padam/padamjabatan', $data);
				$this->load->view('components/footer');
			} else {
				$this->db->set('status', 'tidak active');
				$this->db->where('KodJab', $KodJab);
				$this->db->update('jabatan');
				redirect('carian/jabatan');
			}
		}
	}
	public function kursus()
	{
		$this->form_validation->set_rules('search', 'search', 'required|trim');
		if ($this->form_validation->run() == false) {
			$data['result'] = $this->db->query("SELECT * FROM kursus where status='active' ORDER BY KodKursus ASC")->result_array();
			$data['carian'] = "kursus";
			$this->load->view('components/header');
			$this->load->view('carian/kursus', $data);
			$this->load->view('components/footer');
		} else {
			$search = $this->input->post('search');
			$data['result'] = $this->db->query("SELECT * FROM kursus where status='active' ORDER BY KodKursus ASC")->result_array();
			$data['search'] = $search;
			$carian = $this->input->post('carian');
			if ($carian == "kursus")
				$query = $this->db->query("SELECT * FROM kursus where status='active' and (KodKursus like '$search' or NamaKursus like '$search') ORDER BY KodKursus ASC")->result_array();
			else
				$query = $this->db->query("SELECT * FROM kursus where status='active' and KodJab like '$search' ORDER BY KodKursus ASC")->result_array();

			$data['result'] = $query;
			$data['carian'] = $carian;
			$this->load->view('components/header');
			$this->load->view('carian/kursus', $data);
			$this->load->view('components/footer');
		}
	}
	public function kemaskini_kursus()
	{
		$KodKursus = $this->input->post('KodKursus');
		if ($KodKursus == null) {
			redirect('carian/kursus');
		} else {
			$data['row'] = $this->db->query("Select * from kursus where KodKursus = '$KodKursus'")->row_array();
			$this->form_validation->set_rules('NamaKursus', 'NamaKursus', 'required|trim');
			if ($this->form_validation->run() == false) {
				$this->load->view('components/header');
				$this->load->view('carian/edit/editkursus', $data);
				$this->load->view('components/footer');
			} else {
				$data = array(
					'KodJab' => $this->input->post('KodJab'),
					'KodKursus' => $this->input->post('KodKursus'),
					'NamaKursus' => $this->input->post('NamaKursus'),
					'type' => $this->input->post('type'),
				);
				$this->db->set($data);
				$this->db->where('KodKursus', $KodKursus);
				$this->db->update('kursus');
				redirect('carian/kursus');
			}
		}
	}
	public function padam_kursus()
	{
		$KodKursus = $this->input->post('KodKursus');
		if ($KodKursus == null) {
			redirect('carian/kursus');
		} else {
			$data['row'] = $this->db->query("Select * from kursus where KodKursus = '$KodKursus'")->row_array();
			$this->form_validation->set_rules('NamaKursus', 'NamaKursus', 'required|trim');
			if ($this->form_validation->run() == false) {
				$this->load->view('components/header');
				$this->load->view('carian/padam/padamkursus', $data);
				$this->load->view('components/footer');
			} else {
				$this->db->set('status', 'tidak active');
				$this->db->where('KodKursus', $KodKursus);
				$this->db->update('kursus');
				redirect('carian/kursus');
			}
		}
	}
	public function kampus()
	{
		$this->form_validation->set_rules('search', 'search', 'required|trim');
		if ($this->form_validation->run() == false) {
			$data['result'] = $this->db->query("SELECT * FROM kampus WHERE status='active'  ORDER BY KodKampus ASC")->result_array();
			$this->load->view('components/header');
			$this->load->view('carian/kampus', $data);
			$this->load->view('components/footer');
		} else {
			$search = $this->input->post('search');
			$data['result'] = $this->db->query("SELECT * FROM kampus WHERE status='active' and (KodKampus LIKE '$search' OR NamaKampus LIKE '$search')  ORDER BY KodKampus ASC")->result_array();
			$data['search'] = $search;
			$this->load->view('components/header');
			$this->load->view('carian/kampus', $data);
			$this->load->view('components/footer');
		}
	}
	public function kemaskini_kampus()
	{
		$KodKampus = $this->input->post('KodKampus');
		if ($KodKampus === null) {
			redirect('carian/kampus');
		} else {
			$data['row'] = $this->db->query("SELECT * FROM kampus where KodKampus like '$KodKampus'")->row_array();
			$this->form_validation->set_rules('NamaKampus', 'NamaKampus', 'required|trim');
			if ($this->form_validation->run() == false) {
				$this->load->view('components/header');
				$this->load->view('carian/edit/editkampus', $data);
				$this->load->view('components/footer');
			} else {
				$data = array(
					'KodKampus' => $this->input->post('KodKampus'),
					'NamaKampus' => $this->input->post('NamaKampus'),
				);
				$this->db->set($data);
				$this->db->where('KodKampus', $KodKampus);
				$this->db->update('kampus');
				redirect('carian/kampus');
			}
		}
	}
	public function padam_kampus()
	{
		$KodKampus = $this->input->post('KodKampus');
		if ($KodKampus === null) {
			redirect('carian/kampus');
		} else {
			$this->form_validation->set_rules('NamaKampus', 'NamaKampus', 'required|trim');
			$data['row'] = $this->db->query("SELECT * FROM kampus where KodKampus like '$KodKampus'")->row_array();
			if ($this->form_validation->run() == false) {
				$this->load->view('components/header');
				$this->load->view('carian/padam/padamkampus', $data);
				$this->load->view('components/footer');
			} else {
				$this->db->set('status', 'tidak active');
				$this->db->where('KodKampus', $KodKampus);
				$this->db->update('kampus');
				redirect('carian/kampus');
			}
		}
	}

	public function perlantikan()
	{
		$this->form_validation->set_rules('search', 'search', 'required|trim');
		if ($this->form_validation->run() == false) {
			$data['result'] = $this->db->query("SELECT perlantikan.print, perlantikan.disahkan, perlantikan.id,perlantikan.NoPekerja, perlantikan.KodKursus, kursus.NamaKursus, 
                                staf.NamaStaf, perlantikan.TarikhMula, perlantikan.TarikhTamat, perlantikan.SuratPerlantikan
								FROM perlantikan 
									INNER JOIN kursus ON perlantikan.KodKursus=kursus.KodKursus 
									INNER JOIN staf ON perlantikan.NoPekerja=staf.NoPekerja
                                WHERE perlantikan.status='active'
                                ORDER BY KodKursus ASC")->result_array();
			$this->load->view('components/header');
			$this->load->view('carian/perlantikan', $data);
			$this->load->view('components/footer');
		} else {
			$search = $this->input->post('search');
			$data['result'] = $this->db->query("SELECT perlantikan.id,perlantikan.NoPekerja, perlantikan.KodKursus, kursus.NamaKursus, 
                                staf.NamaStaf, perlantikan.TarikhMula, perlantikan.TarikhTamat, perlantikan.SuratPerlantikan
								FROM perlantikan 
									INNER JOIN kursus ON perlantikan.KodKursus=kursus.KodKursus 
									INNER JOIN staf ON perlantikan.NoPekerja=staf.NoPekerja
                                WHERE perlantikan.status='active'
                                and (NamaStaf LIKE '%$search%' or perlantikan.KodKursus LIKE '%$search%')and (NamaStaf LIKE '%$search%' or perlantikan.KodKursus LIKE '%$search%')
                                ORDER BY KodKursus ASC")->result_array();
			$data['search'] = $search;
			$this->load->view('components/header');
			$this->load->view('carian/perlantikan', $data);
			$this->load->view('components/footer');
		}
	}
	public function kemaskini_perlantikan()
	{
		$id = $this->input->post('id');
		if ($id == null) {
			redirect('carian/perlantikan');
		} else {

			$data['row'] = $this->db->query("SELECT * FROM perlantikan INNER JOIN kursus ON perlantikan.KodKursus=kursus.KodKursus 
            INNER JOIN staf ON  perlantikan.NoPekerja=staf.NoPekerja WHERE perlantikan.id='$id'")->row_array();
			$this->form_validation->set_rules('NamaStaf', 'NamaStaf', 'required|trim');
			if ($this->form_validation->run() == false) {
				$this->load->view('components/header');
				$this->load->view('carian/edit/editperlantikan', $data);
				$this->load->view('components/footer');
			} else {
				if ($this->input->post('disahkan') != null)
					$this->db->set('disahkan', $this->input->post('disahkan'));
				if ($this->input->post('tarikhsurat') != null)
					$this->db->set('tarikhsurat', $this->input->post('tarikhsurat'));
				$this->db->where('id', $id);
				$this->db->update('perlantikan');
				$this->session->set_flashdata('kemaskini', 'value');

				// if ($this->input->post('disahkan') != null) {
				//     if ($this->input->post('disahKan') == 'Sah') {
				//         //$users = $this->db->query("SELECT * FROM perlantikan INNER JOIN kursus ON perlantikan.KodKursus=kursus.KodKursus INNER JOIN staf ON  perlantikan.NoPekerja=staf.NoPekerja WHERE perlantikan.id='$id'")->row_array();

				//         $this->_sendmail();
				//     }
				// }
				$this->_sendmail();
				if ($this->input->post('tarikhsurat') != null)
					redirect('carian/perlantikan_yang_perlu_dicetak');
				if ($this->input->post('disahkan') != null)
					redirect('carian/perlantikan_yg_perlu_pengesahan');
			}
		}
	}
	private function _sendmail()
	{


		// Output the generated PDF to Browser
		//$name,$FACULTY,$gred,$namakursus,$Jabatan,$datestart
		//Create a new PHPMailer instance
		$mail = new PHPMailer();

		//Tell PHPMailer to use SMTP
		$mail->isSMTP();

		//Enable SMTP debugging
		//SMTP::DEBUG_OFF = off (for production use)
		//SMTP::DEBUG_CLIENT = client messages
		//SMTP::DEBUG_SERVER = client and server messages
		$mail->SMTPDebug = SMTP::DEBUG_SERVER;

		//Set the hostname of the mail server
		$mail->Host = 'smtp.gmail.com';

		//Set the SMTP port number:
		// - 465 for SMTP with implicit TLS, a.k.a. RFC8314 SMTPS or
		// - 587 for SMTP+STARTTLS
		$mail->Port = 465;

		//Set the encryption mechanism to use:
		// - SMTPS (implicit TLS on port 465) or
		// - STARTTLS (explicit TLS on port 587)
		$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;

		//Whether to use SMTP authentication
		$mail->SMTPAuth = true;

		//Set AuthType to use XOAUTH2
		$mail->AuthType = 'XOAUTH2';

		//Start Option 1: Use league/oauth2-client as OAuth2 token provider
		//Fill in authentication details here
		//Either the gmail account owner, or the user that gave consent
		$email = 'eresourseperson@tmsk.uitm.edu.my';
		$clientId = '929083255985-e98qov8jla0e1bapa4o337cni877mgpo.apps.googleusercontent.com';
		$clientSecret = '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';

		//Obtained by configuring and running get_oauth_token.php
		//after setting up an app in Google Developer Console.
		$refreshToken = '1//0gar196_ebnRRCgYIARAAGBASNwF-L9IrrTfT_enlOqyReCAluyy76A1gqOzfVr4pOK-iUbiv_Ewn9TnvZzsep0x_77zAOZHnAXU';

		//Create a new OAuth2 provider instance
		$provider = new Google(
			[
				'clientId' => $clientId,
				'clientSecret' => $clientSecret,
			]
		);

		//Pass the OAuth provider instance to PHPMailer
		$mail->setOAuth(
			new OAuth(
				[
					'provider' => $provider,
					'clientId' => $clientId,
					'clientSecret' => $clientSecret,
					'refreshToken' => $refreshToken,
					'userName' => $email,
				]
			)
		);

		//Set who the message is to be sent from
		//For gmail, this generally needs to be the same as the user you logged in as
		$mail->setFrom($email, 'RESOURCES PERSON MANAGEMENT SYSTEM');

		//Set who the message is to be sent to
		$mail->addAddress('saifultech.official@gmail.com', 'Saifultech');
		$mail->addAddress('marshima@tmsk.uitm.edu.my');
		$USERS = $this->db->query("select * from users where role_id='4'")->result_array();
		foreach ($USERS as $row) {
			//$mail->addAddress($row['email']);
		}

		//Set the subject line
		$mail->Subject = 'PERLANTIKAN RESOURCES PERSON';

		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		$mail->CharSet = PHPMailer::CHARSET_UTF8;
		// $mail->msgHTML(file_get_contents('contentsutf8.html'), __DIR__);

		//Replace the plain text body with one created manually
		$mail->AltBody = 'PERLANTIKAN RESOURCES PERSON';

		$mail->Body = "Dear Sir/ Madam<br><br>

The system administrator for RP system need checking status RP.<br>
Please login to the RP System to print<br>

LINK    : https://fskmtech.com/rpims<br>


Thank you";

		//send the message, check for errors
		if (!$mail->send()) {
			echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
			echo 'Message sent!';
		}
	}
	public function padam_perlantikan()
	{
		$id = $this->input->post('id');
		if ($id == null) {
			redirect('carian/perlantikan');
		} else {
			$data['row'] = $this->db->query("SELECT * FROM perlantikan INNER JOIN kursus ON perlantikan.KodKursus=kursus.KodKursus 
            INNER JOIN staf ON perlantikan.NoPekerja=staf.NoPekerja WHERE perlantikan.id='$id'")->row_array();
			$this->form_validation->set_rules('NamaStaf', 'NamaStaf', 'required|trim');
			if ($this->form_validation->run() == false) {
				$this->load->view('components/header');
				$this->load->view('carian/padam/padamperlantikan', $data);
				$this->load->view('components/footer');
			} else {
				$this->db->set('status', 'tidak active');
				$this->db->where('id', $id);
				$this->db->update('perlantikan');
				redirect('carian/perlantikan_yg_perlu_pengesahan');
			}
		}
	}
	public function cawangan()
	{
		$this->form_validation->set_rules('search', 'search', 'required|trim');
		if ($this->form_validation->run() == false) {
			$data['result'] = $this->db->query("SELECT cawangan.KodJab, jabatan.NamaJabBhg, kampus.NamaKampus 
        FROM cawangan 
            INNER JOIN jabatan ON cawangan.KodJab=jabatan.KodJab 
            INNER JOIN kampus ON cawangan.KodKampus=kampus.KodKampus 

        WHERE cawangan.status='active'
                            
								ORDER BY KodJab ASC")->result_array();
			$this->load->view('components/header');
			$this->load->view('carian/cawangan', $data);
			$this->load->view('components/footer');
		} else {
			$search = $this->input->post('search');
			$data['result'] = $this->db->query("SELECT cawangan.KodJab, jabatan.NamaJabBhg, kampus.NamaKampus 
								FROM cawangan 
									INNER JOIN jabatan ON cawangan.KodJab=jabatan.KodJab 
									INNER JOIN kampus ON cawangan.KodKampus=kampus.KodKampus 

								WHERE cawangan.status='active'
                                AND (cawangan.KodJab LIKE '%$search%' OR cawangan.KodKampus LIKE '$search' OR NamaKampus LIKE '$search' OR NamaJabBhg LIKE '$search')
								ORDER BY KodJab ASC")->result_array();
			$data['search'] = $search;
			$this->load->view('components/header');
			$this->load->view('carian/cawangan', $data);
			$this->load->view('components/footer');
		}
	}
	public function program()
	{

		$this->form_validation->set_rules('search', 'search', 'required|trim');
		if ($this->form_validation->run() == false) {
			$data['result'] = $this->db->query("SELECT * FROM program WHERE status='active' ORDER BY KodProgram ASC")->result_array();
			$this->load->view('components/header');
			$this->load->view('carian/program', $data);
			$this->load->view('components/footer');
		} else {
			$search = $this->input->post('search');
			$data['result'] = $this->db->query("SELECT * FROM program WHERE status='active'  AND (KodProgram LIKE '$search' OR NamaProgram LIKE '$search' OR KodJab LIKE '$search') ORDER BY KodProgram ASC")->result_array();
			$data['search'] = $search;
			$this->load->view('components/header');
			$this->load->view('carian/program', $data);
			$this->load->view('components/footer');
		}
	}
	public function kemaskini_program()
	{
		$KodProgram = $this->input->post('KodProgram');
		if ($KodProgram == null) {
			redirect('carian/program');
		} else {
			$data['row'] = $this->db->query("SELECT * FROM program where KodProgram like '$KodProgram'")->row_array();
			$this->form_validation->set_rules('NamaProgram', 'NamaProgram', 'required|trim');
			if ($this->form_validation->run() == false) {
				$this->load->view('components/header');
				$this->load->view('carian/edit/editprogram', $data);
				$this->load->view('components/footer');
			} else {
				$data = array(
					'KodProgram' => $this->input->post('KodProgram'),
					'NamaProgram' => $this->input->post('NamaProgram'),
					'KodJab' => $this->input->post('KodJab'),
				);
				$this->db->set($data);
				$this->db->where('KodProgram', $KodProgram);
				$this->db->update('program');
				redirect('carian/program');
			}
		}
	}
	public function padam_program()
	{
		$KodProgram = $this->input->post('KodProgram');
		if ($KodProgram == null) {
			redirect('carian/program');
		} else {
			$data['query2'] = $this->db->query("SELECT * FROM program where KodProgram like '$KodProgram'")->row_array();
			$this->form_validation->set_rules('NamaProgram', 'NamaProgram', 'required|trim');

			if ($this->form_validation->run() == false) {
				$this->load->view('components/header');
				$this->load->view('carian/padam/padamprogram', $data);
				$this->load->view('components/footer');
			} else {
				$this->db->set('status', 'tidak active');
				$this->db->where('KodProgram', $KodProgram);
				$this->db->update('program');
				redirect('carian/program');
			}
		}
	}

	public function pengajaran()
	{
		$this->form_validation->set_rules('search', 'search', 'required|trim');
		if ($this->form_validation->run() == false) {
			$data['result'] = $this->db->query("SELECT pengajaran.NoPekerja, pengajaran.KodKursus, kursus.NamaKursus, staf.NamaStaf, pengajaran.KodSem
								FROM pengajaran 
									INNER JOIN kursus ON pengajaran.KodKursus=kursus.KodKursus 
									INNER JOIN staf ON pengajaran.NoPekerja=staf.NoPekerja 

								WHERE pengajaran.status='active'
                                ORDER BY KodSem DESC, KodKursus ASC")->result_array();
			$this->load->view('components/header');
			$this->load->view('carian/penganjaran', $data);
			$this->load->view('components/footer');
		} else {
			$search = $this->input->post('search');
			$data['result'] = $this->db->query("SELECT pengajaran.NoPekerja, pengajaran.KodKursus, kursus.NamaKursus, staf.NamaStaf, pengajaran.KodSem
								FROM pengajaran 
									INNER JOIN kursus ON pengajaran.KodKursus=kursus.KodKursus 
									INNER JOIN staf ON pengajaran.NoPekerja=staf.NoPekerja 

								WHERE pengajaran.status='active'
                                and pengajaran.KodKursus = '$search'
                                ORDER BY KodSem DESC, KodKursus ASC")->result_array();
			$data['search'] = $search;
			$this->load->view('components/header');
			$this->load->view('carian/penganjaran', $data);
			$this->load->view('components/footer');
		}
	}
	public function staf()
	{
		$this->form_validation->set_rules('carian', 'carian', 'required|trim');
		$this->form_validation->set_rules('search', 'search', 'required|trim');

		if ($this->form_validation->run() == false) {
			$data['result'] = $this->db->query("SELECT * FROM staf inner join users on users.NoPekerja = staf.NoPekerja where staf.status like 'active' and users.role_id = '3' ORDER BY users.NoPekerja ASC")->result_array();
			$data['carian'] = 'AKTIF';
			$data['status'] = 'AKTIF';
			$this->load->view('components/header');
			$this->load->view('carian/staf', $data);
			$this->load->view('components/footer');
		} else {
			$search = $this->input->post('search');
			$status = $this->input->post('carian');
			$data['result'] = $this->db->query("SELECT * FROM staf where  (NoPekerja LIKE '$search' OR NamaStaf LIKE '$search') AND status = '$status'  ORDER BY NoPekerja ASC")->result_array();


			$data['carian'] = $status;
			$data['status'] = $status;
			$data['search'] = $search;
			$data['hasil'] = true;
			$this->load->view('components/header');
			$this->load->view('carian/staf', $data);
			$this->load->view('components/footer');
		}
	}
	public function profile_staf()
	{
		$NoPekerja = $this->input->post('NoPekerja');
		if (empty($NoPekerja)) {
			redirect('Carian/staf');
		} else {
			      $data['pengajaran'] = $this->db->query("SELECT * from pengajaran inner join kursus on pengajaran.KodKursus = kursus.KodKursus inner join semester on pengajaran.KodSem = semester.KodSem  where pengajaran.NoPekerja = '$NoPekerja'")->result_array();

			$data['query2'] = $this->db->query("SELECT * FROM staf where NoPekerja = '$NoPekerja'")->row_array();

			$data['result'] = $this->db->query("(SELECT perlantikan.id,perlantikan.NoPekerja, perlantikan.KodKursus, kursus.NamaKursus, staf.NamaStaf, 
                                            perlantikan.TarikhMula, perlantikan.TarikhTamat, perlantikan.SuratPerlantikan, perlantikan.status
											FROM perlantikan
												INNER JOIN kursus ON perlantikan.KodKursus=kursus.KodKursus 
												INNER JOIN staf ON perlantikan.NoPekerja=staf.NoPekerja
                                            WHERE perlantikan.NoPekerja = '$NoPekerja' and  perlantikan.disahkan = 'Sah'
                                            ORDER BY perlantikan.TarikhTamat DESC)
                                            UNION
                                            (SELECT  perlantikantamat.id,perlantikantamat.NoPekerja, perlantikantamat.KodKursus, kursus.NamaKursus, staf.NamaStaf, perlantikantamat.TarikhMula, perlantikantamat.TarikhTamat, perlantikantamat.SuratPerlantikan, perlantikantamat.status
											FROM perlantikantamat
												INNER JOIN kursus ON perlantikantamat.KodKursus=kursus.KodKursus 
												INNER JOIN staf ON perlantikantamat.NoPekerja=staf.NoPekerja
                                            WHERE perlantikantamat.NoPekerja = ' $NoPekerja' and  perlantikantamat.disahkan = 'Sah'
                                            ORDER BY perlantikantamat.TarikhTamat DESC)")->result_array();
			$this->load->view('components/header');
			$this->load->view('carian/profilestaf', $data);
			$this->load->view('components/footer');
		}
	}
	public function kemaskini_staf()
	{
		$NoPekerja = $this->input->post('NoPekerja');
		if (empty($NoPekerja)) {
			redirect('Carian/staf');
		} else {
			$this->form_validation->set_rules('NoPekerja', 'NoPekerja', 'required|trim');
			$this->form_validation->set_rules('Emel', 'Emel', 'required|trim');
			if ($this->form_validation->run() == false) {
				$data['query2'] = $this->db->query("SELECT * FROM staf where NoPekerja = '$NoPekerja' ")->row_array();
				$data['query3'] = $this->db->query("SELECT * FROM users WHERE NoPekerja = '$NoPekerja'")->row_array();
				$this->load->view('components/header');
				$this->load->view('carian/edit/editstaf', $data);
				$this->load->view('components/footer');
			} else {
				$data2 = array(
					"NoPekerja" => $this->input->post("NoPekerja"),
					"NoICStaf" => $this->input->post("NoICStaf"),
					"NamaStaf" => $this->input->post("NamaStaf"),
					"KodJab" => $this->input->post("KodJab"),
					"KodKampus" => $this->input->post("KodKampus"),
					"Jantina" => $this->input->post("Jantina"),
					"Emel" => $this->input->post("Emel"),
					"TelBilik" => $this->input->post("TelBilik"),
					"TelMobil" => $this->input->post("TelMobil"),
					"GredJawatan" => $this->input->post("GredJawatan"),
					"TarikhMulaKhidmat" => $this->input->post("TarikhMulaKhidmat"),
					"TarikhPencen" => $this->input->post("TarikhPencen"),
					"JenisLantikan" => $this->input->post("JenisLantikan"),
					"bilik_pejabat" => $this->input->post("bilikpejabat"),
				);
				$data1 = array(
					"role_id" => $this->input->post("role"),
					"username" => $this->input->post("NoPekerja"),
					"NoPekerja" => $this->input->post("NoPekerja"),
					"email" => $this->input->post("Emel"),

				);
				$this->db->set($data2);
				$this->db->where("NoPekerja", $this->input->post("NoPekerja"));
				$this->db->update('staf');
				$this->db->set($data1);
				$this->db->where("NoPekerja", $this->input->post("NoPekerja"));
				$this->db->update('users');
				redirect('carian/staf');
			}
		}
	}
	public function padam_staf()
	{
		$NoPekerja = $this->input->post('NoPekerja');
		if ($NoPekerja == null) {
			redirect('Carian/staf');
		} else {
			$this->form_validation->set_rules('status', 'status', 'required|trim');
			if ($this->form_validation->run() == false) {
				$data['query2'] = $this->db->query("SELECT * FROM staf where NoPekerja = '$NoPekerja'")->row_array();
				$data['query3'] = $this->db->query("SELECT * FROM users WHERE NoPekerja = '$NoPekerja'")->row_array();
				$this->load->view('components/header');
				$this->load->view('carian/padam/padamstaf', $data);
				$this->load->view('components/footer');
			} else {

				//  $data1 =array(
				//      'status'=>'tidak active',
				//  );
				$this->db->set('status', 'tidak active');
				$this->db->where("NoPekerja", $this->input->post("NoPekerja"));
				$this->db->update('staf');


				redirect('carian/staf');
			}
		}
	}
	public function subjek()
	{
		$this->form_validation->set_rules('search', 'search', 'required|trim');
		if ($this->form_validation->run() == false) {
			$data['result'] = $this->db->query("
        SELECT subjek.KodProgram, program.NamaProgram, subjek.KodKursus, kursus.NamaKursus, subjek.BhgPelan
								 FROM subjek 
									INNER JOIN program ON subjek.KodProgram=program.KodProgram 
									INNER JOIN kursus ON subjek.KodKursus=kursus.KodKursus 

									WHERE subjek.status='active'

									ORDER BY subjek.BhgPelan, subjek.KodProgram ASC
                                    ")->result_array();
			$this->load->view('components/header');
			$this->load->view('carian/subjek', $data);
			$this->load->view('components/footer');
		} else {
			$search = $this->input->post('search');
			$data['result'] = $this->db->query("
        SELECT subjek.KodProgram, program.NamaProgram, subjek.KodKursus, kursus.NamaKursus, subjek.BhgPelan
								 FROM subjek 
									INNER JOIN program ON subjek.KodProgram=program.KodProgram 
									INNER JOIN kursus ON subjek.KodKursus=kursus.KodKursus 

									WHERE subjek.status='active'
                                    AND (subjek.KodProgram LIKE '%$search%' OR subjek.KodKursus LIKE '%$search%' OR NamaProgram LIKE '%$search%' OR subjek.BhgPelan LIKE '%$search%' OR NamaKursus LIKE '%$search%') 
									ORDER BY subjek.BhgPelan, subjek.KodProgram ASC")->result_array();
			$data['search'] = $search;
			$this->load->view('components/header');
			$this->load->view('carian/subjek', $data);
			$this->load->view('components/footer');
		}
	}
	public function semester()
	{
		$this->form_validation->set_rules('search', 'search', 'required|trim');
		if ($this->form_validation->run() == false) {
			$data['result'] = $this->db->query("SELECT * FROM semester WHERE status='active' ORDER BY KodSem ASC")->result_array();
			$this->load->view('components/header');
			$this->load->view('carian/semester', $data);
			$this->load->view('components/footer');
		} else {
			$search = $this->input->post('search');
			$data['result'] = $this->db->query("SELECT * FROM semester WHERE status='active'  and (KodSem LIKE '%$search%' OR NamaSem LIKE '%$search%') ORDER BY KodSem ASC")->result_array();
			$data['search'] = $search;
			$this->load->view('components/header');
			$this->load->view('carian/semester', $data);
			$this->load->view('components/footer');
		}
	}
	public function kemaskini_semester()
	{
		$KodSem = $this->input->post('KodSem');
		if ($KodSem == null) {
			redirect('carian/semester');
		} else {
			$this->form_validation->set_rules('NamaSem', 'NamaSem', 'required|trim');
			if ($this->form_validation->run() == false) {

				$data['row'] = $this->db->query("Select * from semester where KodSem like '$KodSem'")->row_array();
				$this->load->view('components/header');
				$this->load->view('carian/edit/editsemester', $data);
				$this->load->view('components/footer');
			} else {
				$data = array(
					'KodSem' => $this->input->post('KodSem'),
					'NamaSem' => $this->input->post('NamaSem'),

				);
				$this->db->set($data);
				$this->db->where('KodSem', $KodSem);
				$this->db->update('semester');
				redirect('carian/semester');
			}
		}
	}
	public function padam_semester()
	{
		$KodSem = $this->input->post('KodSem');
		if ($KodSem == null) {
			redirect('carian/semester');
		} else {
			$this->form_validation->set_rules('NamaSem', 'NamaSem', 'required|trim');
			if ($this->form_validation->run() == false) {
				$data['query2'] = $this->db->query("Select * from semester where KodSem like '$KodSem'")->row_array();
				$this->load->view('components/header');
				$this->load->view('carian/padam/padamsemester', $data);
				$this->load->view('components/footer');
			} else {
				$this->db->set('status', 'tidak active');
				$this->db->where('KodSem', $KodSem);
				$this->db->update('semester');
				redirect('carian/semester');
			}
		}
	}
	public function perlantikan_yg_perlu_pengesahan()
	{
		$data['result'] = $this->db->query("SELECT perlantikan.print, perlantikan.disahkan, perlantikan.id,perlantikan.NoPekerja, perlantikan.KodKursus, kursus.NamaKursus, 
        staf.NamaStaf, perlantikan.TarikhMula, perlantikan.TarikhTamat, perlantikan.SuratPerlantikan
        FROM perlantikan 
            INNER JOIN kursus ON perlantikan.KodKursus=kursus.KodKursus 
            INNER JOIN staf ON perlantikan.NoPekerja=staf.NoPekerja
        WHERE perlantikan.status='active' and perlantikan.disahkan != 'Sah'
        ORDER BY KodKursus ASC")->result_array();
		$this->load->view('components/header');
		$this->load->view('carian/perlantikanrpygperlupengesahan', $data);
		$this->load->view('components/footer');
	}
	public function  perlantikan_yang_perlu_dicetak()
	{
		$data['result'] = $this->db->query("SELECT perlantikan.dicetakoleh,perlantikan.tarikhsurat,perlantikan.print, perlantikan.disahkan, perlantikan.id,perlantikan.NoPekerja, perlantikan.KodKursus, kursus.NamaKursus, 
        staf.NamaStaf, perlantikan.TarikhMula, perlantikan.TarikhTamat, perlantikan.SuratPerlantikan
        FROM perlantikan 
            INNER JOIN kursus ON perlantikan.KodKursus=kursus.KodKursus 
            INNER JOIN staf ON perlantikan.NoPekerja=staf.NoPekerja
        WHERE perlantikan.status='active' and perlantikan.disahkan like 'Sah'
        ORDER BY KodKursus ASC")->result_array();
		$this->load->view('components/header');
		$this->load->view('carian/perlantikan_yang_perlu_dicetak', $data);
		$this->load->view('components/footer');
	}
	public function surat_upload()
	{

		$url = uri_string();
		$urlarray = explode("/", $url);
		$id = $urlarray[2];
		$data['id'] = $id;

		$data['row'] = $this->db->query("SELECT * FROM perlantikan INNER JOIN kursus ON perlantikan.KodKursus=kursus.KodKursus 
    INNER JOIN staf ON  perlantikan.NoPekerja=staf.NoPekerja WHERE perlantikan.id='$id'")->row_array();


		$this->load->view('components/header');
		$this->load->view('carian/edit/uploadperlantikan', $data);
		$this->load->view('components/footer');
	}
	public function uploadsurat()
	{
		$url = uri_string();
		$urlarray = explode("/", $url);
		$id = $urlarray[2];
		$data['id'] = $id;
		$filename = time() . '-' . $_FILES["file"]['name'];
		$config['upload_path'] = './suratlantikan/';
		$config['allowed_types'] = 'pdf';
		$config['max_size'] = 20000;
		$config['file_name'] = $filename;
		$this->load->library('upload', $config);

		if ($this->upload->do_upload('file')) {
			$file = $this->upload->data('file_name');
			$data = array(
				'SuratPerlantikan' => $file
			);
			$this->db->set($data);
			$this->db->where('id', $id);
			$this->db->update('perlantikan');
			redirect('carian/perlantikan_yang_perlu_dicetak');
		}
	}
}