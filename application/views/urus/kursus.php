<div id="back-borang">
    <a href="<?=base_url('urusmaklumat')?>"><button class="button"
            style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>
<section class="form-section">
    <form method="post" class="borang">
        <h4><b><i class="fa fa-book" aria-hidden="true"></i>&nbsp;&nbsp;Daftar Kursus</b></h4>
        <hr>
        <?php
            if (isset($msg)) {
                echo $msg;
            }
        ?>
        <br>
        <b>Kod Kursus :</b>
        <br>
        <input type="text" placeholder="" name="KodKursus" required />
        <br><br>

        <b>Nama Kursus :</b>
        <br>
        <input type="text" style="width:400px;" placeholder="" name="NamaKursus" required />
        <br><br>

        <b>BIDANG :</b>
        <br>
        <?php
           

            $result = $this->db->query("SELECT KodJab, NamaJabBhg from jabatan WHERE status='active' ORDER BY NamaJabBhg ASC")->result_array();
                
            echo "<select name='KodJab' value='KodJab' required>";
            echo '<option value="" disabled selected hidden>&nbsp&nbsp--</option>';
            foreach($result as $row)
            {
                echo '<option value="'.$row['KodJab'].'">'.$row['NamaJabBhg'].' &nbsp;('.$row['KodJab'].')</option>';
            }
            echo "</select>";
        ?>

        </select>
        <b>Tahap :</b>
        <select name="type" require>
            <option value="0">Diploma</option>
            <option value="1">Sarjana Muda</option>
            <option value="2">Sarjana</option>
            <option value="3">Pra Diploma</option>
        </select>
        <br><br>
        <button type="submit" class="button-ungu button4" name="btn-signup">Daftar Kursus</button>
    </form>
</section>