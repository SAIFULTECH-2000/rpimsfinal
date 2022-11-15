
 <link href="<?=base_url('assets/sbadmin/')?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<div id="back-menu">
    <a href="<?=base_url('pengesahan')?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a>
</div>
<section>
	
    <br/>
    <br/>
  
    <b><font size = '5'><i class='fa fa-id-badge' aria-hidden='true'></i>&nbsp;SENARAI PERLANTIKAN YANG PERLU PENGESAHAN</font></b>
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
                    <th class='col-xs-5'><center>Status</center></th>
                    
                    <th class='col-xs-4'><center>Tindakan</center></th>
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
							    <td>".$pengesahan;if($row['disahkan']=='Sah'){
                                    echo "dan".$row['print'];
                                }
                                
                                echo "</td>
                                <td>
                                    <center>
                                    ";
                                    if($row['disahkan']=="Sah")
                                    echo "<a target='_blank' href='".base_url('surat/generatesuratlantikan/')."$row[id]' style='color:blue;' data-toggle='tooltip' data-placement='left' title='Surat Lantikan'><i class='fa fa-download' aria-hidden='true'></i></a>";

                                    echo  "
                                    <form method='post' action=".base_url('carian/kemaskini_perlantikan/pengesahan').">
                                    <input type='hidden' name='id' value='".$row['id']."'>
                                    <Button type='submit' name='profile' class='btn btn-warning' style='color:green;'  >PENGESAHAN
                                    </Button>
                                    </form>
                                    <form method='post' action=".base_url('carian/padam_perlantikan').">
                                    <input type='hidden' name='id' value='".$row['id']."'>
                                    <Button type='submit' name='profile' class='btn btn-danger' style='color:green;'  >Padam</Button>
                            </form>

                                    </center>
                                </td>
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