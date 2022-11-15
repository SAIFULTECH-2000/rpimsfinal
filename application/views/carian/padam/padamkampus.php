

<script type='text/javascript'>
function confirmDelete()
{
   return confirm("Teruskan untuk hapus kampus?");
}
</script>


<section>

<div id="back">
    <a href="<?=base_url('carian/kampus')?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>
  <form method="post" action="">

                    <h2><i class="fa fa-building-o" aria-hidden="true"></i>&nbsp;&nbsp;Hapus Kampus</h2>
                    <hr>
                    
                    
                  
                    <?php
                      if (isset($msg)) {
                       echo $msg;
                      }
                      ?>

                    <br>

                    <b>Kod Kampus :<?=$row['KodKampus']; ?></b>
                    <br>
                    <div class="tooltip">
                    <input type="text" name="KodKampus" value="<?=$row['KodKampus']; ?>" readonly="readonly" />
                    <span class="tooltiptext"><b>Kod Kampus</b> tidak dibenarkan untuk diubah.</span>
                    </div><br><br>

                    <b>Nama Kampus:<?=$row['NamaKampus']; ?></b>
                    <br>
                    <div class="tooltip">
                    <input type="text" name="NamaKampus" value="<?=$row['NamaKampus']; ?>" readonly="readonly" />
                    <span class="tooltiptext"><b>Kod Kampus</b> tidak dibenarkan untuk diubah.</span>
                    </div><br><br>


                    <span class="tooltiptext">Tekan <b>hapus</b> untuk hapuskan kampus <br>atau <b>batal</b> untuk kembali.</span>
                    </div><br><br>

                    <button type="submit" class="button1 button4 button2" name = "submit" value = "Update" onclick="return confirmDelete()">Hapus</button> 



  </form>

 

</section>