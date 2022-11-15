
<div id="back">
    <a href="carisubjek.php"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>

<script type='text/javascript'>
function confirmDelete()
{
   return confirm("Teruskan untuk hapus subjek?");
}
</script>

<body>

<section>

  <form method="post" action="">

                    <h2><i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp;&nbsp;Hapus Subjek</h2>
                    <hr>
                    
                    
                  
                    <?php
                      if (isset($msg)) {
                       echo $msg;
                      }
                      ?>

                    <br>

                    <b>Kod Program :</b>
                    <br>
                    <div class="tooltip">
                    <input type="text" name="KodProgram" value="<?php echo $query2['KodProgram']; ?>" readonly="readonly" />
                    <span class="tooltiptext"><b>Kod Program</b> tidak dibenarkan untuk diubah.</span>
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

                    <span class="tooltiptext">Tekan <b>hapus</b> untuk hapuskan jabatan <br>atau <b>batal</b> untuk kembali.</span>
                    </div><br><br>

                    <button type="submit" class="button1 button4 button2" name = "submit" value = "Update" onclick="return confirmDelete()">Hapus</button> 


  </form>

 

</section>