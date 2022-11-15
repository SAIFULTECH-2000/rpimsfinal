<div id="back-borang">
    <a href="<?=base_url('urusmaklumat')?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>
<section class="form-section">
    <form method="post" class="borang">
      
        <h4><b><i class="fa fa-building-o" aria-hidden="true"></i>&nbsp;&nbsp;Daftar Jabatan</b></h4>
        <hr>
        
        <?php
            if (isset($msg)) {
                echo $msg;
            }
        ?>

        <br/>

        <b>Kod Jabatan :</b>
        <br/>
        <input type="text" placeholder="" name="KodJab" required  />
        <br/><br/>
        

        <b>Nama Jabatan :</b>
        <br/>
        <input type="text" class="form-control" placeholder="" name="NamaJabBhg" required  />
        <br/><br/>


        <button type="submit" class="button-ungu button4" name="btn-signup" value="Daftar">Daftar Jabatan</button>
    </form>

        


</section>