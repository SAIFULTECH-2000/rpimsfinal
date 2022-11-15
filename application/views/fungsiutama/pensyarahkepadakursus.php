 <div id="back-kiri">
		<a href="<?=base_url('fungsiutama')?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>

<!-- CONTENT SECTION -->
<section class="small-section">



	<?php
	$array = array(
	    "kembali"=>true
	    );
    $this->session->set_userdata($array);
	$head = NULL;
	$output = NULL;
	$flag = "X";

	echo "<center>

	<table class='search-table'><tr><td>
	<b><center><font size = '5'> <br> <i class='fa fa-folder-open-o' aria-hidden='true'></i>&nbsp SENARAI PENSYARAH MENGIKUT KURSUS</font></b><br><hr><br><br>

	<b>PERHATIAN : </b><br><br>
	Sila masukkan <b>Kod Kursus</b> untuk <br>menjana senarai Pensyarah yang mengajar Kod Kursus yang dicari.<br><br><br>
	
	<form method='POST' class='cari'>
		<input type='TEXT' name='search' />
		<button type='submit' class='button1 button4 button2' name='submit'>CARI</button>
	</form></center><br>";

	if(isset($search))
	{

	
			


				echo "<p align='left'><b><font size = '5'> <i class='fa fa-search' aria-hidden='true'></i> &nbsp SENARAI PENSYARAH BAGI KURSUS <font color='purple'>$search</font></font></b></p>";


				
					echo "<div id='table-wrapper'>
					  		<div id='table-scroll'>	
								<table align='center'>


								<tr>
									<th class='col-xs-2'><center>Bil.</center></th>
									<th class='col-xs-8'><center>No Pekerja</center></th>
									<th class='col-xs-8'><center>Nama Pensyarah</center></th>
									<th class='col-xs-8'><center>Kampus</center></th>
									<th class='col-xs-8'><center>Semester</center></th>
									<th class='col-xs-8'><center>Profil</center></th>
								</tr>";

					$KodKursus = '';
                    $i=0;
					foreach( $result as $rows)
					{
                        $i++;
						$KodKursus = $rows['KodKursus'];
						$NoPekerja = $rows['NoPekerja'];
						$NamaStaf = $rows['NamaStaf'];
						$KodSem = $rows['KodSem'];
						$NamaSem = $rows['NamaSem'];
						$NamaKursus = $rows['NamaKursus'];
						$status = $rows['status'];
						$KodKampus = $rows['KodKampus'];
						$NoPekerja = $rows['NoPekerja'];
						?>

						
									<tr>
								   		<td><center><?=$i?></td>
                                        <td><?=$NoPekerja?></td>
								   		<td><?=$NamaStaf?></td>
								   		<td><center><?=$KodKampus?></td>
								   		<td><center><?=$KodSem?></td>
								   		<td><center> 
										   <form method='post' action="<?=base_url('carian/profile_staf')?>">
                                    <input type='hidden' name='NoPekerja' value='<?=$NoPekerja?>'>
                                    <Button type='submit' name='profile' class='btn btn-warning' style='color:green;'  ><i class='fa fa-user-circle' aria-hidden='true'></i>Profile</Button>
                                    </form>  
										   
										  <center><a href="<?=base_url('urusmaklumat/daftar_perlantikan_rp')?>/<?= $NoPekerja?>/<?=set_value('search')?>" style="color:green;" data-toggle="tooltip" data-placement="bottom" title="Lantik RP"><i class="fa fa-refresh" aria-hidden="true"></i></a></center></td>
								   	</tr>
								   	
				<?php	} 


				

				if($i==0)
				{
					$output = "<tr><td colspan='6'><center>Maaf, tiada rekod dijumpai.</td></tr>";
				}

	}


	?>
	

	
	<center><?php echo $head; ?></center>
	<center><?php echo $output; ?></center>

<?php 

	echo "</td></tr></table>";

?>

</section>
