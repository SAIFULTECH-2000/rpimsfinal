<div id="back-borang">
    <a href="<?=base_url('carian/semester')?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>


<section class="form-section">
        <form method="post" class="borang">
        <h4><b><i class="fa fa-paper-plane" aria-hidden="true"></i>&nbsp;&nbsp;kemaskini Semester</b></h4>
        <hr>
        
        
      
        <?php
          if (isset($msg)) {
           echo $msg;
          }
          ?>

          <br>

        <b>Kod Semester :</b>
        <br>
        <input type="text" placeholder="" name="KodSem" value="<?=$row['KodSem']?>" readonly />
        <br/><br/>
        


        <b>Nama Semester :</b>
        <br>
        <input type="text" class="form-control" placeholder="" name="NamaSem" value="<?=$row['NamaSem']?>" required />
        <br/><br/>

        
        
        <button type="submit" class="button-ungu button4" name="btn-signup">&nbsp; kemaskini Semester</button> 
            
        </div> 
      
      </form>


</section>