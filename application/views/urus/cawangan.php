<div id="back-borang">
    <a href="<?=base_url('urusmaklumat')?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>
<section class="form-section">

    <form method="post" class="borang">
    <h4><b><i class="fa fa-map-signs" aria-hidden="true"></i>&nbsp;&nbsp;Daftar Cawangan</b></h4>
    <hr>
    <?php
        if (isset($msg)) {
            echo $msg;
        }
    ?>
    <br/>
    <b>Jabatan :</b>
    <br/>
    <?php

        $result = $this->db->query("SELECT KodJab, NamaJabBhg from jabatan WHERE status='active' ORDER BY NamaJabBhg ASC")->result_array();
          
        echo "<select name='KodJab' value='KodJab' required>";
        echo '<option value="" disabled selected hidden>--</option>';
        foreach($result as $row)
        {
            //unset($KodJab, $NamaJabBhg);
            //$KodJab = $row['KodJab'];
            //$NameJabBhg = $row['NamaJabBhg']; 
            echo '<option value="'.$row['KodJab'].'">'.$row['NamaJabBhg'].' &nbsp;('.$row['KodJab'].')</option>';
        }

        echo "</select>";
    ?>
    <br/><br/>
    


    <b>Kampus :</b>
    <br/>
    <?php

   

    $result = $this->db->query("SELECT KodKampus, NamaKampus from kampus WHERE status='active' ORDER BY NamaKampus ASC")->result_array();
        
        echo "<select name='KodKampus' value='KodKampus' required>";
        echo '<option value="" disabled selected hidden>--</option>';

        foreach ($result as $row) {

                      //unset($KodJab, $NamaJabBhg);
                      //$KodJab = $row['KodJab'];
                      //$NameJabBhg = $row['NamaJabBhg']; 

                      echo '<option value="'.$row['KodKampus'].'">'.$row['NamaKampus'].'</option>';
                     
    }

        echo "</select>";
    ?>
    <br/><br/>
    <button type="submit" class="button-ungu button4" name="btn-signup">Daftar Cawangan</button> 
    </form>
</section>