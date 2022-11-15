
<script type='text/javascript'>
function confirmDelete()
{
   return confirm("Teruskan untuk hapus semester?");
}
</script>

<body>

<section>
<div id="back-borang">
    <a href="<?=base_url('carian/semester')?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>


  <form method="post" action="">

                    <h2><i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;&nbsp;Hapus Semester</h2>
                    <hr>
                    
                    
                  
                    <?php
                      if (isset($msg)) {
                       echo $msg;
                      }
                      ?>

                    <br>

                    <b>Kod Semester :<?php echo $query2['NamaSem']; ?></b>
                    <br>
                    <div class="tooltip">
                    <input type="text" name="KodSem" value="<?php echo $query2['KodSem']; ?>" readonly="readonly" />
                    <span class="tooltiptext"><b>Kod Semester</b> tidak dibenarkan untuk diubah.</span>
                    </div><br><br>

                    <b>Nama Semester :<?php echo $query2['NamaSem']; ?></b>
                    <br>
                    <div class="tooltip">
                    <input type="text" name="NamaSem" value="<?php echo $query2['NamaSem']; ?>" readonly="readonly" required/><br />
                    <span class="tooltiptext">Sila isikan <b>Nama Semester</b> sebenar. <br>Contoh format nama semester : <b>SEMESTER 1 2015</b>.</span>
                    </div><br><br>

                    
                    <span class="tooltiptext">Tekan <b>hapus</b> untuk hapuskan jabatan <br>atau <b>batal</b> untuk kembali.</span>
                    </div><br><br>

                    <button type="submit" class="button1 button4 button2" name = "submit" value = "Update" onclick="return confirmDelete()">Hapus</button> 



  </form>

  

</section>