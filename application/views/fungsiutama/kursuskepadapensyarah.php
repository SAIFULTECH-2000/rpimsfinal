 <div id="back-kiri">
		<a href="<?=base_url('fungsiutama')?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>
<section class="small-section">
	<?php

	$out = NULL;
	$output = NULL;
	$flag = "X";

	echo "<center>

	<table class='search-table'><tr><td>
	<b><center><font size = '5'> <br> <i class='fa fa-folder-open-o' aria-hidden='true'></i>&nbsp SENARAI KURSUS MENGIKUT PENSYARAH</font></b><br><hr><br>

	<b>PERHATIAN : </b><br><br>
	Sila masukkan <b>No Pekerja Pensyarah</b> untuk <br>menjana senarai kursus yang diajar oleh pensyarah yang dicari.<br><br><br>
	
	<form method='POST' class='cari'>
		<input type='TEXT' name='search' />
		<button type='submit' class='button1 button4 button2' name='submit'>CARI</button>
	</form></center><br>";

	if(isset($search))
	{

		echo "<p><b><font size = '5'> <i class='fa fa-search' aria-hidden='true'></i> &nbsp HASIL CARIAN</font></b></p>";

	





				
					echo "<div id='table-wrapper'>
					  		<div id='table-scroll'>	
								<table align='center'>


								<tr>
                                    <th class='col-xs-2'><center>Bil.</center></th>
									<th class='col-xs-8'><center>Kod Kursus</center></th>
									<th class='col-xs-8'><center>Nama Kursus</center></th>
									<th class='col-xs-8'><center>Semester</center></th>
								</tr>";

					$KodKursus = '';
                    $i=0;
					foreach($result as $rows)
					{
                        $i++;
						$KodKursus = $rows['KodKursus'];
						$NoPekerja = $rows['NoPekerja'];
						$NamaStaf = $rows['NamaStaf'];
						$KodSem = $rows['KodSem'];
						$NamaSem = $rows['NamaSem'];
						$NamaKursus = $rows['NamaKursus'];
						$status = $rows['status'];

					/*$r = $mysqli->query("SELECT L.KodKursus, L.NoPekerja, J.KodKursus, J.NoPekerja
									     FROM PERLANTIKAN L, PENGAJARAN J 
									     WHERE (J.NoPekerja LIKE '$search' AND ((L.KodKursus = J.KodKursus) AND (L.NoPekerja = J.NoPekerja)))");


					if($r->num_rows > 0)
					{
						$flag = "<center>/";
					}*/

									
						$out = "<p align='left'><b>No Pekerja</b> <span style='padding-left:3.8em'>&nbsp;&nbsp;: &nbsp;&nbsp;$NoPekerja</span>
							    <br><b>Nama Pensyarah</b><span style='padding-left:2em'>: &nbsp;&nbsp;$NamaStaf</span></p><hr></span><br>";

						$output .= "
									<tr>
								   		<td><center>$i.</center></td>
								   		<td>$KodKursus</td>
								   		<td>$NamaKursus</td>
								   		<td>$NamaSem</td>
								   	</tr>";
								   	
					}


				

				if($i==0)
				{
					$output = "<tr><td colspan='4'><center>Maaf, tiada rekod dijumpai.</td></tr>";
				}

	}


	?>
	

	
	<center><?php echo $out; ?></center>
	<center><?php echo $output; ?></center>

<?php 

	echo "</td></tr></table>";

?>

</section>