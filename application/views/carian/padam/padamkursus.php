

 <div id="back">
    <a href="carikursus.php"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
  </div>


<script type='text/javascript'>
function confirmDelete()
{
   return confirm("Teruskan untuk hapus kursus?");
}
</script>

<body>

<section>

  <form method="post" action="">

                    <h2><i class="fa fa-building-o" aria-hidden="true"></i>&nbsp;&nbsp;Kemaskini Kursus</h2>
                    <hr>
                    
                    
                  
                    <?php
                      if (isset($msg)) {
                       echo $msg;
                      }
                      ?>

                    <br>

                    <b>Kod Kursus :<?php echo $row['KodKursus']; ?></b>
                    <br>
                    <div class="tooltip">
                    <input type="text" name="KodKursus" value="<?php echo $row['KodKursus']; ?>" readonly="readonly" />
                    <span class="tooltiptext"><b>Kod Kursus</b> tidak dibenarkan untuk diubah.</span>
                    </div><br><br>
                    <b>Nama Kursus :<?php echo $row['NamaKursus']; ?></b>
                    <br>
                    <div class="tooltip">
                    <input type="text" name="NamaKursus" value="<?php echo $row['NamaKursus']; ?>" readonly="readonly" />
                    <span class="tooltiptext"><b>Kod Kursus</b> tidak dibenarkan untuk diubah.</span>
                    </div><br><br>

                   

                    <span class="tooltiptext">Tekan <b>hapus</b> untuk hapuskan jabatan <br>atau <b>batal</b> untuk kembali.</span>
                    </div><br><br>

                    <button type="submit" class="button1 button4 button2" name = "submit" value = "Update" onclick="return confirmDelete()">Hapus</button> 



  </form>

  

</section>
