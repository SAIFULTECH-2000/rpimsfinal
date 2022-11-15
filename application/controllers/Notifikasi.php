<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifikasi extends CI_Controller {
    function __construct()
	{parent::__construct();
		if(empty($this->session->userdata('username'))){
			redirect(base_url('auth'));
		}
	}
	public function index() {
        $this->load->view('components/header');
        $this->load->view('notifikasi/notifikasi');
        $this->load->view('components/footer');
    }
    public function rp_akan_tamat(){
    //      $queryperlantikan = mysqli_query($DBcon, "UPDATE PERLANTIKAN set status='inactive' where TarikhTamat<=CAST(CURRENT_TIMESTAMP AS DATE)");
    // $querymovetamat = mysqli_query($DBcon, "INSERT INTO PERLANTIKANTAMAT SELECT * FROM PERLANTIKAN WHERE status='inactive'");
    // $querydeletetamat = mysqli_query($DBcon, "DELETE FROM PERLANTIKAN WHERE status='inactive'");
    // $querystaf = mysqli_query($DBcon, "UPDATE STAF set status='inactive' where TarikhPencen=CAST(CURRENT_TIMESTAMP AS DATE)");
    // $querynoti = mysqli_query($DBcon, "INSERT INTO NOTIFIKASI (NoPekerja, NamaStaf, KodKursus, TarikhMula, TarikhTamat)
    //                                    SELECT PERLANTIKAN.NoPekerja, STAF.NamaStaf, PERLANTIKAN.KodKursus, PERLANTIKAN.TarikhMula, PERLANTIKAN.TarikhTamat FROM PERLANTIKAN
    //                                    INNER JOIN STAF ON PERLANTIKAN.NoPekerja=STAF.NoPekerja 
    //                                    WHERE CURRENT_DATE >= (CAST(TarikhTamat AS DATE) + INTERVAL -1 MONTH)
    //                                    AND  NOT EXISTS (SELECT * 
    //                                                     FROM NOTIFIKASI
    //                                                     WHERE NOTIFIKASI.NoPekerja = PERLANTIKAN.NoPekerja
    //                                                     AND NOTIFIKASI.KodKursus = PERLANTIKAN.KodKursus
    //                                                     AND NOTIFIKASI.TarikhMula = PERLANTIKAN.TarikhMula)");
   
   $data['result']=$this->db->query("	SELECT id, NoPekerja, KodKursus, TarikhMula, TarikhTamat, NamaStaf FROM notifikasi
											WHERE TarikhTamat >= CURDATE() AND lantik = 'belum'")->result_array();
        $this->load->view('components/header');
        $this->load->view('notifikasi/akantamat',$data);
        $this->load->view('components/footer');
    }
    public function tamat(){
        $this->form_validation->set_rules('search', 'search', 'required|trim');
        if($this->form_validation->run()==false){
        $data['result'] = $this->db->query("SELECT id, NoPekerja, KodKursus, TarikhMula, TarikhTamat, NamaStaf FROM notifikasi
                                            WHERE TarikhTamat < CURDATE() AND lantik = 'belum'")->result_array();
        $this->load->view('components/header');
        $this->load->view('notifikasi/tamat',$data);
        $this->load->view('components/footer');
        }else{
            $search = $this->input->post('search');
             $data['result'] = $this->db->query("SELECT id, NoPekerja, KodKursus, TarikhMula, TarikhTamat, NamaStaf FROM NOTIFIKASI 
                                            WHERE TarikhTamat < CURDATE() AND lantik = 'belum'  and (NamaStaf like '%".$search."%'
                      or KodKursus like '%".$search."%')")->result_array();
        $this->load->view('components/header');
        $this->load->view('notifikasi/tamat',$data);
        $this->load->view('components/footer');
        }
    }
}