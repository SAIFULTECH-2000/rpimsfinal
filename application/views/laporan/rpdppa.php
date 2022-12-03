<link href="<?= base_url('assets/sbadmin/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<div id="back-">
    <a href="<?= base_url('laporan') ?>"><button class="button"
            style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a>
</div>

<section>

    <?php
	$searchxx = "";
	$results = $this->db->query("SELECT KodJab, NamaJabBhg from jabatan WHERE status='active' ORDER BY NamaJabBhg ASC")->result_array();
	?>
    <center>
        <form method='POST' class="cari">
            <div class="row col-lg-11">
                <h1>Sila Pilih Bidang</h1>
                <div class="col col-lg-2">
                </div>
                <div class="input-group col col-lg-6" style="padding:0;">
                    <select width="100%" id="kursus" name="kursus" class="form-control"
                        style="border:0; background-color:#e9ecef;">
                        <?php foreach ($results as $jab) { ?>
                        <option value="<?= $jab['KodJab'] ?>"
                            <?php if($namajabatan['KodJab']==$jab['KodJab'])echo "selected";?>><?= $jab['NamaJabBhg'] ?>
                        </option>
                        <?php } ?>

                    </select>
                </div>
                <div class="col col-lg-1">
                    <button type='submit' class='button1 button4 button2' name='submit'>CARI</button>
                </div>

            </div>
        </form>
        <!-- <form method='POST' class="cari">
            <div class="row col-lg-11">
                <div class="col col-lg-2">
                </div>
                <div class="input-group col col-lg-6" style="padding:0;">
                    <input type="text" class="form-control" placeholder="ISIKAN CARIAN" name="search" id="search"
                        value="<?= set_value('search') ?>" style="text-transform:uppercase;">
                    <span class="input-group-addon" style="padding:0;">
                        <select width="100%" id="carian" name="carian" class="form-control"
                            style="border:0; background-color:#e9ecef;">
                            <option value="kursus" <?php if ($carian == "kursus") {
														echo "selected";
													} ?>>KURSUS</option>
                            <option value="jabatan" <?php if ($carian == "jabatan") {
														echo "selected";
													} ?>>BIDANG</option>
                        </select>
                    </span>
                </div>
                <div class="col col-lg-1">
                    <button type='submit' class='button1 button4 button2' name='submit'>CARI</button>
                </div>
                <div class="col col-lg-2">
                </div>
            </div>
        </form> -->
    </center>
    <br>
    <br>
    <?php
	if (!empty($search)) {

	?>
    <b>
        <font size='5'><i class='fa fa-book' aria-hidden='true'></i>&nbsp;SENARAI LAPORAN RP</font>
    </b>
    <br />
    <br />
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class='col-xs-1'>
                                <center>BIL.</center>
                            </th>
                            <th class='col-xs-2'>
                                <center>KOD KURSUS</center>
                            </th>
                            <th class='col-xs-8'>
                                <center>NAMA KURSUS</center>
                            </th>
                            <th class='col-xs-8'>
                                <center>NAMA</center>
                            </th>
                            <th class='col-xs-8'>
                                <center>NO PEKERJA</center>
                            </th>
                            <th class='col-xs-8'>
                                <center>KAMPUS</center>
                            </th>
                            <th class='col-xs-8'>
                                <center>BIDANG</center>
                            </th>
                            <th class='col-xs-8'>
                                <center>Tempoh</center>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
							if ($result != "") {
								echo "<br><p><b><font size = '5'>  &nbsp Laporan RP dibawah bidang ".$namajabatan['NamaJabBhg']."</font></b></p>";
								$no = 1;
								foreach ($result as $row) {
									echo "
                            <tr>
								<td><center>" . $no . ".</center></td>
								<td><center>" . $row["KodKursus"] . "</center></td>
                                <td><center>" . $row["NamaKursus"] . "</center></td>
								<td>" . $row["NamaStaf"] . "</td>
                                <td><center>" . $row["NoPekerja"] . "</center></td>
                                <td><center>" . $row["NamaKampus"] . "</center></td>
                                <td><center>" . $row["NamaJabBhg"] . "</center></td>
								<td>" . date('d/m/Y', strtotime($row["TarikhMula"])) . "<br> - <br>" . date('d/m/Y', strtotime($row["TarikhTamat"])) . "</td>
							</tr>";
									$no++;
								}
							} else {
								echo "<td colspan='8'>Tiada</td>";
							}

							?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
	}
	?>


</section>
<script src="<?= base_url('assets/sbadmin/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/sbadmin/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/sbadmin/') ?>js/demo/datatables-demo.js"></script>
<!-- // END CONTENT SECTION -->