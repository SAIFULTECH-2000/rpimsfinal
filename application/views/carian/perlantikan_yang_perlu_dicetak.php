<link href="<?= base_url('assets/sbadmin/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<div id="back-menu">
	<?php if ($this->session->userdata('role_id') != 4) { ?>
		<a href="<?= base_url('pengesahan') ?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a>
	<?php } ?>
	<?php if ($this->session->userdata('role_id') == 4) { ?>
		<a href="<?= base_url('carian') ?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a>
	<?php } ?>
</div>
<section>

	<br />
	<br />

	<b>
		<font size='5'><i class='fa fa-id-badge' aria-hidden='true'></i>&nbsp;SENARAI PERLANTIKAN YANG TELAH DISAHKAN
		</font>
	</b>
	<br />
	<br />
	<div class="card shadow mb-4">
		<div class="card-header py-3">

		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th class='col-xs-1'>
								<center>Bil.</center>
							</th>
							<th class='col-xs-2'>
								<center>Kursus</center>
							</th>
							<th>
								<center>Nama Staf</center>
							</th>
							<th class='col-xs-5'>
								<center>Tempoh</center>
							</th>
							<th class='col-xs-5'>
								<center>Dicetak Oleh</center>
							</th>
							<th class='col-xs-5'>
								<center>Tarikh Cetakan</center>
							</th>
							<th class='col-xs-4'>
								<center>Tindakan</center>
							</th>
						</tr>
					</thead>

					<tbody>


						<?php

						$counter = 0;
						foreach ($result as $row) {

							$pengesahan = $row['disahkan'];
							if ($row['disahkan'] != "Sah") {
								$pengesahan = "Perlu pengesahan";
							}
							if ($row['dicetakoleh']) {

								$id = $row['dicetakoleh'];
								$user = $this->db->query("select NamaStaf from staf where NoPekerja like '$id'")->row_array();

								$cetakan = $user['NamaStaf'];
							} else {
								$cetakan = "Belum dicetak";
							}
							$counter++;
							echo "
								<tr>
                                <td><center>$counter.</center></td>
								<td><center><b data-toggle='tooltip' data-placement='bottom' title='" . $row["NamaKursus"] . "'><div class='tooltip1'>" . $row["KodKursus"] . "</b></center></td>
								<td>" . $row["NamaStaf"] . "</td>
								<td><center>" . date('d/m/Y', strtotime($row["TarikhMula"])) . "<br> - <br>" . date('d/m/Y', strtotime($row["TarikhTamat"])) . "</td>
                                <td>" . $cetakan . "</td>
                                <td>" . $row['print'] . "</td>
                                <td>
                                    <center>
                                    ";
							// if ($row['disahkan'] == "Sah" && $row['tarikhsurat'] != "" && $this->session->userdata('role_id') == 4)
							//     echo "<a target='_blank' href='" . base_url('surat/generatesuratlantikan/') . "$row[id]' style='color:blue;' data-toggle='tooltip' data-placement='left' title='Surat Lantikan'><i class='fa fa-download' aria-hidden='true'></i></a>";
							if ($row['tarikhsurat'] == "" && $this->session->userdata('role_id') == 4)
								echo  "
                                    <form method='post' action=" . base_url('carian/kemaskini_perlantikan') . ">
                                    <input type='hidden' name='id' value='" . $row['id'] . "'>
                                    <Button type='submit' name='profile' class='btn btn-warning' style='color:green;'  >Tarikh Surat
                                    </Button>
                                    </form>";
							if ($row['SuratPerlantikan'] == null) {
								echo "<a target='_blank' href='" . base_url('surat/view/') . "$row[id]' style='color:blue;' data-toggle='tooltip' data-placement='left' title='Surat Lantikan'>View</a>
                                    ";
							} else {

								$url =	base_url('suratlantikan') . "/" . $row['SuratPerlantikan'];
								echo "<a href='$url' download>Download </a>";
							}
							if ($row['disahkan'] == "Sah" && $row['tarikhsurat'] != "" && $this->session->userdata('role_id') == 4 && $row['SuratPerlantikan'] == null)
								echo "<a href='" . base_url('carian/surat_upload') . "/$row[id]'>Upload</a>";




							echo
							"
                                    </center>
                                </td>
							</tr>";
						}
						if ($counter == 0) {
						?>
							<tr>
								<td colspan='6' style='color:red; font-weight:bold; font-style:italic;'>Maaf, tiada rekod
									dijumpai.</td>
							</tr>
						<?php
						}
						?>

					</tbody>
				</table>
			</div>
		</div>
	</div>



</section>

<script src="<?= base_url('assets/sbadmin/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/sbadmin/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/sbadmin/') ?>js/demo/datatables-demo.js"></script>
<!-- // END CONTENT SECTION -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php if ($this->session->flashdata('kemaskini')) { ?>
	<script>
		swal("tarikh surat berjaya direkod");
	</script>
<?php } ?>
