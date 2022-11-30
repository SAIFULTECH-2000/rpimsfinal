<section>


    <table>
        <div id="back">
            <a href="<?= base_url('user') ?>"><button class="button"
                    style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
        </div>
        <h2><i class="fa fa-id-card-o" aria-hidden="true"></i>&nbsp;&nbsp;Papar Profil</h2>

        <hr>



        <?php
        if (isset($msg)) {
            echo $msg;
        }
        ?>

        <br>



        <tr>
            <td><b>No Pekerja </b></td>
            <td>:</td>
            <td><?= $query2["NoPekerja"]; ?></td>
        </tr>


        <tr>
            <td><b>Nama Staf </b></td>
            <td>:</td>
            <td> <?=  strtoupper($query2['NamaStaf']); ?></td>
        </tr>

        <tr>
            <td>
                <b>No Kad Pengenalan </b>

            </td>
            <td>:</td>
            <td>
                <?= $query2['NoICStaf']; ?>
            </td>
        </tr>

        <tr>
            <td>
                <b>BIDANG </b>

            </td>
            <td>:</td>
            <td>
                <?= $query2['KodJab']; ?>
            </td>
        </tr>

        <tr>

            <td>
                <b>Kampus </b>

            </td>
            <td>:</td>
            <td>
                <?= $query2['KodKampus']; ?>
            </td>
        </tr>

        <tr>





            <td>
                <b>Jantina </b>

            </td>
            <td>:</td>
            <td>
                <?= $query2['Jantina']; ?>
            </td>
        </tr>



        <tr>
            <td>
                <b>Emel </b>

            </td>
            <td>:</td>
            <td>
                <?= $query2['Emel']; ?>
            </td>
        </tr>
        <tr>
            <td>
                <b>Telefon Bilik </b>

            </td>
            <td>:</td>
            <td>
                <?php echo $query2['TelBilik']; ?>
            </td>

        </tr>
        <tr>


            <td>
                <b>Telefon Mobil </b>

            </td>
            <td>:</td>
            <td>
                <?php echo $query2['TelMobil']; ?>
            </td>
        </tr>

        <tr>
            <?php if ($this->session->userdata('role_id') != 4 && $this->session->userdata('role_id') != 1) { ?>
            <td>
                <b>Gred Jawatan </b>
                <br>

            </td>
            <td>:</td>
            <td>
                <?php echo $query2['GredJawatan']; ?>
            </td>
            <?php } ?>
        </tr>

        <tr>
            <td>
                <b>Tarikh Mula Khidmat </b>
                <br>

            </td>
            <td>:</td>
            <td>
                <?php echo $query2['TarikhMulaKhidmat']; ?>
            </td>
        </tr>
        <tr>






            <td>
                <b>Tarikh Pencen </b>

            </td>
            <td>:</td>
            <td>
                <?php echo $query2['TarikhPencen']; ?>
            </td>
        </tr>



        <tr>
            <td>
                <b>Jenis Lantikan </b>
                <br>

            </td>
            <td>:</td>

            <td>
                <?php echo $query2['JenisLantikan']; ?>
            </td>

        </tr>
        </tr>


        <tr>
            <td>
                <b>No Bilik Pejabat </b>
                <br>

            </td>
            <td>:</td>

            <td>
                <?php echo $query2['bilik_pejabat']; ?>
            </td>

        </tr>
    </table>


    <div id='table-scroll'>
        <h4>Pengajaran</h4>
        <table align='center' style="width:100%;" class="table table-bordered">
            <tr>
                <th class='col-xs-1'>
                    <center>Bil.</center>
                </th>
                <th class='col-xs-1'>
                    <center>Nama Kursus</center>
                </th>
                <th colspan='2'>Semester</th>

            </tr>
            <?php
            $no = 0;
            $rp = false;
            $rp_next = false;

            foreach ($pengajaran as $row) {
                $NamaKursus = $row['kursus'];
                $KodSem = $row['KodSem'];
                $no = $no + 1;
            ?>
            <tr>
                <td> <?= $no++; ?></td>
                <td> <?= $NamaKursus; ?></td>
                <td> <?= $KodSem; ?> </td>

            </tr>

            <?php

            }
            ?>
            <?php
            if ($no == 0) {
            ?>
            <tr>
                <td colspan='5' style='color:red; font-weight:bold; font-style:italic;'>
                    <center>Tiada maklumat pengajaran</center>
                </td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
    </div>

</section>