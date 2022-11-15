<div id="back-menu">
		<a href="<?=base_url('notifikasi')?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>


<!-- CONTENT SECTION -->
<section class="small-section">
	<?php

	$output = NULL;

	echo "<center>

	<table class='search-table'><tr><td>
	<b><center><font size = '5'> <br> <i class='fa fa-bell-o' aria-hidden='true'></i>&nbsp NOTIFIKASI &nbsp;<font color='red' size='5'><span class='blink'><i class='fa fa-exclamation-circle' aria-hidden='true'></i></font></span></font></b><br><hr><br>
	Sila lantik RP seterusnya bagi kursus-kursus berikut : <br><br>



	";


	



				
					echo "<div id='table-wrapper'>
					  		<div id='table-scroll'>	
								<table align='center'>
                                    <th class='col-xs-2'><center>Bil</center></th>
									<th class='col-xs-8'><center>Nama Staf</center></th>
									<th class='col-xs-8'><center>Kursus</center></th>
									<th class='col-xs-8'><center>Tamat pada</center></th>
									<th class='col-xs-8'><center>Lantikan Seterusnya</center></th></tr>";

					$i=0;
                    foreach( $result as $row )
					{
                        $i++;
						$NamaStaf = $row['NamaStaf'];
						$TarikhMula = date('d/m/Y', strtotime($row['TarikhMula']));
						$TarikhTamat = date('d/m/Y', strtotime($row['TarikhTamat']));
						$KodKursus = $row['KodKursus'];
						$id = $row['id'];
						


						$output .= "<tr> 
								   		<td><center>$i.</td>
                                        <td>$NamaStaf</td>
								   		<td>$KodKursus</td>
								   		<td><center>$TarikhTamat</td>
								   		<td><center> <a href='daftarperlantikan_cont.php?KodKursus=$row[KodKursus]&id=$row[id]'><b><font color='red'>BELUM</font></b></a> </td>
								   	</tr>";
								   }


				

				if($i==0)
				{
					$output = "<tr><td colspan='4'><center>Tiada RP berdaftar yang akan tamat dalam masa SEBULAN ini.</td></tr>";
				}

	


	?>
	


	<center><?php echo $output; ?></center>

<?php 

	echo "</td></tr></table>";

?>


		

</section>