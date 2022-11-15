

<script type='text/javascript'>
function confirmDelete()
{
   return confirm("Teruskan untuk hapus staf?");
}
</script>


<section class="form-section">
<div id="back-borang">
    <a href="<?=base_url('carian/staf')?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>
<form method="post" class="borang">
<table>
      
        <h2><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;&nbsp;Kemaskini Staf</h2>
        <hr>
        
        
      
        <?php
          if (isset($msg)) {
           echo $msg;
          }
          ?>

          <br>



        <b>No Pekerja :<?= $query2['NoPekerja']; ?></b>
        <br>
        <div class="tooltip">
          <input type="hidden" name="NoICStaf" value="<?=$query2['NoICStaf']?>"/>
          
        <input type="text" placeholder="" name="NoPekerja" value="<?= $query2['NoPekerja']; ?>" readonly="readonly" required/>
        <span class="">
          
        </span>
        </div><br><br>

        <b>Nama Staf :<?= $query2['NamaStaf']; ?></b>
        <br>
        <div class="tooltip">

        <input type="text" placeholder="" name="NamaStaf" value="<?= $query2['NamaStaf']; ?>" readonly="readonly" required  />
        <span class=""></span>
        </div><br><br>

        <b>Hapus :</b>
        <br>
        <div class="tooltip">
                    <!--<input type="text" name="status" value="<?php //echo $query2['status']; ?>" /><br />

                    <input type="radio" name="status" value="inactive">Ya<br>-->

         <select name="status" value="status" required>
             <option value="" disabled>&nbsp;&nbsp;Tidak</option>
             <option value="inactive">&nbsp;&nbsp;Ya</option>
         </select>

        <span class="tooltiptext">Tekan <b>hapus</b> untuk hapuskan staf <br>atau <b>batal</b> untuk kembali.</span>
        </div><br><br>

        <button type="submit" class="button1 button4 button2" name = "submit" value = "Update" onclick="return confirmDelete()">Hapus</button> 
    
</table>
      
  </form>

  

</section>
