
  
<section>


<table>
      <div id="back">
    <a href="<?=base_url('tetapan/mail')?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
  </div>
  <form method="post" class="borang">
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
        
      
        <span class="">
        <input type="text" placeholder="" class="form-control" name="email" value="<?=$row['email']?>" data-toggle='tooltip' data-placement='left' title='Sila isikan email. Contoh format : eresourseperson@tmsk.uitm.edu.my.' />
        </span>
        </div>
        </td>
   </tr>
   <tr>
       <td>
       <b>CLIENTID</b>
             <div class="tooltip1">
        
        <span class="">
        <input type="text" placeholder="" class="form-control" name="clientid" value=" <?=$row['clientId'] ?>" data-toggle='tooltip' data-placement='left' title='Sila isikan clientid. Please check at google console' />
        </span>
        </div>
       </td>
            
    </tr>
    <tr>
        <td>
        <b>CLIENTSECRET</b>
             <div class="tooltip1">
        
        <span class="">
        <input type="text" placeholder="" class="form-control" name="clientsecret" value=" <?=$row['clientSecret'] ?>" data-toggle='tooltip' data-placement='left' title='Sila isikan clientSECRET. Please check at google console' />
        </span>
        </div>
        </td>
    </tr>
    <tr>
    <td>
        <b>REFRESHTOKEN</b>
             <div class="tooltip1">
        
       
        <span class="">
        <input type="text" placeholder="" class="form-control" name="refreshtoken" value=" <?=$row['refreshToken'] ?>" data-toggle='tooltip' data-placement='left' title='Sila isikan refreshToken. ' />
      
        </span>
        <br>
        <ul>
            <li style="color:red">Please fill clientId and clientSecret</li>
        </ul>
        <a href="<?=base_url('tetapan/getrefreshToken')?>" target="_blank"><button class="button" type="button" style="vertical-align:middle"><span><b>Get refreshToken</b></span></button></a><br><br><br>
        
        </div>
        </td>
    </tr>
       
    <tr>
        <td>
        <button type="submit" class="button" style="vertical-align:middle"><span><b>KEMASKINI</b></span></button>
        </td>

    </tr>
    </form>
    </table>
 
  

</section>