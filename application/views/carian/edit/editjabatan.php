<div id="back-borang">
    <a href="<?=base_url('urusmaklumat')?>"><button class="button"
            style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>
<section class="form-section">
    <form method="post" class="borang">

        <h4><b><i class="fa fa-building-o" aria-hidden="true"></i>&nbsp;&nbsp;KEMASKINI BIDANG</b></h4>
        <hr>

        <?php
            if (isset($msg)) {
                echo $msg;
            }
        ?>

        <br />

        <b>Kod Bidang :</b>
        <br />
        <input type="text" placeholder="" name="KodJab" value="<?=$row['KodJab']?>" readonly />
        <br /><br />


        <b>Nama Bidang :</b>
        <br />
        <input type="text" class="form-control" placeholder="" value="<?=$row['NamaJabBhg']?> " name="NamaJabBhg"
            required />
        <br /><br />


        <button type="submit" class="button-ungu button4" name="btn-signup" value="Daftar">KEMASKINI BIDANG</button>
    </form>




</section>