<div id="back-borang">
    <a href="<?=base_url('carian')?>"><button class="button"
            style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>


<section class="form-section">
    <form method="post" class="borang">
        <h4><b><i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;&nbsp;Kemaskini Bidang dibawah Pengajian</b>
        </h4>
        <hr>



        <?php
          if (isset($msg)) {
           echo $msg;
          }
          ?>

        <br>

        <b>Kemaskini Pengajian :</b>
        <br>
        <?php
        echo "<label>Bidang:</label>";
        echo "<select name='KodJab' value='KodJab' required>";
        echo '<option value="" disabled selected hidden>--</option>';
        foreach($result2 as $row)
        {
            //unset($KodJab, $NamaJabBhg);
            //$KodJab = $row['KodJab'];
            //$NameJabBhg = $row['NamaJabBhg']; 
            echo '<option value="'.$row['KodJab'].'">'.$row['NamaJabBhg'].' &nbsp;('.$row['KodJab'].')</option>';
        }

        echo "</select>";
    ?>
        <?php
        echo "<label>Pengajian:</label>";
        echo "<select name='pengajianid' value='pengajianid' required>";
        echo '<option value="" disabled selected hidden>--</option>';
        foreach($result as $row)
        {
            //unset($KodJab, $NamaJabBhg);
            //$KodJab = $row['KodJab'];
            //$NameJabBhg = $row['NamaJabBhg']; 
            echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
        }

        echo "</select>";
    ?>
        <br /><br />



        <button type="submit" class="button-ungu button4" name="btn-signup">&nbsp; kemaskini Pengajian</button>

        </div>

    </form>


</section>