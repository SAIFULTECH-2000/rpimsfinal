<div id="back-borang">
    <a href="<?=base_url('carian')?>"><button class="button"
            style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>
<section class="form-section">
    <form method="post" class="borang">

        <h4><b><i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;&nbsp;Daftar Subjek</h4>
        </h4>
        <hr>
        <?php
            if (isset($msg)) {
                echo $msg;
            }
        ?>
        <br />

        <b>Program :</b>
        <br />
        <?php


            $result = $this->db->query("SELECT KodProgram, NamaProgram from program WHERE status='active' ORDER BY KodProgram ASC")->result_array();
            
            echo "<select name='KodProgram' value='KodProgram' required>";
            echo '<option value="" disabled selected hidden>--</option>';

           foreach( $result as $row ) 
            {
                //unset($KodJab, $NamaJabBhg);
                //$KodJab = $row['KodJab'];
                //$NameJabBhg = $row['NamaJabBhg']; 

                echo '<option value="'.$row['KodProgram'].'">'.$row['KodProgram'].' - '.$row['NamaProgram'].'</option>';
            }
            echo "</select>";
        ?>
        <br /><br />

        <b>Kursus :</b>
        <br>
        <?php
            $result = $this->db->query("SELECT KodKursus, NamaKursus from kursus WHERE status='active' ORDER BY KodKursus ASC")->result_array();
            echo "<select name='KodKursus' value='KodKursus' required>";
            echo '<option value="" disabled selected hidden>--</option>';
            foreach ( $result as $row) {

                //unset($KodJab, $NamaJabBhg);
                //$KodJab = $row['KodJab'];
                //$NameJabBhg = $row['NamaJabBhg']; 

                echo '<option value="'.$row['KodKursus'].'">'.$row['KodKursus'].' - '.$row['NamaKursus'].'</option>';
            }
            echo "</select>";
        ?>
        <br /><br />

        <b>Pelan Bahagian :</b>
        <br />
        <!--<input type="text" class="form-control" placeholder="Bahagian Pelan" name="BhgPelan" required  />-->
        <select name="BhgPelan" value="BhgPelan" required>
            <option value="" disabled selected hidden>--</option>
            <option value="PART 1">PART 1</option>
            <option value="PART 2">PART 2</option>
            <option value="PART 3">PART 3</option>
            <option value="PART 4">PART 4</option>
            <option value="PART 5">PART 5</option>
            <option value="PART 6">PART 6</option>
            <option value="PART 7">PART 7</option>
            <option value="PART 8">PART 8</option>
            <option value="PART 9">PART 9</option>
            <option value="PART 10">PART 10</option>
        </select>
        <br /><br />

        <button type="submit" class="button-ungu button4" name="btn-signup">&nbsp; Daftar Subjek</button>
    </form>

</section>