<div id="back-menu">
		<a href="<?=base_url('auth')?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>

<section>
		<table align="center">
		
			<tr>
				<td colspan="5">
					<b><font size = "5"> <br> <i class="fa fa-search" aria-hidden="true"></i>&nbsp PAPAR & CARI MAKLUMAT</font></b>
					<hr>
				</td>
			</tr>
			<tr>
				<td><a href="<?=base_url('carian/staf')?>"><div class="container"><br><br><b><center><font size = "5"> <i class="fa fa-address-book fa-2x" aria-hidden="true"></i> </font><br><br>STAF</font></b></div></center><a>
				</td>

				<td><a href="<?=base_url('carian/kursus')?>"><div class="container"><br><br><b><font size = "5"> <i class="fa fa-book fa-2x" aria-hidden="true"></i> </font><br><br>KURSUS</font></b></div></td><a>

				<td><a href="<?=base_url('carian/subjek')?>"><div class="container"><br><br> <b><font size = "5"> <i class="fa fa-file-text-o fa-2x" aria-hidden="true"></i> </font><br><br>SUBJEK</font></b></div></td><a>
	            <td><a href="<?=base_url('carian/pengajaran')?>"><div class="container"><br><br> <b><font size = "5"> <i class="fa fa-address-card-o fa-2x" aria-hidden="true"></i> </font><br><br>PENGAJARAN</font></b></div></td><a>
				</tr>

			<tr>

				<td><a href="<?=base_url('carian/kampus')?>"><div class="container"><br><br> <b><font size = "5"> <i class="fa fa-university fa-2x" aria-hidden="true"></i> </font><br><br>KAMPUS</font></b></div></td><a>

				<td><a href="<?=base_url('carian/jabatan')?>"><div class="container"><br><br> <b><font size = "5"> <i class="fa fa-building-o fa-2x" aria-hidden="true"></i> </font><br><br>JABATAN</font></b></div></td><a>

				<td><a href="<?=base_url('carian/cawangan')?>"><div class="container"><br><br> <b><font size = "5"> <i class="fa fa-map-signs  fa-2x" aria-hidden="true"></i> </font><br><br>CAWANGAN</font></b></div></td><a>


				<td><a href="<?=base_url('carian/program')?>"><div class="container"><br><br> <b><font size = "5"> <i class="fa fa-graduation-cap fa-2x" aria-hidden="true"></i> </font><br><br>PROGRAM</font></b></div></td><a>

				
			</tr>
			<tr>
			

<td><a href="<?=base_url('carian/semester')?>"><div class="container"><br><br> <b><font size = "5"> <i class="fa fa-paper-plane fa-2x" aria-hidden="true"></i> </font><br><br>SEMESTER</font></b></div></td><a>
<?php if( $this->session->userdata('role_id')==4){?>
				<td><a href="<?=base_url('carian/perlantikan_yang_perlu_dicetak')?>"><div class="container"><br><i class="fa fa-id-badge fa-2x" aria-hidden="true"></i><br><br>SENARAI PERLANTIKAN<br> YANG TELAH DISAHKAN</b></div></td><a>
				<?php }?>				
</tr>
			
		</table>
</section>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php if($this->session->flashdata('kemaskini')) {?>
<script>
    
    swal("Pengesahan Berjaya");
   
    
    </script>
<?php }?>