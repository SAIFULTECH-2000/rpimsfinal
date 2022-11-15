<div id="back-senarai">
    <a href="<?=base_url('laporan')?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a>
</div>

<section>
	<center>
        <form method='POST' class="cari">
            <input type='text' placeholder='SILA ISIKAN SEMESTER UNTUK DICARI' name='search' value="<?=set_value('search')?>" style="text-transform:uppercase;"/>
            <button type='submit' class='button1 button4 button2' name='submit'>CARI</button>
        </form>
    </center>
    <br/>
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
    <b><font size = '5'><i class='fa fa-paper-plane' aria-hidden='true'></i>&nbsp;SENARAI SEMESTER</font></b>
    <br/>
    <br/>
	<div id="table-wrapper">
  		<div id="table-scroll">	
			<table align="center" class="data-table">
            <tr>
                <th class="col-xs-1"><center>Bil.</center></th>
                <th class="col-xs-2"><center>Kod Semester</center></th> 
				<th>Nama Semester</th> 
				<th class="col-xs-1"><center>Tindakan</center></th></tr>
                <?php
					

			
                    $no = 1;
					foreach ($result as $row)
					{
                        
						echo "
								<tr>
								<td><center>".$no.".</center></td>
								<td><center>".$row["KodSem"]."</center></td>
								<td>".$row["NamaSem"]."</td>
								<td>
                                    <center>
                                        <a href='kemaskinisemester.php?KodSem=$row[KodSem]' style='color:blue;' data-toggle='tooltip' data-placement='left' title='Kemaskini'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a>&nbsp;
                                        <a href='hapussemester.php?KodSem=$row[KodSem]' style='color:red;' data-toggle='tooltip' data-placement='right' title='Hapus'><i class='fa fa-trash-o' aria-hidden='true'></i></a>
                                    </center>
                                </td> 

							</tr>";
                        $no++;
					}
                    if($no == 1)
                    {
                        ?>
                        <tr><td colspan='4' style='color:red; font-weight:bold; font-style:italic;'>Maaf, tiada rekod dijumpai.</td></tr>
                        <?php
                    }

			?>

			</table>
		</div>
	</div>

</section>