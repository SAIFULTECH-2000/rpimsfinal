<?php

require_once 'vendor/autoload.php';
class Surat extends CI_Controller
{
    function __construct()
	{parent::__construct();
		if(empty($this->session->userdata('username'))){
			redirect(base_url('auth'));
		}
	}
    public function view()
    {
        $search = $this->uri->segment(3);

        $data['row'] = $this->db->query("(SELECT perlantikan.gelaran, perlantikan.tarikhsurat,staf.GredJawatan,staf.Jantina, perlantikan.id, perlantikan.NoPekerja, perlantikan.KodKursus,kursus.NamaKursus, staf.NamaStaf, perlantikan.TarikhMula, 
        perlantikan.TarikhTamat, perlantikan.Suratperlantikan, perlantikan.status
        FROM perlantikan 
            INNER JOIN kursus ON perlantikan.KodKursus=kursus.KodKursus 
            INNER JOIN staf ON perlantikan.NoPekerja=staf.NoPekerja 
        WHERE perlantikan.id= '$search'
        ORDER BY perlantikan.TarikhMula)
        UNION
        (SELECT perlantikantamat.gelaran ,perlantikantamat.tarikhsurat,staf.GredJawatan,staf.Jantina, perlantikantamat.id, perlantikantamat.NoPekerja, perlantikantamat.KodKursus, kursus.NamaKursus, staf.NamaStaf, perlantikantamat.TarikhMula, perlantikantamat.TarikhTamat, perlantikantamat.SuratPerlantikan, perlantikantamat.status
        FROM perlantikantamat 
            INNER JOIN kursus ON perlantikantamat.KodKursus=kursus.KodKursus 
            INNER JOIN staf ON perlantikantamat.NoPekerja=staf.NoPekerja
        WHERE perlantikantamat.id = '$search'
        ORDER BY perlantikantamat.TarikhMula)")->row_array();
        $perlantikan = $this->db->query("(SELECT perlantikan.gelaran, perlantikan.tarikhsurat,staf.GredJawatan,staf.Jantina, perlantikan.id, perlantikan.NoPekerja, perlantikan.KodKursus,kursus.NamaKursus, staf.NamaStaf, perlantikan.TarikhMula, 
        perlantikan.TarikhTamat, perlantikan.Suratperlantikan, perlantikan.status
        FROM perlantikan 
            INNER JOIN kursus ON perlantikan.KodKursus=kursus.KodKursus 
            INNER JOIN staf ON perlantikan.NoPekerja=staf.NoPekerja 
        WHERE perlantikan.id= '$search'
        ORDER BY perlantikan.TarikhMula)
        UNION
        (SELECT perlantikantamat.gelaran ,perlantikantamat.tarikhsurat,staf.GredJawatan,staf.Jantina, perlantikantamat.id, perlantikantamat.NoPekerja, perlantikantamat.KodKursus, kursus.NamaKursus, staf.NamaStaf, perlantikantamat.TarikhMula, perlantikantamat.TarikhTamat, perlantikantamat.SuratPerlantikan, perlantikantamat.status
        FROM perlantikantamat 
            INNER JOIN kursus ON perlantikantamat.KodKursus=kursus.KodKursus 
            INNER JOIN staf ON perlantikantamat.NoPekerja=staf.NoPekerja
        WHERE perlantikantamat.id = '$search'
        ORDER BY perlantikantamat.TarikhMula)")->row_array();
        if (isset($perlantikan)) {
            $id = $this->uri->segment(3);
            $this->db->set('print', date("Y-n-j"));
            $this->db->set('dicetakoleh', $this->session->userdata('NoPekerja'));

            $this->db->where('id', $id);
            $this->db->update('perlantikan');
        }
        $data['tetapan'] = $this->db->query("SELECT * FROM tetapan where id=1")->row_array();
        $this->load->view('suratperlantikan/suratperlantikan', $data);
    }
    public function generatesuratlantikan()
    {

        $search = $this->uri->segment(3);


        $data['row'] = $this->db->query("(SELECT perlantikan.gelaran,perlantikan.tarikhsurat,staf.GredJawatan,staf.Jantina, perlantikan.id, perlantikan.NoPekerja, perlantikan.KodKursus,kursus.NamaKursus, staf.NamaStaf, perlantikan.TarikhMula, 
        perlantikan.TarikhTamat, perlantikan.Suratperlantikan, perlantikan.status
        FROM perlantikan 
            INNER JOIN kursus ON perlantikan.KodKursus=kursus.KodKursus 
            INNER JOIN staf ON perlantikan.NoPekerja=staf.NoPekerja 
        WHERE perlantikan.id= '$search'
        ORDER BY perlantikan.TarikhMula)
        UNION
        (SELECT perlantikantamat.gelaran,perlantikantamat.tarikhsurat,staf.GredJawatan,staf.Jantina, perlantikantamat.id, perlantikantamat.NoPekerja, perlantikantamat.KodKursus, kursus.NamaKursus, staf.NamaStaf, perlantikantamat.TarikhMula, perlantikantamat.TarikhTamat, perlantikantamat.SuratPerlantikan, perlantikantamat.status
        FROM perlantikantamat 
            INNER JOIN kursus ON perlantikantamat.KodKursus=kursus.KodKursus 
            INNER JOIN staf ON perlantikantamat.NoPekerja=staf.NoPekerja
        WHERE perlantikantamat.id = '$search'
        ORDER BY perlantikantamat.TarikhMula)")->row_array();

        $perlantikan = $this->db->query("SELECT perlantikan.tarikhsurat,staf.GredJawatan,staf.Jantina, perlantikan.id, perlantikan.NoPekerja, perlantikan.KodKursus,kursus.NamaKursus, staf.NamaStaf, perlantikan.TarikhMula, 
        perlantikan.TarikhTamat, perlantikan.Suratperlantikan, perlantikan.status
        FROM perlantikan 
            INNER JOIN kursus ON perlantikan.KodKursus=kursus.KodKursus 
            INNER JOIN staf ON perlantikan.NoPekerja=staf.NoPekerja 
        WHERE perlantikan.id= '$search'
        ORDER BY perlantikan.TarikhMula")->row_array();
        if (isset($perlantikan)) {
            $id = $this->uri->segment(3);
            $this->db->set('print', date("Y-n-j"));
            $this->db->set('dicetakoleh', $this->session->userdata('NoPekerja'));

            $this->db->where('id', $id);
            $this->db->update('perlantikan');
        }
        $perlantikantamat = $this->db->query("(SELECT perlantikantamat.tarikhsurat,staf.GredJawatan,staf.Jantina, perlantikantamat.id, perlantikantamat.NoPekerja, perlantikantamat.KodKursus, kursus.NamaKursus, staf.NamaStaf, perlantikantamat.TarikhMula, perlantikantamat.TarikhTamat, perlantikantamat.SuratPerlantikan, perlantikantamat.status
        FROM perlantikantamat 
            INNER JOIN kursus ON perlantikantamat.KodKursus=kursus.KodKursus 
            INNER JOIN staf ON perlantikantamat.NoPekerja=staf.NoPekerja
        WHERE perlantikantamat.id = '$search'
        ORDER BY perlantikantamat.TarikhMula)");
        if (isset($perlantikantamat)) {
            $id = $this->uri->segment(3);
            $this->db->set('print', date("Y-n-j"));
            $this->db->set('dicetakoleh', $this->session->userdata('NoPekerja'));

            $this->db->where('id', $id);
            $this->db->update('perlantikantamat');
        }


        $data['tetapan'] = $this->db->query("SELECT * FROM tetapan where id=1")->row_array();
        $this->load->view('suratperlantikan/suratperlantikan', $data);
        $dompdf = new Dompdf\Dompdf();
        $html = $this->load->view('suratperlantikan/suratperlantikan', $data, true);
        $dompdf->loadHtml($html);
        $dompdf->set_option('isRemoteEnabled', TRUE);
        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');
        // Render the HTML as PDF
        $dompdf->render();
        // Get the generated PDF file contents
        $pdf = $dompdf->output();
        // Output the generated PDF to Browser
        $dompdf->stream();
    }
}