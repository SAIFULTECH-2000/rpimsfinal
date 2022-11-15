


<script type='text/javascript'>
function confirmUpdate()
{
   return confirm("Teruskan untuk hapus program?");
}
</script>

<body>

<section>
<div id="back-borang">
    <a href="<?=base_url('carian/program')?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>

  <form method="post" action="">

                    <h2><i class="fa fa-graduation-cap" aria-hidden="true"></i>&nbsp;&nbsp;Hapus Program</h2>
                    <hr>
                    
                    
                  
                    <?php
                      if (isset($msg)) {
                       echo $msg;
                      }
                      ?>

                    <br>

                    <b>Kod Program :<?php echo $query2['KodProgram']; ?></b>
                    <br>
                    <div class="tooltip">
                    <input type="text" name="KodProgram" value="<?php echo $query2['KodProgram']; ?>" readonly="readonly" />
                    <span class="tooltiptext"><b>Kod Program</b> tidak dibenarkan untuk diubah.</span>
                    </div><br><br>

                    <b>Nama Program :<?php echo $query2['NamaProgram']; ?></b>
                    <br>
                    <div class="tooltip">
                    <input type="text" name="NamaProgram" value="<?php echo $query2['NamaProgram']; ?>" readonly="readonly" />
                    <span class="tooltiptext"><b>Kod Program</b> tidak dibenarkan untuk diubah.</span>
                    </div><br><br>

                    <span class="tooltiptext">Tekan <b>hapus</b> untuk hapuskan jabatan <br>atau <b>batal</b> untuk kembali.</span>
                    </div><br><br>

                    <button type="submit" class="button1 button4 button2" name = "submit" value = "Update" onclick="return confirmUpdate()">Hapus</button> 


  </form>

  

</section>