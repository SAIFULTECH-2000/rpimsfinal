<div id="back-borang">
    <a href="<?=base_url('carian')?>"><button class="button"
            style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>
<section class="form-section">
    <form method="post" class="borang">

        <h4><b><i class="fa fa-building-o" aria-hidden="true"></i>&nbsp;&nbsp;DAFTAR BIDANG</b></h4>
        <hr>

        <?php
            if (isset($msg)) {
                echo $msg;
            }
        ?>

        <br />

        <b>Kod BIDANG :</b>
        <br />
        <input type="text" placeholder="" name="KodJab" required />
        <br /><br />


        <b>Nama BIDANG :</b>
        <br />
        <input type="text" class="form-control" placeholder="" name="NamaJabBhg" required />
        <br /><br />


        <button type="submit" class="button-ungu button4" name="btn-signup" value="Daftar">DAFTAR BIDANG</button>
    </form>




</section>