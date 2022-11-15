
  
<section>


<table>
      <div id="back">
    <a href="<?=base_url('tetapan')?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
  </div>
        <h2><i class="fa fa-id-card-o" aria-hidden="true"></i>&nbsp;&nbsp;MAIL CONFIG</h2>
       
        <hr>
        
        
      
        <?php
          if (isset($msg)) {
           echo $msg;
          }
          ?>

          <br>


   <tr>
       <td>  <b>MAIL:</b><br>
       <div class="tooltip1">
        
        <?=$row['email'] ?>
        <span class=""></span>
        </div>
        </td>
   </tr>
   <tr>
       <td>
       <b>CLIENTID</b>
             <div class="tooltip1">
        
        <?=$row['clientId'] ?>
        <span class=""></span>
        </div>
       </td>
            
    </tr>
    <tr>
        <td>
        <b>CLIENTSECRET</b>
             <div class="tooltip1">
        
        <?=$row['clientSecret'] ?>
        <span class=""></span>
        </div>
        </td>
    </tr>
    <tr>
    <td>
        <b>REFRESHTOKEN</b>
             <div class="tooltip1">
        
        <?=$row['refreshToken'] ?>
        <span class=""></span>
        </div>
        </td>
    </tr>
    <tr>
        <td>
        <a href="<?=base_url('tetapan/kemaskiniemail')?>"><button class="button" style="vertical-align:middle"><span><b>KEMASKINI</b></span></button></a><br><br><br>
        </td>

    </tr>

    </table>
 
  

</section>