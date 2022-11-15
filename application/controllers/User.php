<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
        $data['result'] = $this->db->query("SELECT * FROM `accesscontrol` INNER JOIN menu on accesscontrol.menu_id =menu.id WHERE role_id =$role")->result_array();
        $this->load->view('components/header');
        $this->load->view('dashboard/user', $data);
        $this->load->view('components/footer');
    }
    public function profile()
    {
        $NoPekerja = $this->session->userdata('username');
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
        if (empty($NoPekerja)) {
            redirect('Carian/staf');
        } else {
            $data['query2'] = $this->db->query("SELECT * FROM staf where NoPekerja = '$NoPekerja'")->row_array();
            $this->load->view('components/header');
            $this->load->view('dashboard/profile', $data);
            $this->load->view('components/footer');
        }
    }
    public function kemaskini()
    {
        $NoPekerja = $this->session->userdata('username');
        if (empty($NoPekerja)) {
            redirect('user');
        } else {
            $this->form_validation->set_rules('NoICStaf', 'NoICStaf', 'required|trim');
            if ($this->form_validation->run() == false) {
                $data['query2'] = $this->db->query("SELECT * FROM staf where NoPekerja = '$NoPekerja'")->row_array();
                $data['query3'] = $this->db->query("SELECT * FROM users WHERE NoPekerja = '$NoPekerja'")->row_array();
                $this->load->view('components/header');
                $this->load->view('dashboard/kemaskini', $data);
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
                redirect('user/profile');
            }
        }
    }
    public function perlantikan()
    {
        $search = $this->session->userdata('username');
        $data['result'] = $this->db->query("SELECT  perlantikan.id,perlantikan.NoPekerja, perlantikan.KodKursus,kursus.NamaKursus, 
                                staf.NamaStaf, perlantikan.TarikhMula, perlantikan.TarikhTamat,perlantikan.SuratPerlantikan
								FROM perlantikan
								INNER JOIN kursus ON perlantikan.KodKursus=kursus.KodKursus 
									INNER JOIN staf ON perlantikan.NoPekerja=staf.NoPekerja
                                WHERE perlantikan.status='active'
                                and (perlantikan.NoPekerja LIKE '$search' or perlantikan.KodKursus LIKE '$search')
                                ORDER BY KodKursus ASC")->result_array();
        $data['search'] = $search;
        $data['search'] = $search;
        $this->load->view('components/header');
        $this->load->view('dashboard/perlantikan', $data);
        $this->load->view('components/footer');
    }
}