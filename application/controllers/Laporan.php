<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
	function __construct()
	{parent::__construct();
		if(empty($this->session->userdata('username'))){
			redirect(base_url('auth'));
		}
	}
	public function index()
	{
		$this->load->view('components/header');
		$this->load->view('laporan/laporan');
		$this->load->view('components/footer');
	}
	public function staf_tidak_aktif()
	{
		$this->form_validation->set_rules('search', 'search', 'required|trim');
		if ($this->form_validation->run() == false) {
			$data['result'] = $this->db->query("SELECT * FROM staf WHERE status='inactive' ORDER BY NoPekerja ASC")->result_array();
			$this->load->view('components/header');
			$this->load->view('laporan/sta', $data);
			$this->load->view('components/footer');
		} else {
			$search = $this->input->post('search');
			$data['search'] = $search;
			$data['result'] = $this->db->query("SELECT * FROM staf WHERE status='inactive' AND (NoPekerja LIKE '$search%' OR NamaStaf LIKE '$search%') ORDER BY NamaStaf ASC")->result_array();
			$this->load->view('components/header');
			$this->load->view('laporan/sta', $data);
			$this->load->view('components/footer');
		}
	}
	public function rp_tidak_aktif()
	{
		$this->form_validation->set_rules('search', 'search', 'required|trim');
		if ($this->form_validation->run() == false) {
			$data['result'] = $this->db->query("SELECT perlantikantamat.NoPekerja, perlantikantamat.KodKursus, kursus.NamaKursus, staf.NamaStaf, perlantikantamat.TarikhMula, perlantikantamat.TarikhTamat, perlantikantamat.SuratPerlantikan
        FROM perlantikantamat
            INNER JOIN kursus ON perlantikantamat.KodKursus=kursus.KodKursus 
            INNER JOIN staf ON perlantikantamat.NoPekerja=staf.NoPekerja 
									WHERE perlantikantamat.status='inactive'
									ORDER BY perlantikantamat.TarikhTamat, perlantikantamat.KodKursus ASC")->result_array();
			$this->load->view('components/header');
			$this->load->view('laporan/rta', $data);
			$this->load->view('components/footer');
		} else {
			$search = $this->input->post('search');
			$data['search'] = $search;
			$data['result'] = $this->db->query("SELECT perlantikantamat.NoPekerja, perlantikantamat.KodKursus, kursus.NamaKursus, staf.NamaStaf, perlantikantamat.TarikhMula, perlantikantamat.TarikhTamat, perlantikantamat.SuratPerlantikan
											FROM perlantikantamat
												INNER JOIN kursus ON perlantikantamat.KodKursus=Kursus.KodKursus 
												INNER JOIN staf ON perlantikantamat.NoPekerja=staf.NoPekerja 

												WHERE perlantikantamat.status='inactive' AND (perlantikantamat.KodKursus LIKE '%$search%' OR perlantikantamat.NoPekerja LIKE '%$search%' OR NamaKursus LIKE '%$search%' OR NamaStaf LIKE '%$search%')

												ORDER BY KodKursus ASC")->result_array();
			$this->load->view('components/header');
			$this->load->view('laporan/rta', $data);
			$this->load->view('components/footer');
		}
	}
	public function system()
	{
		$this->load->view('components/header');
		$this->load->view('laporan/system');
		$this->load->view('components/footer');
	}
	public function kursus_tanpa_lantikan()
	{
		$this->form_validation->set_rules('search', 'search', 'required|trim');
		if ($this->form_validation->run() == false) {
			$data['result'] = $this->db->query("Select * from perlantikantamat 
        left join staf on staf.NoPekerja = perlantikantamat.NoPekerja
        where KodKursus not in (select KodKursus from perlantikan)
                                    ")->result_array();
			$this->load->view('components/header');
			$this->load->view('laporan/ktl', $data);
			$this->load->view('components/footer');
		} else {
			$data['search'] = $this->input->post('search');
			$search = $this->input->post('search');
			$data['result'] = $this->db->query("Select * from perlantikantamat 
                                    left join staf on staf.NoPekerja = perlantikantamat.NoPekerja
                                    where KodKursus not in (select KodKursus from perlantikan)
                                    and KodKursus like '%" . $search . "%'
                                    ")->result_array();
			$this->load->view('components/header');
			$this->load->view('laporan/ktl', $data);
			$this->load->view('components/footer');
		}
	}
	public function semester()
	{
		$this->form_validation->set_rules('search', 'search', 'required|trim');
		if ($this->form_validation->run() == false) {
			$data['result'] = $this->db->query("SELECT * FROM semester WHERE status='active' ORDER BY KodSem ASC")->result_array();
			$this->load->view('components/header');
			$this->load->view('laporan/semester', $data);
			$this->load->view('components/footer');
		} else {
			$search = $this->input->post('search');
			$data['result'] = $this->db->query("SELECT * FROM semester WHERE status='active'  and (KodSem LIKE '%$search%' OR NamaSem LIKE '%$search%') ORDER BY KodSem ASC")->result_array();
			$data['search'] = $search;
			$this->load->view('components/header');
			$this->load->view('laporan/semester', $data);
			$this->load->view('components/footer');
		}
	}
	public function rp_dibawah_pusat_pengajian()
	{
		$NoPekerja = $this->session->userdata('username');
		$result = $this->db->query("SELECT KodJab FROM staf where NoPekerja like '$NoPekerja'")->row_array();
		$KodJab = $result['KodJab'];
		$data['result'] = $this->db->query("SELECT * FROM `perlantikan` inner join staf on perlantikan.NoPekerja = staf.NoPekerja inner join kursus on perlantikan.KodKursus = kursus.KodKursus inner join kampus on staf.KodKampus = kampus.KodKampus inner join jabatan on staf.KodJab = jabatan.KodJab WHERE  disahkan='Sah' and perlantikan.KodKursus in (SELECT KodKursus FROM `kursus` WHERE KodJab like '$KodJab') ")->result_array();
		$data['trp'] = $this->db->query("SELECT count(perlantikan.NoPekerja) as total FROM `perlantikan` inner join staf on perlantikan.NoPekerja = staf.NoPekerja inner join kursus on perlantikan.KodKursus = kursus.KodKursus inner join kampus on staf.KodKampus = kampus.KodKampus inner join jabatan on staf.KodJab = jabatan.KodJab WHERE  disahkan='Sah' and perlantikan.KodKursus in (SELECT KodKursus FROM `kursus` WHERE KodJab like '$KodJab') ")->row_array();
		$data['tp'] = $this->db->query("SELECT count(staf.NoPekerja) as total from staf where KodJab like '$KodJab'")->row_array();
		$data['td'] = $this->db->query("SELECT COUNT(kursus.KodKursus) as total FROM kursus  where kursus.type=0 and KodJab like '$KodJab' ")->row_array();
		$data['tsm'] = $this->db->query("SELECT COUNT(kursus.KodKursus) as total FROM kursus  where kursus.type=1 and KodJab like '$KodJab' ")->row_array();
		$data['ts'] = $this->db->query("SELECT COUNT(kursus.KodKursus) as total FROM kursus  where kursus.type=2 and KodJab like '$KodJab' ")->row_array();
		$data['pratd'] =$this->db->query("SELECT COUNT(kursus.KodKursus) as total FROM kursus  where kursus.type=3 and KodJab like '$KodJab' ")->row_array();
		$this->load->view('components/header');
		$this->load->view('laporan/rpdpp', $data);
		$this->load->view('components/footer');
	}
	public function rp_dibawah_pusat_pengajian_admin()
	{

		$this->form_validation->set_rules('kursus', 'kursus', 'required|trim');
		if ($this->form_validation->run() == false) {
			$data['carian'] = '';
			$data['result'] = $this->db->query("SELECT * FROM `perlantikan` inner join staf on perlantikan.NoPekerja = staf.NoPekerja inner join kursus on perlantikan.KodKursus = kursus.KodKursus inner join kampus on staf.KodKampus = kampus.KodKampus inner join jabatan on staf.KodJab = jabatan.KodJab WHERE disahkan='Sah' and  perlantikan.KodKursus in (SELECT KodKursus FROM `kursus`) ")->result_array();
			$this->load->view('components/header');
			$this->load->view('laporan/rpdppa', $data);
			$this->load->view('components/footer');
		} else {
			$data['search'] = "ada";

			$KodJab =  $this->input->post("kursus");
		
			$data['result'] = $this->db->query("SELECT * FROM `perlantikan` inner join staf on perlantikan.NoPekerja = staf.NoPekerja inner join kursus on perlantikan.KodKursus = kursus.KodKursus inner join kampus on staf.KodKampus = kampus.KodKampus inner join jabatan on staf.KodJab = jabatan.KodJab WHERE disahkan='Sah' and  perlantikan.KodKursus in (SELECT KodKursus FROM `kursus`) and jabatan.KodJab  = '$KodJab'")->result_array();
			$data['namajabatan'] = $this->db->query("SELECT * FROM jabatan where KodJab = '$KodJab'")->row_array();
			
			$this->load->view('components/header');
			$this->load->view('laporan/rpdppa', $data);
			$this->load->view('components/footer');
		}
	}
	public function kursus_perlantikan()
	{
		$data['result'] = $this->db->query("SELECT  perlantikan.print, perlantikan.disahkan, perlantikan.id,perlantikan.NoPekerja, perlantikan.KodKursus, kursus.NamaKursus, 
        staf.NamaStaf, perlantikan.TarikhMula, perlantikan.TarikhTamat, perlantikan.SuratPerlantikan
        FROM perlantikan 
            INNER JOIN kursus ON perlantikan.KodKursus=kursus.KodKursus 
            INNER JOIN staf ON perlantikan.NoPekerja=staf.NoPekerja
        WHERE perlantikan.status='active' and disahkan like'Sah' and perlantikan.SuratPerlantikan  IS NOT NULL
        ORDER BY KodKursus ASC")->result_array();

		$this->load->view('components/header');
		$this->load->view('laporan/perlantikan', $data);
		$this->load->view('components/footer');
	}
	public function list_subjek_tiada_rp()
	{
		$NoPekerja = $this->session->userdata('username');
		$result = $this->db->query("SELECT KodJab FROM staf where NoPekerja like '$NoPekerja'")->row_array();
		$KodJab = $result['KodJab'];
		$data['subjek'] = $this->db->query("SELECT * FROM kursus WHERE KodKursus NOT IN (SELECT perlantikan.KodKursus from perlantikan INNER join kursus on kursus.KodKursus = perlantikan.KodKursus) and kursus.KodJab = '$KodJab'")->result_array();
		$this->load->view('components/header');
		$this->load->view('laporan/listsubjecktiadarp', $data);
		$this->load->view('components/footer');
	}
}