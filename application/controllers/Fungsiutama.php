<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FungsiUtama extends CI_Controller {
    function __construct()
	{parent::__construct();
		if(empty($this->session->userdata('username'))){
			redirect(base_url('auth'));
		}
	}
    public function index(){
        $this->load->view('components/header');
        $this->load->view('fungsiutama/index');
        $this->load->view('components/footer');
    }
    public function cadangan_rp(){
       $this->form_validation->set_rules('search', 'search', 'required|trim');
        if($this->form_validation->run()==false){
        $this->load->view('components/header');
        $this->load->view('fungsiutama/cadanganrp');
        $this->load->view('components/footer');
        }else{
            $search =$this->input->post('search');
            $data['search']=$search;
            $data['result']=$this->db->query("(SELECT DISTINCT perlantikan.NoPekerja, perlantikan.KodKursus,  kursus.NamaKursus, staf.NamaStaf, perlantikan.status, 'ya' as rp
                                    FROM perlantikan 
                                        INNER JOIN kursus ON perlantikan.KodKursus=kursus.KodKursus 
                                        INNER JOIN staf ON perlantikan.NoPekerja=staf.NoPekerja 
                                    WHERE (perlantikan.KodKursus = '$search')
                                    ORDER BY perlantikan.NoPekerja ASC, perlantikan.status)
                                    UNION
                                    (SELECT DISTINCT pengajaran.NoPekerja, pengajaran.KodKursus,  kursus.NamaKursus, staf.NamaStaf, pengajaran.status,  'tidak' as rp
                                    FROM pengajaran 
                                        INNER JOIN kursus ON pengajaran.KodKursus=kursus.KodKursus 
                                        INNER JOIN staf ON pengajaran.NoPekerja=staf.NoPekerja 
                                    WHERE (pengajaran.KodKursus = '$search')
                                    AND staf.status = 'active'
                                    AND
                                        pengajaran.NoPekerja IN (SELECT NoPekerja
                                         FROM staf
                                         WHERE JenisLantikan='tetap'
                                         AND status='active')
                                    AND
                                        pengajaran.NoPekerja NOT IN (SELECT NoPekerja
                                         FROM perlantikan
                                         WHERE KodKursus = '$search'
                                         AND status='active')
                                    ORDER BY pengajaran.NoPekerja ASC, pengajaran.status)")->result_array();
        
        $this->load->view('components/header');
        $this->load->view('fungsiutama/cadanganrp',$data);
        $this->load->view('components/footer');
        }
    }
    public function sejarah_rp_bagi_kursus(){
        $this->form_validation->set_rules('search', 'search', 'required|trim');
        if($this->form_validation->run()==false){
        $this->load->view('components/header');
        $this->load->view('fungsiutama/sejarahrpbagikursus');
        $this->load->view('components/footer');
        }else{
            $search = $this->input->post('search');
            $data['search'] = $search;
            $data['result'] = $this->db->query("(SELECT perlantikan.id, perlantikan.NoPekerja, perlantikan.KodKursus, kursus.NamaKursus, staf.NamaStaf, perlantikan.TarikhMula, 
                                    perlantikan.TarikhTamat, perlantikan.Suratperlantikan, perlantikan.status
                                    FROM perlantikan 
                                        INNER JOIN kursus ON perlantikan.KodKursus=kursus.KodKursus 
                                        INNER JOIN staf ON perlantikan.NoPekerja=staf.NoPekerja 
                                    WHERE perlantikan.KodKursus = '$search' and perlantikan.disahkan = 'Sah'
                                    ORDER BY perlantikan.TarikhMula)
                                    UNION
                                    (SELECT perlantikantamat.id, perlantikantamat.NoPekerja, perlantikantamat.KodKursus, kursus.NamaKursus, staf.NamaStaf, perlantikantamat.TarikhMula, perlantikantamat.TarikhTamat, perlantikantamat.SuratPerlantikan, perlantikantamat.status
                                    FROM perlantikantamat 
                                        INNER JOIN kursus ON perlantikantamat.KodKursus=kursus.KodKursus 
                                        INNER JOIN staf ON perlantikantamat.NoPekerja=staf.NoPekerja
                                    WHERE perlantikantamat.KodKursus = '$search' and perlantikantamat.disahkan = 'Sah'
                                    ORDER BY perlantikantamat.TarikhMula)")->result_array();
         $this->load->view('components/header');
        $this->load->view('fungsiutama/sejarahrpbagikursus',$data);
        $this->load->view('components/footer');
                                }
    }
    public function sejarah_kursus_bagi_rp(){
         $this->form_validation->set_rules('search', 'search', 'required|trim');
        if($this->form_validation->run()==false){
        $this->load->view('components/header');
        $this->load->view('fungsiutama/sejarakursusbagirp');
        $this->load->view('components/footer');
        }else{
            $search = $this->input->post('search');
            $data['search']= $search;
            $data['result']= $this->db->query("(SELECT perlantikan.id,perlantikan.NoPekerja, perlantikan.KodKursus, kursus.NamaKursus, staf.NamaStaf, 
                                            perlantikan.TarikhMula, perlantikan.TarikhTamat, perlantikan.SuratPerlantikan, perlantikan.status
											FROM perlantikan
												INNER JOIN kursus ON perlantikan.KodKursus=kursus.KodKursus 
												INNER JOIN staf ON perlantikan.NoPekerja=staf.NoPekerja
                                            WHERE perlantikan.NoPekerja = '$search' and  perlantikan.disahkan = 'Sah'
                                            ORDER BY perlantikan.TarikhTamat DESC)
                                            UNION
                                            (SELECT  perlantikantamat.id,perlantikantamat.NoPekerja, perlantikantamat.KodKursus, kursus.NamaKursus, staf.NamaStaf, perlantikantamat.TarikhMula, perlantikantamat.TarikhTamat, perlantikantamat.SuratPerlantikan, perlantikantamat.status
											FROM perlantikantamat
												INNER JOIN kursus ON perlantikantamat.KodKursus=kursus.KodKursus 
												INNER JOIN staf ON perlantikantamat.NoPekerja=staf.NoPekerja
                                            WHERE perlantikantamat.NoPekerja = '$search' and  perlantikantamat.disahkan = 'Sah'
                                            ORDER BY perlantikantamat.TarikhTamat DESC)")->result_array();
        $this->load->view('components/header');
        $this->load->view('fungsiutama/sejarakursusbagirp',$data);
        $this->load->view('components/footer');
       }
    }
    public function pensyarah_kepada_kursus(){
        $this->form_validation->set_rules('search', 'search', 'required|trim');
        if($this->form_validation->run()==false){
        $this->load->view('components/header');
        $this->load->view('fungsiutama/pensyarahkepadakursus');
        $this->load->view('components/footer');
        }else{
            $search = $this->input->post('search');
            $data['search']= $search;
            $data['result'] =$this->db->query("	SELECT pengajaran.NoPekerja, staf.NamaStaf, staf.KodKampus,kursus.NamaKursus, pengajaran.status, pengajaran.KodKursus, pengajaran.KodSem, semester.NamaSem, pengajaran.status
											FROM pengajaran
											INNER JOIN staf ON pengajaran.NoPekerja=staf.NoPekerja
											INNER JOIN kursus ON pengajaran.KodKursus=kursus.KodKursus
											INNER JOIN semester ON pengajaran.KodSem=semester.KodSem
											WHERE pengajaran.KodKursus = '$search' 
											ORDER BY pengajaran.KodSem DESC, staf.KodKampus, pengajaran.status")->result_array();
       
        $this->load->view('components/header');
        $this->load->view('fungsiutama/pensyarahkepadakursus',$data);
        $this->load->view('components/footer');
        }
    }
    public function kursus_kepada_pensyarah(){
        $this->form_validation->set_rules('search', 'search', 'required|trim');
        if($this->form_validation->run()==false){
        $this->load->view('components/header');
        $this->load->view('fungsiutama/kursuskepadapensyarah');
        $this->load->view('components/footer');
        }else{
            $search = $this->input->post('search');
            $data['search']=$search;
            $data['result']=$this->db->query("	SELECT  pengajaran.NoPekerja, staf.NamaStaf, kursus.NamaKursus,  pengajaran.status,  pengajaran.KodKursus,  pengajaran.KodSem, semester.NamaSem,  pengajaran.status
											FROM pengajaran
											INNER JOIN staf ON  pengajaran.NoPekerja=staf.NoPekerja
											INNER JOIN kursus ON  pengajaran.KodKursus=kursus.KodKursus
											INNER JOIN semester ON  pengajaran.KodSem=semester.KodSem
											WHERE  pengajaran.NoPekerja = '$search'
											ORDER BY  pengajaran.status,  pengajaran.KodSem ASC")->result_array();
        
        $this->load->view('components/header');
        $this->load->view('fungsiutama/kursuskepadapensyarah',$data);
        $this->load->view('components/footer');
        }
    }
}