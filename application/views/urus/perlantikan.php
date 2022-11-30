<section class="form-section">
    <br>
    <?php if ($this->uri->segment('3')) { ?>
    <div id="back-borang">
        <a href="<?= base_url('fungsiutama/cadangan_rp') ?>">
            <button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button>
        </a>

    </div>
    <?php } else { ?>
    <div id="back-borang">
        <a href="<?= $_SERVER['HTTP_REFERER']
 ?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
    </div>
    <?php } ?>

    <form method="post" enctype="multipart/form-data" class="borang"
        action="<?= base_url('urusmaklumat/daftar_perlantikan_rp') ?>" onsubmit="return show_alert();">
        <h4><b><i class="fa fa-university " aria-hidden="true"></i>&nbsp;&nbsp;Daftar Perlantikan</b></h4>
        <hr>
        <?php

		if (isset($msg)) {
			echo $msg;
		}

		?>

        <table class="form-table">
            <tr>
                <td colspan="2">
                    <b>Kursus :</b>
                    <br>
                    <?php

					$NoPekerja = $this->session->userdata('username');
					$result = $this->db->query("SELECT KodJab FROM staf where NoPekerja like '$NoPekerja'")->row_array();
                    

					$KodJab = $result['KodJab'];
					$result = $this->db->query("SELECT KodKursus, NamaKursus,KodJab from kursus WHERE  kodJab like '$KodJab' ORDER BY KodKursus ASC")->result_array();
					$kursus = $this->uri->segment('4');

					echo "<select style='width:450px;' name='KodKursus' value='KodKursus' required>";
					echo '<option value="" disabled selected hidden>Sila Pilih</option>';
					foreach ($result as $row) {
					?>
                    <option value="<?php echo $row['KodKursus']; ?> "
                        <?php if ($kursus == $row['KodKursus']) echo 'selected'; ?>>
                        <?php echo $row['KodKursus'] . ' - ' . $row['NamaKursus']; ?></option>
                    <?php
					}
					echo "</select>";
					?>
                    <br>
                    </div><br><br>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <b>Pensyarah :</b>
                    <br>
                    <?php

					$id = $this->uri->segment('3');

					$result = $this->db->query("SELECT  NoPekerja, NamaStaf from staf WHERE status='active' and kodJab like '$KodJab' ORDER BY NamaStaf ASC")->result_array();
					?>
                    <select style="width:450px;" name='NoPekerja' value='NoPekerja' data-toggle='tooltip'
                        data-placement='left'
                        title='Sila daftarkan Pensyarah terlebih dahulu sekiranya tidak dipaparkan di dalam senarai Pensyarah.'
                        required>
                        <option value="" disabled selected hidden>Sila Pilih</option>
                        <?php

						foreach ($result as $row) {
						?>
                        <option value="<?php echo $row['NoPekerja'];?>"
                            <?php if ($id == $row['NoPekerja']) echo 'selected'; ?>>
                            <?php echo $row['NamaStaf']; ?>&nbsp;<b>(<?php echo $row['NoPekerja']; ?>)<b></option>
                        <?php
						}
						?>
                    </select>
                    <br><br>
                </td>
                <?php
				//   $role_id=  $this->session->userdata('role_id');
				//   if($role_id==1)
				//   //echo '  <td>
				//   <b>Pengesahan :</b>
				//   <br>
				//   <select name="disahkan" value="disahkan" required>
				//      <option value="" disabled selected hidden>&nbsp;--</option>
				//      <option value="Sah">Sah</option>
				//      <option value="Belum disahkan">Belum disahkan</option>
				//   </select>
				//   </td>';
				?>
                <input type="hidden" name="disahkan" value="Belum disahkan" />

                <!-- <div class="form-group">
                    <label for="exampleInputEmail1">Gelaran</label>
                    <input type="text" class="form-control" id="nama" aria-describedby="nama" name="gelaran"
                        placeholder="Enter Gelaran">

                </div> -->
                <div class="form-group">
                    <label><b>Gelaran</b></label></br>
                    <select name="gelaran" required>
                        <option value="" disabled selected hidden>&nbsp;--</option>
                        <option value="Professor">Professor</option>
                        <option value="Professor Madya">Professor Madya</option>
                        <option value="Dr">Dr</option>
                        <option value="Tuan">Tuan</option>
                        <option value="Puan">Puan</option>
                    </select>
                </div>
            </tr>
            <tr>
                <td>
                    <b>Tarikh Mula :</b>
                    <br>
                    <input type="date" class="form-control" placeholder="Tarikh Mula" name="TarikhMula" required />
                    <br><br>
                </td>
                <td>
                    <b>Tarikh Tamat :</b>
                    <br>
                    <input type="date" class="form-control" placeholder="" name="TarikhTamat" required />
                    <br><br>
                </td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">
                    <button type="submit" class="button-ungu button4" name="btn-signup">Daftar Perlantikan</button>
                </td>
            </tr>
        </table>
    </form>
</section>
<script>
function show_alert() {
    let proceed = confirm("Adakah anda pasti penambahan penama sebagai RP");
    if (proceed) {

        return true;
    } else {

        return false;
    }
}
</script>
<script type="text/javascript">
<?php if ($this->session->flashdata('success')) { ?>
Swal.fire("<?php echo $this->session->flashdata('success'); ?>").then(function() {
    window.location = "<?= base_url('fungsiutama') ?>";
});
<?php } ?>
<?php if ($this->session->flashdata('fails')) { ?>
Swal.fire("<?php echo $this->session->flashdata('fails'); ?>").then(function() {
    window.location = "<?= base_url('urusmaklumat/daftar_perlantikan_rp/') ?>";
});
<?php } ?>
</script>