<div id="back-borang">
    <a href="<?= base_url('carian/kursus') ?>"><button class="button"
            style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>
<section class="form-section">
    <form method="post" class="borang">
        <h4><b><i class="fa fa-book" aria-hidden="true"></i>&nbsp;&nbsp;Kemaskini Kursus</b></h4>
        <hr>
        <?php
        if (isset($msg)) {
            echo $msg;
        }
        ?>
        <br>
        <b>Kod Kursus :</b>
        <br>
        <input type="text" placeholder="" name="KodKursus" value="<?= $row['KodKursus'] ?>" readonly />
        <br><br>

        <b>Nama Kursus :</b>
        <br>
        <input type="text" style="width:400px;" placeholder="" value="<?= $row['NamaKursus'] ?>" name="NamaKursus"
            required />
        <br><br>

        <b>BIDANG :</b>
        <br>
        <?php


        $result = $this->db->query("SELECT KodJab, NamaJabBhg from jabatan WHERE status='active' ORDER BY NamaJabBhg ASC")->result_array();

        echo "<select name='KodJab' value='KodJab' required>";
        echo '<option value="" disabled selected hidden>&nbsp&nbsp--</option>';
        foreach ($result as $rows) :

        ?>
        <option value="<?= $rows['KodJab'] ?>" <?php if ($row['KodJab'] == $rows['KodJab']) {
                                                        echo "selected";
                                                    } ?>><?= $rows['NamaJabBhg'] ?>&nbsp;(<?= $rows['KodJab'] ?>)
        </option>
        <?php
        endforeach;
        ?>

        </select>
        <b>Tahap :</b>
        <select name="type" require>
            <option value="0" <?php if ($row['type'] == 0) {
                                    echo "selected";
                                } ?>>Diploma</option>
            <option value="1" <?php if ($row['type'] == 1) {
                                    echo "selected";
                                } ?>>Sarjana Muda</option>
            <option value="2" <?php if ($row['type'] == 2) {
                                    echo "selected";
                                } ?>>Sarjana</option>
            <option value="3" <?php if ($row['type'] == 3) {
                                    echo "selected";
                                } ?>>Pra Diploma</option>
        </select>
        <br><br>
        <button type="submit" class="button-ungu button4" name="btn-signup">Kemaskini Kursus</button>
    </form>
</section>