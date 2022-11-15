<script type='text/javascript'>
	function confirmDelete() {
		return confirm("Teruskan untuk hapus perlantikan?");
	}
</script>

<body>

	<section>
		<?php if ($this->uri->segment('3')) { ?>
			<div id="back">
				<a href="<?= base_url('laporan/kursus_perlantikan') ?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
			</div>
		<?php } else { ?>
			<div id="back">
				<a href="<?= base_url('carian/perlantikan_yg_perlu_pengesahan') ?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
			</div>
		<?php } ?>
		<form method="post" action="">

			<h2><i class="fa fa-building-o" aria-hidden="true"></i>&nbsp;&nbsp;<b>Pembatalan</b> Perlantikan</h2>
			<hr>



			<?php
			if (isset($msg)) {
				echo $msg;
			}
			?>

			<br>
			<table>
				<tr>
					<td colspan="2">
						<b>Kursus :<?= $row['KodKursus'] ?>(<?= $row['NamaKursus'] ?>)</b>
						<br>

						<br>
						</div><br><br>
					</td>
					<td>

					</td>
				</tr>
				<tr>
					<td colspan="2">

						<b>Pensyarah :<?= $row['NamaStaf'] ?></b>
						<br>
						<input type="hidden" name="NamaStaf" value="<?= $row['NamaStaf'] ?>" />
						<input type="hidden" name="id" value="<?= $row['id'] ?>" />

						<br><br>
					</td>

				</tr>
				<tr>
					<td>
						<b>Tarikh Mula :<?= $row['TarikhMula'] ?></b>
						<br>
						<!-- <input type="date" class="form-control" placeholder="Tarikh Mula" name="TarikhMula" required  /> -->
						<br><br>
					</td>
					<td>
						<b>Tarikh Tamat :<?= $row['TarikhTamat'] ?></b>
						<br>
						<!-- <input type="date" class="form-control" placeholder="" name="TarikhTamat" va required  /> -->
						<br><br>
					</td>
					<td></td>
				</tr>
			</table>

			<span class="tooltiptext">Tekan Batal untuk batalkan perlantikan atau Kembali<br> untuk kembali kepada skrin sebelum ini.</span>
			</div><br><br>

			<button type="submit" class="button1 button4 button2" name="submit" value="Update" onclick="return confirmDelete()">Batal</button>



		</form>


	</section>
