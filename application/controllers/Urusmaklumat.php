<?php
defined('BASEPATH') or exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\OAuth;
//Alias the League Google OAuth2 provider class
use League\OAuth2\Client\Provider\Google;

//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('Etc/UTC');
class Urusmaklumat extends CI_Controller
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
        $this->load->view('urus/urusmaklumat');
        $this->load->view('components/footer');
    }
    public function daftar_staf()
    {
        $this->form_validation->set_rules('NoPekerja', 'NoPekerja', 'required|trim|is_unique[staf.NoPekerja]');
        if ($this->form_validation->run() == false) {
            $this->load->view('components/header');
            $this->load->view('urus/staf');
            $this->load->view('components/footer');
        } else {
            $data = array(
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
            );
            $data1 = array(
                "role_id" => $this->input->post("role"),
                "username" => $this->input->post("NoPekerja"),
                "NoPekerja" => $this->input->post("NoPekerja"),
                "email" => $this->input->post("Emel"),
                "pwd" => "abc123",
            );
            $this->db->db_debug = false;
            !@ $this->db->insert('users', $data1);
            if((!@$this->db->insert('staf', $data))){
            $data2['msg'] = "<p style='color:red;'>Opss, duplicate no pekerja</p>";
            $this->load->view('components/header');
            $this->load->view('urus/staf', $data2);
            $this->load->view('components/footer');
            }else{
                //berjaga
            $data2['msg'] = 'Terima kasih, staf baru berjaya ditambah';
            $this->load->view('components/header');
            $this->load->view('urus/staf', $data2);
            $this->load->view('components/footer');
            }
        }
    }
    public function daftar_kampus()
    {
        $this->form_validation->set_rules('KodKampus', 'KodKampus', 'required|trim');
        $this->form_validation->set_rules('NamaKampus', 'NamaKampus', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('components/header');
            $this->load->view('urus/kampus');
            $this->load->view('components/footer');
        } else {
            $data1 = array(
                "KodKampus" => $this->input->post('KodKampus'),
                "NamaKampus" => $this->input->post('NamaKampus'),
            );
            $this->db->db_debug = false;
            if(!@$this->db->insert('kampus', $data1)){
            $data['msg'] = "<p style='color:red'>Opss duplicate kod kampus .<br><br></p>";
            $this->load->view('components/header');
            $this->load->view('urus/kampus', $data);
            $this->load->view('components/footer'); 
            }else{
            $data['msg'] = "Terima kasih, <b>kampus</b> baru berjaya ditambah.<br><br>";
            $this->load->view('components/header');
            $this->load->view('urus/kampus', $data);
            $this->load->view('components/footer');   
            }
        }
    }
    public function daftar_jabatan()
    {
        $this->form_validation->set_rules('KodJab', 'KodJab', 'required|trim');
        $this->form_validation->set_rules('NamaJabBhg', 'NamaJabBhg', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('components/header');
            $this->load->view('urus/jabatan');
            $this->load->view('components/footer');
        } else {
            $data1 = array(
                'KodJab' => $this->input->post('KodJab'),
                'NamaJabBhg' => $this->input->post('NamaJabBhg'),
            );
            $this->db->db_debug = false;
            if(!@$this->db->insert('jabatan', $data1)){
             $data['msg'] = "<p style='color:red'>Ops <b>jabatan gagal ditambah kerana duplicate KodJab</b> <br><br></p>";
            $this->load->view('components/header');
            $this->load->view('urus/jabatan', $data);
            $this->load->view('components/footer');   
            }else{
            $data['msg'] = "Terima kasih, <b>BIDANG</b> baru berjaya ditambah.<br><br>";
            $this->load->view('components/header');
            $this->load->view('urus/jabatan', $data);
            $this->load->view('components/footer');
            }
        }
    }
    public function daftar_kursus()
    {
        $this->form_validation->set_rules('KodKursus', 'KodKursus', 'required|trim');
        $this->form_validation->set_rules('NamaKursus', 'NamaKursus', 'required|trim');
        $this->form_validation->set_rules('KodJab', 'KodJab', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('components/header');
            $this->load->view('urus/kursus');
            $this->load->view('components/footer');
        } else {
            $data1 = array(
                "KodKursus" => $this->input->post("KodKursus"),
                "NamaKursus" => $this->input->post("NamaKursus"),
                "KodJab" => $this->input->post("KodJab"),
                "type"=>$this->input->post("type")
            );
           // $this->db->insert('kursus', $data1);
            $this->db->db_debug = false;

            if(!@$this->db->insert('kursus', $data1)){
            $error = $this->db->error();
            // do something in error case
                $data['msg'] = "<font color='red'>Opps, <b>kursus</b> Terdapat masalah di kod khusus sila padam atau kemaskini khusus sedia ada</font><br><br> ";
            $this->load->view('components/header');
            $this->load->view('urus/kursus', $data);
            $this->load->view('components/footer');
            }else{
             // do something in success case
                 $data['msg'] = "<font color='green'>Terima kasih, <b>kursus</b> baru berjaya ditambah.</font><br><br>";
            $this->load->view('components/header');
            $this->load->view('urus/kursus', $data);
            $this->load->view('components/footer');
            }
        
        }
    }
    private function _sendmail($rpname,$jabatan)
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
        $USERS = $this->db->query("select * from users where role_id='1'")->result_array();
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

        $mail->Body = "Dear Sir/Madam<br><br>

New appointment for a resource person in the <br>RPMIS.  
Please login to the RPMIS for further action.<br>
<br>

LINK    : https://fskmtech.com/rpims<br>
RP Name:$rpname<br>
BIDANG:$jabatan<br>

Thank you<br>
";

        //send the message, check for errors
        if (!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message sent!';
        }
    }
    public function daftar_perlantikan_rp()
    {
        $this->form_validation->set_rules('KodKursus', 'KodKursus', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('components/header');
            $this->load->view('urus/perlantikan');
            $this->load->view('components/footer');
        } else {
            if ($this->input->post('disahkan') == null) {
                $data = array(
                    'TarikhMula' => $this->input->post('TarikhMula'),
                    'TarikhTamat' => $this->input->post('TarikhTamat'),
                    'KodKursus' => $this->input->post('KodKursus'),
                    'NoPekerja' => $this->input->post('NoPekerja'),

                );
            } else {
                $data = array(
                    'disahkan' => $this->input->post('disahkan'),
                    'TarikhMula' => $this->input->post('TarikhMula'),
                    'TarikhTamat' => $this->input->post('TarikhTamat'),
                    'KodKursus' => $this->input->post('KodKursus'),
                    'NoPekerja' => $this->input->post('NoPekerja'),
                    'gelaran' => $this->input->post('gelaran')
                );
            }
            $NoPekerja = $this->input->post('NoPekerja');

            $staff= $this->db->get_where('staf', ['NoPekerja' => $NoPekerja])->row_array();
            $rpname = $staff['NamaStaf'];
            $KodJab = $staff['KodJab'];
            $jabatan = $this->db->get_where('jabatan', ['KodJab' => $KodJab])->row_array();
            $this->_sendmail($rpname,$jabatan['NamaJabBhg']);
            $this->db->db_debug = false;

            if(!@ $this->db->insert('perlantikan', $data)){
            $this->session->set_flashdata('fails', "<p style='color:red'>Opss perlantikan tidak dapat merekod perlantikan, sila isi semua </p>");
            redirect('urusmaklumat/daftar_perlantikan_rp');
            }else{
             $this->session->set_flashdata('success', 'Perlantikan Berjaya ditambah');
            redirect('urusmaklumat/daftar_perlantikan_rp');   
            }
        }
    }
    public function daftar_pengajaran()
    {
        $this->form_validation->set_rules('NoPekerja', 'NoPekerja', 'required|trim');
        $this->form_validation->set_rules('KodKursus', 'KodKursus', 'required|trim');
        $this->form_validation->set_rules('KodSem', 'KodSem', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('components/header');
            $this->load->view('urus/pengajaran');
            $this->load->view('components/footer');
        } else {
           
            $data1 = array(
                "NoPekerja" => $this->input->post("NoPekerja"),
                "KodKursus" => $this->input->post("KodKursus"),
                "KodSem" => $this->input->post("KodSem")
            );
             $this->db->db_debug = false;

          if(!@  $this->db->insert('pengajaran', $data1)){
            $data['msg'] = "<p style='color:red'>Tidak dapat daftar pengajaran sila isi semula</p>";
            $this->load->view('components/header');
            $this->load->view('urus/pengajaran', $data);
            $this->load->view('components/footer');
          }else{
            $data['msg'] = "Terima kasih, data pengajaran baru berjaya ditambah.<br>";
            $this->load->view('components/header');
            $this->load->view('urus/pengajaran', $data);
            $this->load->view('components/footer');
          }
        }
    }
    public function daftar_semester()
    {
        $this->form_validation->set_rules('KodSem', 'KodSem', 'required|trim');
        $this->form_validation->set_rules('NamaSem', 'NamaSem', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('components/header');
            $this->load->view('urus/semester');
            $this->load->view('components/footer');
        } else {
            $data1 = array(
                "KodSem" => $this->input->post('KodSem'),
                "NamaSem" => $this->input->post('NamaSem'),
            );
            $this->db->db_debug = false;
            if(!@ $this->db->insert('semester', $data1)){
            $data['msg'] = "<p style='color:red'>Ops subjek tidak dapat didaftarkan</p>";
            $this->load->view('components/header');
            $this->load->view('urus/semester', $data);
            $this->load->view('components/footer');   
            }else{
            $data['msg'] = "Terima kasih, subjek baru berjaya ditambah.<br>";
            $this->load->view('components/header');
            $this->load->view('urus/semester', $data);
            $this->load->view('components/footer');   
            }
        }
    }

    public function daftar_cawangan()
    {
        $this->form_validation->set_rules('KodJab', 'KodJab', 'required|trim');
        $this->form_validation->set_rules('KodKampus', 'KodKampus', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('components/header');
            $this->load->view('urus/cawangan');
            $this->load->view('components/footer');
        } else {
            $data1 = array(
                'KodJab' => $this->input->post('KodJab'),
                'KodKampus' => $this->input->post('KodKampus'),
            );
            $this->db->db_debug = false;
            if(!@$this->db->insert('cawangan', $data1)){
            $data['msg'] = "<font color='red'>Ops cawangan tidak dapat ditambah<br></font>";
            $this->load->view('components/header');
            $this->load->view('urus/cawangan', $data);
            $this->load->view('components/footer');   
            }else{
            $data['msg'] = "<font color='green'>Terima kasih, data <b>cawangan</b> baru berjaya ditambah.<br></font>";
            $this->load->view('components/header');
            $this->load->view('urus/cawangan', $data);
            $this->load->view('components/footer');   
            }
        }
    }
    public function daftar_program()
    {
        $this->form_validation->set_rules('KodProgram', 'KodProgram', 'required|trim');
        $this->form_validation->set_rules('NamaProgram', 'NamaProgram', 'required|trim');
        $this->form_validation->set_rules('KodJab', 'KodJab', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('components/header');
            $this->load->view('urus/program');
            $this->load->view('components/footer');
        } else {
            $data1 = array(
                "KodProgram" => $this->input->post("KodProgram"),
                "NamaProgram" => $this->input->post("NamaProgram"),
                "KodJab" => $this->input->post("KodJab")
            );
            $this->db->db_debug = false;
            if(!@ $this->db->insert('program', $data1)){
            $data['msg'] = "<p style='red'>program tidak dapat ditambah , sila isi semula</p>";
            $this->load->view('components/header');
            $this->load->view('urus/program', $data);
            $this->load->view('components/footer');
            }else{
            $data['msg'] = "Terima kasih, program baru berjaya ditambah.<br>";
            $this->load->view('components/header');
            $this->load->view('urus/program', $data);
            $this->load->view('components/footer');
            }
        }
    }
    public function daftar_subjek()
    {
        $this->form_validation->set_rules('KodProgram', 'KodProgram', 'required|trim');
        $this->form_validation->set_rules('KodKursus', 'KodKursus', 'required|trim');
        $this->form_validation->set_rules('BhgPelan', 'BhgPelan', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('components/header');
            $this->load->view('urus/subjek');
            $this->load->view('components/footer');
        } else {
            $data1 = array(
                "KodProgram" => $this->input->post("KodProgram"),
                "KodKursus" => $this->input->post("KodKursus"),
                "BhgPelan" => $this->input->post("BhgPelan")
            );
            $this->db->db_debug = false;
            if(!@$this->db->insert('subjek', $data1)){
            $data['msg'] = "<p style='color:red'>Tidak dapat menambah program ,sila isi semula</p><br>";
            $this->load->view('components/header');
            $this->load->view('urus/subjek', $data);
            $this->load->view('components/footer');   
            }else{
              $data['msg'] = "Terima kasih, program baru berjaya ditambah.<br>";
            $this->load->view('components/header');
            $this->load->view('urus/subjek', $data);
            $this->load->view('components/footer');   
            }
        }
    }

    public function daftar_staf_excel()
    {
        $data['result'] = 0;
        $data['test'] = 1;


        $this->form_validation->set_rules('files', 'files', 'required|trim');
        if ($this->form_validation->run() == false) {


            $this->load->view('components/header');
            $this->load->view('urus/excel', $data);
            $this->load->view('components/footer');
        } else {

            if ($_FILES["file"]['name']) {

                $allowed_extension = array('xls', 'xlsx');
                $file_array = explode(".", $_FILES['file']['name']);
                $file_extension = end($file_array);
                if (in_array($file_extension, $allowed_extension)) {
                    $file_name = time() . '.' . $file_extension;
                    move_uploaded_file($_FILES['file']['tmp_name'], $file_name);
                    $config['upload_path']          = './assets/file/';
                    $config['allowed_types']        = 'xls|xlsx';
                    $config['max_size']             = 1000;
                    $config['file_name'] = $file_name;
                    $this->load->library('upload', $config);
                    $this->upload->do_upload('file');
                    $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($file_name);
                    $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

                    $spreadsheet = $reader->load($file_name);

                    unlink($file_name);

                    $data['result'] = $spreadsheet->getActiveSheet()->toArray();
                    $result = $spreadsheet->getActiveSheet()->toArray();
                    $data['file'] = $file_name;
                }
                $data['test'] = 0;
                $i = 0;
                foreach ($result as $row) {
                    if ($i != 0 and $row[0] != "") {
                        $data2 = array(
                            "NoPekerja" => $row[0],
                            "NamaStaf" => $row[1],
                            "Emel" => $row[2],
                            "status" => 'active'
                        );
                        $data1 = array(
                            "role_id" => 3,
                            "username" => $row[0],
                            "NoPekerja" => $row[0],
                            "email" => $row[2],
                            "pwd" => "abc123",
                        );
                        $this->db->insert('staf', $data2);
                        $this->db->insert('users', $data1);
                    }
                    $i++;
                }
                $this->load->view('components/header');
                $this->load->view('urus/excel', $data);
                $this->load->view('components/footer');
            }
        }
    }
}