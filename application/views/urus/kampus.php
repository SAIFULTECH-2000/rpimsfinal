<div id="back-borang">
    <a href="<?=base_url('carian')?>"><button class="button"
            style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>
<section class="form-section">
    <form method="post" class="borang">
        <h4><b><i class="fa fa-university " aria-hidden="true"></i>&nbsp;&nbsp;Daftar Kampus</b></h4>
        <hr>
        <?php
            if (isset($msg)) 
            {
                echo $msg;
            }
            ?>

        <br />

        <b>Kod Kampus :</b>
        <br />
        <input type="text" name="KodKampus" required />
        <br /><br />

        <b>Nama Kampus :</b>
        <br />
        <input type="text" name="NamaKampus" required />
        <br /><br />

        <button type="submit" class="button-ungu button4" name="btn-signup">Daftar Kampus</button></td>
    </form>
</section>