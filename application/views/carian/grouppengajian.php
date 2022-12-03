<link href="<?= base_url('assets/sbadmin/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">



<section>
    <div class="row">
        <a href="<?=base_url('carian')?>"><button class="button"
                style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a>
        <a href="<?=base_url('/carian/kemaskini_grouppengajian')?>"><button class="button"
                style="vertical-align:middle"><span><b>KEMASKINI GROUP PENGAJIAN</b></span></button></a>
    </div>

    <br>
    <br>


    <b>
        <font size='5'><i class='fa fa-book' aria-hidden='true'></i>&nbsp;SENARAI BIDANG DIBAWAH PENGAJIAN </font>
    </b>
    <br />
    <br />
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="row">
            <?php foreach($result  as $row){ ?>
            <?php 
            $pengajianid = $row['id'];
            $jabatan = $this->db->query("SELECT * FROM jabatan inner join bidangdalampengajian on jabatan.KodJab = bidangdalampengajian.bidangid where pengajianid = '$pengajianid'")->result_array();    
            ?>
            <div class="card-body">
                <b><?=$row['title']?></b>
                <ol>
                    <?php foreach($jabatan as $row2){?>
                    <li>
                        <?= $row2['NamaJabBhg']?>
                    </li>
                    <?php }?>
                </ol>
            </div>
            <?php } ?>
        </div>
    </div>

</section>
<script src="<?= base_url('assets/sbadmin/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/sbadmin/') ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?= base_url('assets/sbadmin/') ?>js/demo/datatables-demo.js"></script>
<!-- // END CONTENT SECTION -->