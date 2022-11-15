<link href="<?= base_url('assets/sbadmin/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<section>
    <table align="center">
        <tr>
            <td colspan="5">
                <b>
                    <font size="5"> <br> <i class="fa fa-home" aria-hidden="true"></i>&nbsp LAMAN UTAMA</font>
                </b>
                <hr><br>
            </td>
        </tr>
        <?php

        $i = 1;
        foreach ($result as $row) :
            if ($i == 1)
                echo "<tr>";
        ?>
        <td>
            <a href="<?= base_url() ?>/<?= $row['url'] ?>">
                <div class="container"><br><br><b>
                        <center>
                            <font size="5"> <i class="<?= $row['icon'] ?>" aria-hidden="true"></i> </font>
                            <br><br><?= $row['title'] ?></font>
                    </b></div>
                </center>
            </a>
        </td>

        <?php
            $i++;

            if ($i == 1)
                echo "</tr>";
            if ($i == 4)
                $i = 1;
        endforeach; ?>



        <tr>
            <td><br></td>
        </tr>
        <tr>
            <td colspan="5">
                <?php
                $output = NULL;
                echo "<center>";
                $no = 1;
                $year="01-01-".date("Y");
                $result = $this->db->query("(SELECT NoPekerja, KodKursus, TarikhMula, TarikhTamat, NamaStaf, SuratPerlantikan FROM notifikasi 
                                        WHERE lantik = 'belum')
                                        union
                                        (Select perlantikantamat.NoPekerja, perlantikantamat.KodKursus, perlantikantamat.TarikhMula, perlantikantamat.TarikhTamat, staf.NamaStaf, perlantikantamat.SuratPerlantikan from perlantikantamat
                                        left join staf on staf.NoPekerja = perlantikantamat.NoPekerja
                                        where perlantikantamat.KodKursus not in (select KodKursus from perlantikan)) 
                                        order by TarikhTamat")->result_array();

                //$rows = $result->fetch_assoc();
                //$TarikhTamat = $rows['TarikhTamat'];
                if ($role == 1 || $role == 2) :
                ?>
                <!-- <audio  autoplay='autoplay' hidden='hidden' controls='controls'>
                        <source src='sound/sound.mp3' type='audio/mpeg'>
                    </audio> -->

                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            <b>
                                <font color='#512E5F' size='3' color=''><i class='fa fa-bell-o' aria-hidden='true'></i>
                                </font>
                            </b>
                            </span>&nbsp;
                            <font color='#512E5F' size='3'><b>SILA AMBIL TINDAKAN SEGERA BAGI <font color='black'>RP
                                    </font> BERIKUT</b></font>&nbsp;
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>BIL</th>
                                        <th>NAMA PENSYARAH</th>
                                        <th>KOD KURSUS</th>
                                        <th>TAMAT PADA</th>

                                    </tr>
                                </thead>

                                <tbody>

                                    <?php
                                        foreach ($result as $row) {
                                            $classtd1st = "";
                                            $classtdlast = "";
                                            $classtrlast = "";
                                            $NamaStaf = $row['NamaStaf'];
                                            $TarikhTamat = date('d/m/Y', strtotime($row['TarikhTamat']));
                                            $KodKursus = $row['KodKursus'];
                                            $SuratPerlantikan = $row['SuratPerlantikan'];
                                            // if($no == $result->num_rows)
                                            // {
                                            //     $classtd1st = "class='lasttd1st'";
                                            //     $classtdlast = "class='lasttdlast'";
                                            //     $classtrlast = "class='trlast'";
                                            // }
                                        ?>
                                    <tr <?php echo $classtrlast; ?>>
                                        <td <?php echo $classtd1st; ?> align="right"><b>
                                                <font size='2'><?php echo $no; ?>.</font>
                                            </b></td>
                                        <td align="left">
                                            <font size='2'>&nbsp; <?php echo $NamaStaf; ?></font>
                                        </td>
                                        <td width='200'>
                                            <font size='2'><?php echo $KodKursus; ?></font>
                                        </td>
                                        <td width='100' <?php echo $classtdlast; ?>>
                                            <font size='2'><?php echo $TarikhTamat; ?></font>
                                        </td>

                                    </tr>
                                    <?php
                                            $no = $no + 1;
                                        } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <?php
                endif;
                ?>
</section>
<script src="<?= base_url('assets/sbadmin/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/sbadmin/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/sbadmin/') ?>js/demo/datatables-demo.js"></script>
<!-- // END CONTENT SECTION -->