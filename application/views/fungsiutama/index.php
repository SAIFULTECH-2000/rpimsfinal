<div id="back-menu">
		<a href="<?=base_url('auth')?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>
<br>
<section>
		<table align="center">
		
			<tr>
				<td colspan="5">
					<b><font size = "5"> <br> <i class="fa fa-diamond" aria-hidden="true"></i>&nbsp FUNGSI UTAMA</font></b> 
					<hr>
			</tr>

			<tr>
			    	<?php //if( $this->session->userdata('role_id')!=2 || $this->session->userdata('role_id')==1 )?>
                <td><a href="<?=base_url('fungsiutama/cadangan_rp')?>" class="menu-button"><div class="container"><br><br><b><font size = "5"> <i class="fa fa-address-card-o fa-2x" aria-hidden="true"></i> </font><br><br>CADANGAN <br>RP<br></font></b></div><a>
                </td>
               

                <td><a href="<?=base_url('fungsiutama/sejarah_rp_bagi_kursus')?>" class="menu-button"><div class="container"><br><br><b><font size = "5"> <i class="fa fa-user-o fa-2x" aria-hidden="true"></i> </font><br><br>SEJARAH RP<br>BAGI KURSUS<br></font></b></div></td><a>

                <td><a href="<?=base_url('fungsiutama/sejarah_kursus_bagi_rp')?>" class="menu-button"><div class="container"><br><br> <b><font size = "5"> <i class="fa fa-clone fa-2x" aria-hidden="true"></i> </font><br><br>SEJARAH KURSUS <br>BAGI RP</font></b></div></td><a>

                <td><a href="<?=base_url('fungsiutama/pensyarah_kepada_kursus')?>" class="menu-button"><div class="container"><br><br> <b><font size = "5"> <i class="fa fa fa-id-card-o fa-2x" aria-hidden="true"></i> </font><br><br>PENSYARAH KEPADA KURSUS</font></b></div></td><a>

                <td><a href="<?=base_url('fungsiutama/kursus_kepada_pensyarah')?>" class="menu-button"><div class="container"><br><br> <b><font size = "5"> <i class="fa fa-file-text-o fa-2x" aria-hidden="true"></i> </font><br><br>KURSUS KEPADA PENSYARAH</font></b></div></td><a>

            </tr>

			
		</table>

		

</section>
<script type="text/javascript">
<?php if($this->session->flashdata('success')){ ?>
Swal.fire("<?php echo $this->session->flashdata('success'); ?>")
<?php } ?>
</script>