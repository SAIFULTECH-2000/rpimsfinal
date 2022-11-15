<div id="back-menu">
		<a href="<?=base_url('notifikasi')?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>
<section class="small-section">



	
    <center>
	<form method='POST' class="cari">
		<input type='text' placeholder='CARIAN NAMA @ KOD KURSUS' name='search' value="<?=set_value('search')?>" style="text-transform: uppercase;"/>
		<button type='submit' class='button1 button4 button2' name='submit'>CARI</button>
	</form>
    </center>
    <br>
    <?php
        if(!empty($search))
        {
            ?>
            <p>
                <b>
                <font size = '5'> <i class='fa fa-search' aria-hidden='true'></i> &nbsp HASIL CARIAN BAGI <font color='purple'><?php echo strtoupper($input); ?></font></font>
                </b>
            </p>
            <?php
        }
    ?>
	<center>
	<table class='search-table'>
        <tr>
            <td>
                <br/>
                <b>
                    <center>
                        <font size = '5'><i class='fa fa-bell-o' aria-hidden='true'></i>&nbsp NOTIFIKASI &nbsp;<font color='red' size='5'><span class='blink'><i class='fa fa-exclamation-circle' aria-hidden='true'></i></font></span></font>
                    </center>
                </b>
                <hr>
                <br>
                <center>
                Sila lantik RP seterusnya bagi kursus-kursus berikut : 
                </center>
                <br>
                <?php
                $output = NULL;
                

				/*$result = $mysqli->query("Select * from PERLANTIKANTAMAT 
                                    left join STAF on STAF.NoPekerja = PERLANTIKANTAMAT.NoPekerja
                                    where PERLANTIKANTAMAT.KodKursus not in (select KodKursus from PERLANTIKAN)
                                    $searchxx");*/
                ;



				
					echo "<div id='table-wrapper'>
					  		<div id='table-scroll'>	
								<table align='center'>

									<th class='col-xs-2'><center>Bil</center></th>
									<th class='col-xs-8'><center>Nama Staf</center></th>
									<th class='col-xs-8'><center>Kursus</center></th>
									<th class='col-xs-8'><center>Tamat pada</center></th>
									<th class='col-xs-8'><center>Lantikan Seterusnya</center></th></tr>";

					$i=0;
                    foreach ($result as $row)
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
                    if(!empty($_POST['search']))
                    {
                        $output = "<tr><td colspan='4' style='color:red; font-weight:bold; font-style:italic;'><center>Harap maaf, tiada carian dijumpai.</td></tr>";
                    }
                    else
                    {
                        $output = "<tr><td colspan='4'><center>Semua RP yang telah tamat tempoh perkhidmatan telah diuruskan.</td></tr>";
                    }
				}
                ?>
                <center><?php echo $output; ?></center>
            </td>
        </tr>
    </table>
    </center>
</section>