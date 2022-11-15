<div id="back-menu">
		<a href="<?=base_url('auth')?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>
<!-- CONTENT SECTION -->
<section>
		<table align="center">
		
			<tr>
				<td colspan="5">
					<b><font size = "5"> <br> <i class="fa fa-bookmark-o fa-1x" aria-hidden="true"></i> &nbsp URUS MAKLUMAT</font></b> 
					<hr>
				</td>
			</tr>
			<tr>
				<td><a href="<?=base_url('urusmaklumat/daftar_staf')?>"><div class="container"><br><br><b><center><font size = "5"> <i class="fa fa-user-plus fa-2x" aria-hidden="true"></i> </font><br><br>DAFTAR STAF</font></b></div></center><a>
				</td>

				<td><a href="<?=base_url('urusmaklumat/daftar_kursus')?>"><div class="container"><br><br><b><font size = "5"> <i class="fa fa-book fa-2x" aria-hidden="true"></i> </font><br><br>DAFTAR KURSUS</font></b></div></td><a>
				<?php if( $this->session->userdata('role_id')==2  ){?>
				<td><a href="<?=base_url('urusmaklumat/daftar_perlantikan_rp')?>"><div class="container"><br><br> <b><font size = "5"> <i class="fa fa-id-badge fa-2x" aria-hidden="true"></i> </font><br><br>DAFTAR<br>PERLANTIKAN RP</font></b></div></td><a>
					<?php }?>
				<td><a href="<?=base_url('urusmaklumat/daftar_pengajaran')?>"><div class="container"><br><br> <b><font size = "5"> <i class="fa fa-address-card-o fa-2x" aria-hidden="true"></i> </font><br><br>DAFTAR<br>PENGAJARAN</font></b></div></td><a>

				<td><a href="<?=base_url('urusmaklumat/daftar_semester')?>"><div class="container"><br><br> <b><font size = "5"> <i class="fa fa-paper-plane fa-2x" aria-hidden="true"></i> </font><br><br>DAFTAR<br>SEMESTER</font></b></div></td><a>
	<td><a href="<?=base_url('urusmaklumat/daftar_staf_excel')?>"><div class="container"><br><br><b><center><font size = "5"> <i class="fa fa-user-plus fa-2x" aria-hidden="true"></i> </font><br><br>DAFTAR<br>STAF EXCEL</font></b></div></center><a>
				</td>
				</tr>

			<tr>

				<td><a href="<?=base_url('urusmaklumat/daftar_kampus')?>"><div class="container"><br><br> <b><font size = "5"> <i class="fa fa-university fa-2x" aria-hidden="true"></i> </font><br><br>DAFTAR KAMPUS</font></b></div></td><a>

				<td><a href="<?=base_url('urusmaklumat/daftar_jabatan')?>"><div class="container"><br><br> <b><font size = "5"> <i class="fa fa-building-o fa-2x" aria-hidden="true"></i> </font><br><br>DAFTAR JABATAN</font></b></div></td><a>

				<td><a href="<?=base_url('urusmaklumat/daftar_cawangan')?>"><div class="container"><br><br> <b><font size = "5"> <i class="fa fa-map-signs fa-2x" aria-hidden="true"></i> </font><br><br>DAFTAR CAWANGAN</font></b></div></td><a>

				<td><a href="<?=base_url('urusmaklumat/daftar_program')?>"><div class="container"><br><br> <b><font size = "5"> <i class="fa fa-graduation-cap fa-2x" aria-hidden="true"></i> </font><br><br>DAFTAR PROGRAM</font></b></div></td><a>

				<td><a href="<?=base_url('urusmaklumat/daftar_subjek')?>"><div class="container"><br><br> <b><font size = "5"> <i class="fa fa-file-text-o fa-2x" aria-hidden="true"></i> </font><br><br>DAFTAR SUBJEK</font></b></div></td><a>

				</tr>

			
		</table>
</section>