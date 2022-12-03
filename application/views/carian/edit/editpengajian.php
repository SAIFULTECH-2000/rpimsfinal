<div id="back-borang">
    <a href="<?=base_url('carian')?>"><button class="button"
            style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>


<section class="form-section">
    <form method="post" class="borang">
        <h4><b><i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;&nbsp;Kemaskini Pengajian</b></h4>
        <hr>



        <?php
          if (isset($msg)) {
           echo $msg;
          }
          ?>

        <br>

        <b>Kemaskini Pengajian :</b>
        <br>
        <input type="text" placeholder="" name="title" value="<?=$result['title']?>" required />
        <input type="hidden" name="id" value="<?=$id?>" />
        <br /><br />



        <button type="submit" class="button-ungu button4" name="btn-signup">&nbsp; kemaskini Pengajian</button>

        </div>

    </form>


</section>