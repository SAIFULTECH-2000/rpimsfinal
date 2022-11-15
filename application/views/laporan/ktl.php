<div id="back-senarai">
    <a href="<?=base_url('laporan')?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a>
</div>
<section>
    <center>
        <form method='POST' class="cari">
            <input type='text' value="<?=set_value('search')?>" name='search' style="text-transform:uppercase;"/>
            <button type='submit' class='button1 button4' name='submit'>CARI</button>
        </form>
    </center>
    <br/>
<?php
 if(!empty($search))
	{
        ?>
            <font size = '5'><i class='fa fa-search' aria-hidden='true'></i>&nbsp;HASIL CARIAN BAGI <font color='purple' style="font-weight:bold;"><?php echo strtoupper($search); ?></font></font>
            <br/>
        <?php
	}
?>
<div id="table-wrapper">
  		<div id="table-scroll">	
			<table align="center" class="data-table">
                <tr>
                    <th class='col-xs-1'><center>Bil</center></th> 
                    <th class='col-xs-2'><center>No Pekerja</center></th> 
                    <th class='col-xs-8'><center>Nama Staf</center></th> 
                    <th class='col-xs-2'><center>Kod Kursus</center></th> 
                    <th class='col-xs-8'><center>Tempoh</center></th>
                    <th class='col-xs-8'><center>Surat Perlantikan</center></th>
                </tr>
                <?php
					echo "<br><p><b><font size = '5'> <i class='fa fa-address-card-o' aria-hidden='true'></i> &nbsp &nbspKURSUS TANPA PERLANTIKAN BARU</font></b></p>";

				
					
                    $i = 0;
					foreach($result as $row)
                    {
                        $i++;
						$NoPekerja = $row['NoPekerja'];
						$KodKursus = $row['KodKursus'];
						$NamaStaf = $row['NamaStaf'];
						$TarikhMula = $row['TarikhMula'];
						$TarikhTamat = $row['TarikhTamat'];
						$SuratPerlantikan = $row['SuratPerlantikan'];

						echo "
								<tr>
								<td><center><div class='tooltip1'>".$i.".</td>
								<td><center><div class='tooltip1'>".$row["NoPekerja"]."</td>
								<td><div class='tooltip1'>".$row["NamaStaf"]."</td>
								<td><center><b><div class='tooltip1'>".$row["KodKursus"]."</b></td>
								<td><center>".date('d/m/Y', strtotime($row["TarikhMula"]))."<br> - <br>".date('d/m/Y', strtotime($row["TarikhTamat"]))."</td>
								<td>
                                    <center>
                                        <a href='".base_url('suratlantikan/').$SuratPerlantikan."' target='_blank' style='color:green;' data-toggle='tooltip' data-placement='bottom' title='Papar' download><i class='fa fa-file-pdf-o' aria-hidden='true'></i></a>
                                    </center>
                                </td>
							</tr>";

					}
                    if($i == 0)
                    {
                        ?>
                        <tr>
                            <td colspan="6">Maaf, tiada rekod dijumpai.</td>
                        </tr>
                        <?php
                    }

			?>

			</table>
		</div>
	</div>

		

</section>