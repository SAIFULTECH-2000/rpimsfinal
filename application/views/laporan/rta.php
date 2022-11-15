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
                    <th class='col-xs-2'><center>Kursus</center></th> 
                    <th class='col-xs-8'>Nama Staf</th> 
                    <th class='col-xs-2'><center>Tempoh</center></th> 
                    <th class='col-xs-2'><center>Tindakan</center></th>
                </tr>
                <?php
					echo "<br><p><b><font size = '5'> <i class='fa fa-id-badge' aria-hidden='true'></i> &nbsp &nbsp SENARAI RP TIDAK AKTIF</font></b></p>";
                    $no=1;
					foreach ($result as $row)
                    {
                        echo "
                            <tr>
                                <td><center>".$no.".</center></td>
								<td><center><b><font data-toggle='tooltip' data-placement='left' title='".$row["NamaKursus"]."'>".$row["KodKursus"]."</font></b></center></td>
								<td><font data-toggle='tooltip' data-placement='bottom' title='".$row["NoPekerja"]."'>".$row["NamaStaf"]."</font></td>
								<td><center>".date('d/m/Y', strtotime($row["TarikhMula"]))."<br> - <br>".date('d/m/Y', strtotime($row["TarikhTamat"]))."</center></td>
								<td>
                                    <center>
                                        <a href='download.php?SuratPerlantikan=$row[SuratPerlantikan]' target='_blank' style='color:green;' data-toggle='tooltip' data-placement='left' title='Surat Perlantikan'><i class='fa fa-file-pdf-o' aria-hidden='true'></i></a>&nbsp;
                                        <a href='sambungperlantikan.php?NoPekerja=$row[NoPekerja]&KodKursus=$row[KodKursus]' style='color:blue;' data-toggle='tooltip' data-placement='right' title='Lantik Semula'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>
                                    </center>
                                </td>
							</tr>";
                        $no++;
					}
                ?>

			</table>
		</div>
	</div>

		

</section>