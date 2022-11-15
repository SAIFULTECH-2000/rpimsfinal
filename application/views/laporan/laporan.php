<div id="back-menu">
    <a href="<?= base_url('auth') ?>"><button class="button"
            style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>
<section>
    <table align="center">

        <tr>
            <td colspan="5">
                <b>
                    <font size="5"> <br> <i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp LAPORAN</font>
                </b>
                <hr>
            </td>
        </tr>
        <tr>




            <!--<td><a href="<?= base_url('laporan/staf_tidak_aktif') ?>"><div class="container"><br><br><b><center><font size = "5"> <i class="fa fa-user-times fa-2x" aria-hidden="true"></i> </font><br><br>LAPORAN STAF <br>TIDAK AKTIF</font></b></div></center><a>-->
            <!--</td>-->

            <!--<td><a href="<?= base_url('laporan/rp_tidak_aktif') ?>"><div class="container"><br><br> <b><font size = "5"> <i class="fa fa-id-badge fa-2x" aria-hidden="true"></i> </font><br><br>LAPORAN RP <br>TIDAK AKTIF</font></b></div></td><a>-->
            <?php if ($this->session->userdata('role_id') == 1) { ?>
            <td><a href="<?= base_url('laporan/system') ?>">
                    <div class="container"><br><br><b>
                            <font size="5"> <i class="fa fa-archive fa-2x" aria-hidden="true"></i> </font>
                            <br><br>LAPORAN SISTEM</font>
                        </b></div>
            </td><a>
                <?php } ?>
                <?php if ($this->session->userdata('role_id') == 1) { ?>
                <td><a href="<?= base_url('laporan/kursus_tanpa_lantikan') ?>">
                        <div class="container"><br><br> <b>
                                <font size="5"> <i class="fa fa-address-card-o fa-2x" aria-hidden="true"></i> </font>
                                <br><br>LAPORAN KURSUS<br />TANPA LANTIKAN</font>
                            </b></div>
                </td><a>
                    <td><a href="<?= base_url('laporan/kursus_perlantikan') ?>">
                            <div class="container"><br><br> <b>
                                    <font size="5"> <i class="fa fa-address-card-o fa-2x" aria-hidden="true"></i>
                                    </font><br><br>LAPORAN KURSUS<br />PERLANTIKAN</font>
                                </b></div>
                    </td><a>

                        <?php } ?>
        </tr>
        <tr>
            <?php if ($this->session->userdata('role_id') == 1) { ?>
            <td><a href="<?= base_url('laporan/semester') ?>">
                    <div class="container"><br><br> <b>
                            <font size="5"> <i class="fa fa-paper-plane fa-2x" aria-hidden="true"></i> </font>
                            <br><br>LAPORAN <br>SEMESTER</font>
                        </b></div>
            </td><a>
                <?php } ?>
                <?php if ($this->session->userdata('role_id') == 2) { ?>
                <td><a href="<?= base_url('laporan/rp_dibawah_pusat_pengajian') ?>">
                        <div class="container"><br><br> <b>
                                <font size="5"> <i class="fa fa-building-o fa-2x" aria-hidden="true"></i> </font>
                                <br><br>RP PUSAT PENGAJIAN</font>
                            </b></div>
                </td><a>
                    <?php } ?>
                    <?php if ($this->session->userdata('role_id') == 1) { ?>
                    <td><a href="<?= base_url('laporan/rp_dibawah_pusat_pengajian_admin') ?>">
                            <div class="container"><br><br> <b>
                                    <font size="5"> <i class="fa fa-building-o fa-2x" aria-hidden="true"></i> </font>
                                    <br><br>LAPORAN RP DIBAWAH<br> PUSAT PENGAJIAN(ADMIN)</font>
                                </b></div>
                    </td><a>
                        <?php } ?>
        </tr>
        <!--<tr>

				<td><a href="carikampus.php"><div class="container"><br><br> <b><font size = "5"> <i class="fa fa-university fa-2x" aria-hidden="true"></i> </font><br><br>KAMPUS</font></b></div></td><a>

				<td><a href="carijabatan.php"><div class="container"><br><br> <b><font size = "5"> <i class="fa fa-building-o fa-2x" aria-hidden="true"></i> </font><br><br>JABATAN</font></b></div></td><a>

				<td><a href="caricawangan.php"><div class="container"><br><br> <b><font size = "5"> <i class="fa fa-map-signs  fa-2x" aria-hidden="true"></i> </font><br><br>CAWANGAN</font></b></div></td><a>


				<td><a href="cariprogram.php"><div class="container"><br><br> <b><font size = "5"> <i class="fa fa-graduation-cap fa-2x" aria-hidden="true"></i> </font><br><br>PROGRAM</font></b></div></td><a>

				<td><a href="carisubjek.php"><div class="container"><br><br> <b><font size = "5"> <i class="fa fa-file-text-o fa-2x" aria-hidden="true"></i> </font><br><br>SUBJEK</font></b></div></td><a>

				</tr>-->


    </table>
</section>