 <div id="back-kiri">
		<a href="<?=base_url('fungsiutama')?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>

<section class="small-section">
	<?php

	$output = NULL;
	$head = NULL;
    $input = "";
  
	echo "<center>

	<table class='search-table'><tr><td>
	<b><center><font size = '5'> <br> <i class='fa fa-history' aria-hidden='true'></i>&nbsp SEJARAH KURSUS BAGI RESOURCE PERSON</font></b><br><hr><br>

	<b>PERHATIAN : </b><br><br>
	Sila masukkan <b>No Pekerja</b> untuk <br>menjana senarai Kursus bagi RP yang dicari.<br><br><br>
	

	<form method='POST' class='cari'>
		<input type='TEXT' name='search' value='$input'/>
		<button type='submit' class='button1 button4 button2' name='submit'>CARI</button>
	</form></center><br>";



	if(isset($search))
	{

		echo "<p><b><font size = '5'> <i class='fa fa-search' aria-hidden='true'></i> &nbsp HASIL CARIAN</font></b></p>";


			



				

					echo "<div id='table-wrapper'>
					  		<div id='table-scroll'>	
								<table align='center'>

									<th class='col-xs-2'><center>Bil.</center></th>
									<th class='col-xs-8'><center>Kod Kursus</center></th>
									<th class='col-xs-8'><center>Nama Kursus</center></th>
									<th class='col-xs-8'><center>Tempoh</center></th>
									<th class='col-xs-8'><center>Surat</center></th>
									<th class='col-xs-8'><center>Status</center></th></tr>";
                    $i=0;
					foreach( $result as $row)
					{
                        $i++;
                        $id = $row['id'];
						$NoPekerja = $row['NoPekerja'];
						$KodKursus = $row['KodKursus'];
						$NamaKursus = $row['NamaKursus'];
						$NamaStaf = $row['NamaStaf'];
						$TarikhMula = date('d/m/Y', strtotime($row['TarikhMula']));
						$TarikhTamat = date('d/m/Y', strtotime($row['TarikhTamat']));
						$status = "tidak aktif";
                        if($row['status'] == "active")
                            $status = "aktif";

						$head = "<p align='left'><b>No Pekerja</b> <span style='padding-left:3.8em'>&nbsp;&nbsp;: &nbsp;&nbsp;$search</span>
							    <br><b>Nama Pensyarah</b><span style='padding-left:2em'>: &nbsp;&nbsp;$NamaStaf</span></p><hr></span><br>";

						$output .= "<tr> 
								   		<td><center>$i.</td>
								   		<td><center>$KodKursus</td>
								   		<td>$NamaKursus</td>
								   		<td><center>$TarikhMula <br><b>-</b><br> $TarikhTamat</td>
								   		<td><center> <a target='_blank' href='".base_url('surat/view/').$id."'>Papar</a> </td>
								   		<td><center>$status</td>
								   	</tr>";
								   }


				

				if($i==0)
				{
					$output = "<tr><td colspan='6' bgcolor='#F1C40F'><center>Sila masukkan kod yang betul.</td></tr>";
				}

	}


	?>
	

	<?php echo $head; ?>
	<center><?php echo $output; ?></center>

<?php 

	echo "</td></tr></table>";

?>


		

</section>