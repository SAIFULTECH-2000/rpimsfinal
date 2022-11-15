<div id="back-borang">
    <a href="<?=base_url('urusmaklumat')?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>

    <section class="form-section">

        <form method="post" class="borang">
      
        <h4><b><i class="fa fa-address-card-o" aria-hidden="true"></i>&nbsp;&nbsp;Daftar Pengajaran Pensyarah</b></h4>
        <hr>
        <?php
            if (isset($msg)) {
                echo $msg;
            }
        ?>
        <br/>
        <b>Pensyarah :</b>
        <br/>
        <?php

            $result = $this->db->query("SELECT NoPekerja, NamaStaf from STAF WHERE status='active' ORDER BY NamaStaf ASC")->result_array();
              
            echo "<select name='NoPekerja' value='NoPekerja' required>";
            echo '<option value="" disabled selected hidden>--</option>';

           foreach ( $result as $row ) {

                            //unset($KodJab, $NamaJabBhg);
                            //$KodJab = $row['KodJab'];
                            //$NameJabBhg = $row['NamaJabBhg']; 

                            echo '<option value="'.$row['NoPekerja'].'">'.$row['NamaStaf'].' <b>('.$row['NoPekerja'].')<b></option>';
                           
            }
            echo "</select>";
        ?>
        <br/><br/>
        


        <b>Kursus :</b>
        <br/>
        <?php

        $result = $this->db->query("SELECT KodKursus, NamaKursus from KURSUS WHERE status='active' ORDER BY KodKursus ASC")->result_array();
            
            echo "<select name='KodKursus' value='KodKursus' required>";
            echo '<option value="" disabled selected hidden>--</option>';

            foreach( $result as $row) {

                          //unset($KodJab, $NamaJabBhg);
                          //$KodJab = $row['KodJab'];
                          //$NameJabBhg = $row['NamaJabBhg']; 

                          echo '<option value="'.$row['KodKursus'].'">'.$row['KodKursus'].' - '.$row['NamaKursus'].'</option>';
                         
        }

            echo "</select>";
        ?>
        <br/><br/>
        
        <b>Semester :</b>
        <br/>
        <?php

        $result= $this->db->query("SELECT KodSem, NamaSem from SEMESTER WHERE status='active' ORDER BY KodSem ASC")->result_array();
            
            echo "<select name='KodSem' value='KodSem' required>";
            echo '<option value="" disabled selected hidden>--</option>';

            foreach ($result as $row) {

                          //unset($KodJab, $NamaJabBhg);
                          //$KodJab = $row['KodJab'];
                          //$NameJabBhg = $row['NamaJabBhg']; 

                          echo '<option value="'.$row['KodSem'].'">'.$row['KodSem'].' - '.$row['NamaSem'].'</option>';
                         
        }

            echo "</select>";
        ?>
        <br/><br/>

        
        <button type="submit" class="button-ungu button4" name="btn-signup">Daftar Pengajaran</button> 
            
        </div> 
      
      </form>
</section>