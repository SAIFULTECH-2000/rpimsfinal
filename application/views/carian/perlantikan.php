
 <link href="<?=base_url('assets/sbadmin/')?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<div id="back-senarai">
    <a href="<?=base_url('carian')?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a>
</div>
<section>
	<center>
        <form method='POST' class="cari">
            <input type='text' placeholder='SILA ISIKAN KURSUS ATAU PENSYARAH UNTUK DICARI' name='search' value="<?=set_value('search')?>" style="text-transform:uppercase;"/>
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
    <b><font size = '5'><i class='fa fa-id-badge' aria-hidden='true'></i>&nbsp;SENARAI PERLANTIKAN</font></b>
    <br/>
    <br/>
    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                           
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th class='col-xs-1'><center>Bil.</center></th> 
                    <th class='col-xs-2'><center>Kursus</center></th> 
                    <th><center>Nama Staf</center></th> 
                    <th class='col-xs-5'><center>Tempoh</center></th>
                   
                                        </tr>
                                    </thead>
                                 
                                    <tbody>
                                    	

			<?php
					
                    $counter=0;
                    foreach($result as $row)

					{   
                        $pengesahan = $row['disahkan'];
                        if($row['disahkan']!="Sah"){
                            $pengesahan ="Perlu pengesahan";
                        }
                        $counter++;
						echo "
								<tr>
                                <td><center>$counter.</center></td>
								<td><center><b data-toggle='tooltip' data-placement='bottom' title='".$row["NamaKursus"]."'><div class='tooltip1'>".$row["KodKursus"]."</b></center></td>
								<td>".$row["NamaStaf"]."</td>
								<td><center>".date('d/m/Y', strtotime($row["TarikhMula"]))."<br> - <br>".date('d/m/Y', strtotime($row["TarikhTamat"]))."</td>
							   
							</tr>";
					}
                    if($counter == 0)
                    {
                        ?>
                        <tr><td colspan='6' style='color:red; font-weight:bold; font-style:italic;'>Maaf, tiada rekod dijumpai.</td></tr>
                        <?php
                    }
			?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

		

</section>

<script src="<?=base_url('assets/sbadmin/')?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=base_url('assets/sbadmin/')?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?=base_url('assets/sbadmin/')?>js/demo/datatables-demo.js"></script>
<!-- // END CONTENT SECTION -->