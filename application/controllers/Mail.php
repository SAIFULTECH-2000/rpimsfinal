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
class Mail extends CI_Controller {
   function __construct()
	{parent::__construct();
		if(empty($this->session->userdata('username'))){
			redirect(base_url('auth'));
		}
	}
    public function index()
    {
        $search='DEV001';
        
     
        $data['row'] = $this->db->query("SELECT * FROM PERLANTIKAN INNER JOIN KURSUS ON PERLANTIKAN.KodKursus=KURSUS.KodKursus INNER JOIN STAF ON PERLANTIKAN.NoPekerja=STAF.NoPekerja WHERE PERLANTIKAN.status='active' and perlantikan.NoPekerja like '%$search%'"
        )->row_array();
      //  $this->load->view('suratperlantikan/suratperlantikan',$data);
          $dompdf = new Dompdf\Dompdf();
        $html = $this->load->view('suratperlantikan/suratperlantikan',$data, true);
        $dompdf->loadHtml($html);
        $dompdf->set_option('isRemoteEnabled',TRUE);
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');
        // Render the HTML as PDF
        $dompdf->render();
        // Get the generated PDF file contents
        $pdf = $dompdf->output();
        file_put_contents('assets/doc/dokumen.pdf',$pdf);
        // Output the generated PDF to Browser

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
$mail->setFrom($email, 'First Last');

//Set who the message is to be sent to
$mail->addAddress('saifultech.official@gmail.com', 'Saifultech');

//Set the subject line
$mail->Subject = 'SURAT PERLANTIKAN RESOURCES PERSON';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->CharSet = PHPMailer::CHARSET_UTF8;
// $mail->msgHTML(file_get_contents('contentsutf8.html'), __DIR__);

//Replace the plain text body with one created manually
$mail->AltBody = 'SURAT PERLANTIKAN RESOURCES PERSON';

$mail->Body = 'Testing';
$mail->AddAttachment('assets/doc/dokumen.pdf');
//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';
}
    }
}