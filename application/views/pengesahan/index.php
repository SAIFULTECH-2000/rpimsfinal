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
			
			
	            	<?php if( $this->session->userdata('role_id')==2 || $this->session->userdata('role_id')==1 ){?>
				<td><a href="<?=base_url('carian/perlantikan_yg_perlu_pengesahan')?>"><div class="container"><br><br> <i class="fa fa-id-badge fa-2x" aria-hidden="true"></i> <br><br>PERLANTIKAN RP<br> YANG PERLU PENGESAHAN</b></div></td><a>
				    <?php }?>
		
		<td><a href="<?=base_url('carian/perlantikan_yang_perlu_dicetak')?>"><div class="container"><br><i class="fa fa-id-badge fa-2x" aria-hidden="true"></i><br><br>SENARAI PERLANTIKAN<br> YANG TELAH DISAHKAN</b></div></td><a>
				</tr>

	
			
		</table>
</section>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php if($this->session->flashdata('kemaskini')) {?>
<script>
    
    swal("Pengesahan Berjaya");
   
    
    </script>
<?php }?>