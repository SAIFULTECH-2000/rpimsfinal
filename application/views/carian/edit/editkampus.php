<div id="back-borang">
    <a href="<?=base_url('carian/kampus')?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>
 <section class="form-section">
        <form method="post" class="borang">
            <h4><b><i class="fa fa-university " aria-hidden="true"></i>&nbsp;&nbsp;Kemaskini Kamous</b></h4>
            <hr>
            <?php
            if (isset($msg)) 
            {
                echo $msg;
            }
            ?>

            <br/>

            <b>Kod Kampus :</b>
            <br/>
            <input type="text" name="KodKampus" value="<?=$row['KodKampus']?>" readonly  />
            <br/><br/>
            
            <b>Nama Kampus :</b>
            <br/>
            <input type="text" name="NamaKampus" value='<?=$row['NamaKampus']?>' required  />
            <br/><br/>

            <button type="submit" class="button-ungu button4" name="btn-signup">Kemaskini Kampus</button></td>
</form>
 </section>