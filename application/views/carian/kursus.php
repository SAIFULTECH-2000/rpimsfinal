<link href="<?= base_url('assets/sbadmin/') ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<div id="back-senarai">
    <a href="<?= base_url('carian') ?>"><button class="button"
            style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a>
</div>

<section>
    <?php
    $searchxx = "";
    ?>
    <center>
        <form method='POST' class="cari">
            <div class="row col-lg-11">
                <div class="col col-lg-2">
                </div>
                <div class="input-group col col-lg-6" style="padding:0;">
                    <input type="text" class="form-control" placeholder="ISIKAN CARIAN" name="search" id="search"
                        value="<?= set_value('search') ?>" style="text-transform:uppercase;">
                    <span class="input-group-addon" style="padding:0;">
                        <select width="100%" id="carian" name="carian" class="form-control"
                            style="border:0; background-color:#e9ecef;">
                            <option value="kursus" <?php if ($carian == "kursus") {
                                                        echo "selected";
                                                    } ?>>KURSUS</option>
                            <option value="jabatan" <?php if ($carian == "jabatan") {
                                                        echo "selected";
                                                    } ?>>JABATAN</option>
                        </select>
                    </span>
                </div>
                <div class="col col-lg-1">
                    <button type='submit' class='button1 button4 button2' name='submit'>CARI</button>
                </div>
                <div class="col col-lg-2">
                </div>
            </div>
        </form>
    </center>
    <br>
    <br>
    <?php
    if (!empty($search)) {

    ?>
    <font size='5'><i class='fa fa-search' aria-hidden='true'></i>&nbsp;HASIL CARIAN BAGI <font color='purple'
            style="font-weight:bold;"><?php echo strtoupper($search); ?></font>
    </font>
    <br />
    <?php
    }
    ?>
    <b>
        <font size='5'><i class='fa fa-book' aria-hidden='true'></i>&nbsp;SENARAI KURSUS</font>
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
                                <center>Kod Kursus</center>
                            </th>
                            <th class="col-xs-8">
                                <center>Nama Kursus</center>
                            </th>
                            <th class="col-xs-2">
                                <center>Kod Jabatan</center>
                            </th>
                            <th class="col-xs-4">
                                <center>Tahap</center>
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
                            $KodKursus = $row['KodKursus'];
                            $i++;
                            $tahap;

                            switch ($row['type']) {
                                case 0:
                                    $tahap = "Diploma";
                                    break;
                                case 1:
                                    $tahap = "Sarjana Muda";
                                case 2:
                                    $tahap = "Sarjana";
                                    break;
                            }
                            echo "
                        <tr>
                        <td><center>" . $i . ".</center></td>
                        <td><center>" . $row["KodKursus"] . "</center></td>
                        <td>" . $row["NamaKursus"] . "</td>
                        <td><center>" . $row["KodJab"] . "</center></td>
                        <td>
                        " .
                                $tahap
                                . "
                        </td>
                        <td>
                            <center>
                            <form method='post' action=" . base_url('carian/kemaskini_kursus') . ">
                            <input type='hidden' name='KodKursus' value='" . $KodKursus . "'>
                            <Button type='submit' name='profile' class='btn btn-warning' style='color:green;'  >Kemaskini</Button>
                            </form>
                            <form method='post' action=" . base_url('carian/padam_kursus') . ">
                            <input type='hidden' name='KodKursus' value='" . $KodKursus . "'>
                            <Button type='submit' name='profile' class='btn btn-danger' style='color:green;'  >Padam</Button>
                            </form>
                            </center>
                        </td> 

                    </tr>";
                        }
                        if ($i == 0) {
                        ?>
                        <tr>
                            <td colspan='5' style='color:red; font-weight:bold; font-style:italic;'>Maaf, tiada rekod
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