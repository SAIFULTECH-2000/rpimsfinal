<link href="<?=base_url('assets/sbadmin/')?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">


<section>
    <div class="row">
        <a href="<?=base_url('carian')?>"><button class="button"
                style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a>
        <a href="<?=base_url('/urusmaklumat/daftar_cawangan')?>"><button class="button"
                style="vertical-align:middle"><span><b>DAFTAR cawangan</b></span></button></a>
    </div>
    <center>
        <form method='POST' class="cari">
            <input type='text' placeholder='SILA ISIKAN KAMPUS ATAU JABATAN' value="<?=set_value('search')?>"
                name='search' style="text-transform:uppercase;" />
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
        <font size='5'><i class='fa fa-map-signs' aria-hidden='true'></i>&nbsp;SENARAI CAWANGAN</font>
    </b>
    <br />
    <br />
    <div class="card shadow mb-4">
        <div class="card-header py-3">

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th class='col-xs-1'>
                                <center>Bil.</center>
                            </th>
                            <th class='col-xs-2'>
                                <center>Kod Bidang</center>
                            </th>
                            <th class='col-xs-8'>Nama Bidang</th>
                            <th class='col-xs-8'>Nama Kampus</th>
                            <!-- <th class='col-xs-8'><center>Tindakan</center></th> -->
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                

				
                $no = 1;
                foreach($result as $row)
                {


                    echo "
                            <tr>
                            <td><center>".$no.".</center></td>
                            <td><center>".$row["KodJab"]."</center></td>
                            <td>".$row["NamaJabBhg"]."</td>
                            <td>".$row["NamaKampus"]."</td>
                           
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