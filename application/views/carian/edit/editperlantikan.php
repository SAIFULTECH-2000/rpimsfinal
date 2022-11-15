
<?php if($this->uri->segment('3')){?>
    <div id="back-borang">
    <a href="<?=base_url('carian/perlantikan_yg_perlu_pengesahan')?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>
    <?php }else{?>
        <div id="back-borang">
    <a href="<?=base_url('carian')?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>
        <?php }?>

<section class="form-section">
    <form method="post" enctype="multipart/form-data" class="borang" >
        <h4><b><i class="fa fa-university " aria-hidden="true"></i>&nbsp;&nbsp;Kemaskini Perlantikan</b></h4>
        <hr>
        <?php
            if (isset($msg)) 
            {
                echo $msg;
            }
        ?>

        <table class="form-table">
            <tr>
                <td colspan="2">
                    <b>Kursus :<?=$row['KodKursus']?>(<?=$row['NamaKursus']?>)</b>
                    <br>
                        
                        <br>
                    </div><br><br>
                </td>
                <td>
                  
                </td>
            </tr>
            <tr>
                <td colspan="2">

                    <b>Pensyarah :<?=$row['NamaStaf']?></b>
                    <br>
                  <input type="hidden" name="NamaStaf" value="<?=$row['NamaStaf']?>" />
                  <input type="hidden" name="id" value="<?=$row['id']?>" />
                     
                    <br><br>
                </td>
              
            </tr>
            <tr>
                <td>
                    <b>Tarikh Mula :<?=$row['TarikhMula']?></b>
                    <br>
                    <!-- <input type="date" class="form-control" placeholder="Tarikh Mula" name="TarikhMula" required  /> -->
                    <br><br>
                </td>
                <td>
                    <b>Tarikh Tamat :<?=$row['TarikhTamat']?></b>
                    <br>
                    <!-- <input type="date" class="form-control" placeholder="" name="TarikhTamat" va required  /> -->
                    <br><br>
                </td>
                <td></td>
            </tr>
            <?php if( $this->session->userdata('role_id')==1){?>
            <tr>
                <td>
                DIsahkan
                <select name="disahkan" value="disahkan" required>
                    <option value="Sah" selected>&nbsp;&nbsp;Sah</option>
                      <option value="Belum Disahkan">&nbsp;&nbsp;Belum disahkan</option>
                    </select>

                </td>
            </tr>
            <?php } ?>

            <?php if( $this->session->userdata('role_id')==4){ ?>
               <tr>
                <td>
                <b>Tarikh Surat:</b>
                <input type="date" class="form-control" placeholder="" name="tarikhsurat"  />
                </td>
               </tr>
            <?php }?>
            <tr>
                <td colspan="3">
                    <button type="submit" class="button-ungu button4" name="btn-signup">Kemaskini Perlantikan</button>
                </td>
            </tr>
        </table>         
    </form>
</section>