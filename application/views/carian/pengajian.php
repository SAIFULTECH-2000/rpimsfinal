<link href="<?= base_url('assets/sbadmin/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">



<section>
    <div class="row">
        <a href="<?=base_url('carian')?>"><button class="button"
                style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a>
        <a href="<?=base_url('/urusmaklumat/daftar_pengajian')?>"><button class="button"
                style="vertical-align:middle"><span><b>DAFTAR PENGAJIAN</b></span></button></a>
    </div>

    <br>
    <br>


    <b>
        <font size='5'><i class='fa fa-book' aria-hidden='true'></i>&nbsp;SENARAI PUSAT PENGAJIAN </font>
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
                                <center>Pengajian</center>
                            </th>

                            <th class="col-xs-8">
                                <center>Tindakan</center>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php





                        $i = 0;
                        foreach ($result as $row) {
                       
                            $i++;
                            

                            echo "
                        <tr>
                        <td><center>" . $i . ".</center></td>
                        <td><center>" . $row["title"] . "</center></td>
                        <td>
                            <center>
                            <form method='post' action=" . base_url('carian/kemaskini_pengajian') . ">
                            <input type='hidden' name='pengajianid' value='" .$row['id'] . "'>
                            <Button type='submit' name='profile' class='btn btn-warning' style='color:green;'  >Kemaskini</Button>
                            </form>
                            
                            </center>
                        </td> 

                    </tr>";
                        }
                        if ($i == 0) {
                        ?>
                        <tr>
                            <td colspan='3' style='color:red; font-weight:bold; font-style:italic;'>Maaf, tiada rekod
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
<script src="<?= base_url('assets/sbadmin/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/sbadmin/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/sbadmin/') ?>js/demo/datatables-demo.js"></script>
<!-- // END CONTENT SECTION -->