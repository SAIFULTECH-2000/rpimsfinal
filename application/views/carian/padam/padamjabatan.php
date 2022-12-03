<div id="back">
    <a href="carijabatan.php"><button class="button"
            style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>

<script type='text/javascript'>
function confirmDelete() {
    return confirm("Teruskan untuk hapus jabatan?");
}
</script>

<body>

    <section>

        <form method="post" action="">

            <h2><i class="fa fa-building-o" aria-hidden="true"></i>&nbsp;&nbsp;Hapus Jabatan</h2>
            <hr>



            <?php
                      if (isset($msg)) {
                       echo $msg;
                      }
                      ?>

            <br>

            <b>Kod Bidang :<?php echo $row['KodJab']; ?></b>
            <br>
            <div class="tooltip">
                <input type="text" name="KodJab" value="<?php echo $row['KodJab']; ?>" readonly="readonly" />
                <span class=""></span>
            </div><br><br>

            <b>Kod BIDANG :<?php echo $row['NamaJabBhg']; ?></b>
            <br>
            <div class="tooltip">
                <input type="text" name="NamaJabBhg" value="<?php echo $row['NamaJabBhg']; ?>" readonly="readonly" />
                <span class=""></span>
            </div><br><br>

            <span class="tooltiptext">Tekan <b>hapus</b> untuk hapuskan jabatan <br>atau <b>batal</b> untuk
                kembali.</span>
            </div><br><br>

            <button type="submit" class="button1 button4 button2" name="submit" value="Update"
                onclick="return confirmDelete()">Hapus</button>


        </form>



    </section>