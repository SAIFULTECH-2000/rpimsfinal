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
                    <th class='col-xs-1'><center>Bil.</center></th> 
                    <th class='col-xs-2'><center>No Pekerja</center></th> 
                    <th class='col-xs-8'><center>Nama Staf</center></th> 
                    <th class='col-xs-8'><center>Profil</center></th> 
                </tr>
			<?php
					echo "<br><p><b><font size = '5'> <i class='fa fa-user-times' aria-hidden='true'></i> &nbsp SENARAI STAF TIDAK AKTIF</font></b></p>";
                    $no=1;
                    foreach ($result as $row)
					{
						echo "
                            <tr>
								<td><center>".$no.".</center></td>
								<td><center>".$row["NoPekerja"]."</center></td>
								<td>".$row["NamaStaf"]."</td>
								<td><center> <a href='profilstaf.php?NoPekerja=$row[NoPekerja]'>Profil</a> </td>
							</tr>";
                        $no++;

					}

			?>

			</table>
		</div>
	</div>

</section>