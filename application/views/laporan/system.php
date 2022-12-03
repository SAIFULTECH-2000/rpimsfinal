<div id="back-senarai-no-carian">
    <a href="<?=base_url('laporan')?>"><button class="button"
            style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a>
</div>
<section>
    <br />
    <?php 
$NoPekerja = $this->session->userdata('username');
$result = $this->db->query("SELECT KodJab FROM staf where NoPekerja like '$NoPekerja'")->row_array();
$KodJab = $result['KodJab'];


$pensyarah = $this->db->query("SELECT * from staf ")->num_rows();
$jabatan = $this->db->query("SELECT * from jabatan")->num_rows();
$kampus = $this->db->query("SELECT * from kampus")->num_rows();
$kursus = $this->db->query("SELECT * from kursus")->num_rows();
$cawangan = $this->db->query("SELECT * from cawangan")->num_rows();
$program = $this->db->query("SELECT * from program")->num_rows();
$subjek = $this->db->query("SELECT * from subjek")->num_rows();

$trp = $this->db->query("SELECT count(perlantikan.NoPekerja) as total FROM `perlantikan` inner join staf on perlantikan.NoPekerja = staf.NoPekerja inner join kursus on perlantikan.KodKursus = kursus.KodKursus inner join kampus on staf.KodKampus = kampus.KodKampus inner join jabatan on staf.KodJab = jabatan.KodJab WHERE  disahkan='Sah' and perlantikan.KodKursus in (SELECT KodKursus FROM `kursus` WHERE KodJab like '$KodJab') ")->row_array();
$tp = $this->db->query("SELECT count(staf.NoPekerja) as total from staf where KodJab like '$KodJab'")->row_array();
$td = $this->db->query("SELECT COUNT(kursus.KodKursus) as total FROM kursus  where kursus.type=0 and KodJab like '$KodJab' ")->row_array();
$tsm = $this->db->query("SELECT COUNT(kursus.KodKursus) as total FROM kursus  where kursus.type=1 and KodJab like '$KodJab' ")->row_array();
$ts = $this->db->query("SELECT COUNT(kursus.KodKursus) as total FROM kursus  where kursus.type=2 and KodJab like '$KodJab' ")->row_array();
?>
    <br>
    <p><b>
            <font size='5'> <i class='fa fa-archive' aria-hidden='true'></i> &nbsp LAPORAN SISTEM TERBARU</font>
        </b></p>
    <div id="table-wrapper">
        <div id="table-scroll">
            <table align="center" class="data-table">
                <tr>
                    <th>Pensyarah</th>
                    <th>Bidang</th>
                    <th>Kampus</th>
                    <th>Kursus</th>
                    <th>Cawangan</th>
                    <th>Program</th>
                    <th>Subjek</th>
                </tr>
                <tr>
                    <td><?=$pensyarah?></td>
                    <td><?=$jabatan?></td>
                    <td><?=$kampus?></td>
                    <td><?=$kursus?></td>
                    <td><?=$cawangan?></td>
                    </td>
                    <td><?=$program?></td>
                    <td><?=$subjek?></td>
                </tr>
            </table>
        </div>
    </div>


    <br>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Resource Person</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $trp['total'] ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Subjek
                            </div>
                            <div class="row no-gutters align-items-center">
                                <table>
                                    <tr>
                                        <td>Diploma</td>
                                        <td>:</td>
                                        <td><?= $td['total'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Sarjana Muda</td>
                                        <td>:</td>
                                        <td><?= $tsm['total'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Sarjana</td>
                                        <td>:</td>
                                        <td><?= $ts['total'] ?></td>
                                    </tr>
                                </table>
                                <?php
                                $totalsubjek = $td['total'] + $tsm['total'] + $ts['total'];
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>