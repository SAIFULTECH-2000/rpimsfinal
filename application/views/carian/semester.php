<link href="<?=base_url('assets/sbadmin/')?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">



<section>
    <div class="row">
        <a href="<?=base_url('carian')?>"><button class="button"
                style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a>
        <a href="<?=base_url('/urusmaklumat/daftar_semester')?>"><button class="button"
                style="vertical-align:middle"><span><b>DAFTAR SEMESTER</b></span></button></a>
    </div>
    <center>
        <form method='POST' class="cari">
            <input type='text' placeholder='SILA ISIKAN SEMESTER UNTUK DICARI' name='search'
                value="<?=set_value('search')?>" style="text-transform:uppercase;" />
            <button type='submit' class='button1 button4 button2' name='submit'>CARI</button>
        </form>
    </center>
    <br />
    <br />
    <?php
    if(!empty($search))
	{
        ?>
    <font size='5'><i class='fa fa-search' aria-hidden='true'></i>&nbsp;HASIL CARIAN BAGI <font color='purple'
            style="font-weight:bold;"><?php echo strtoupper($search); ?></font>
    </font>
    <br />
    <?php
	}
    ?>
    <b>
        <font size='5'><i class='fa fa-paper-plane' aria-hidden='true'></i>&nbsp;SENARAI SEMESTER</font>
    </b>
    <br />
    <br />
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class="col-xs-1">
                                <center>Bil.</center>
                            </th>
                            <th class="col-xs-2">
                                <center>Kod Semester</center>
                            </th>
                            <th>Nama Semester</th>
                            <th class="col-xs-1">
                                <center>Tindakan</center>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
					

			
                    $no = 1;
					foreach ($result as $row)
					{
                        $KodSem = $row['KodSem'];
						echo "
								<tr>
								<td><center>".$no.".</center></td>
								<td><center>".$row["KodSem"]."</center></td>
								<td>".$row["NamaSem"]."</td>
								<td>
                                    <center>
                                    <form method='post' action=".base_url('carian/kemaskini_semester').">
                                    <input type='hidden' name='KodSem' value='".$KodSem."'>
                                    <Button type='submit' name='profile' class='btn btn-warning' style='color:green;'  >Kemaskini</Button>
                                    </form>
                                    <form method='post' action=".base_url('carian/padam_semester').">
                                    <input type='hidden' name='KodSem' value='".$KodSem."'>
                                    <Button type='submit' name='profile' class='btn btn-danger' style='color:green;'  >Padam</Button>
                                    </form>
                                    </center>
                                </td> 

							</tr>";
                        $no++;
					}
                    if($no == 1)
                    {
                        ?>
                        <tr>
                            <td colspan='4' style='color:red; font-weight:bold; font-style:italic;'>Maaf, tiada rekod
                                dijumpai.</td>
                        </tr>
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