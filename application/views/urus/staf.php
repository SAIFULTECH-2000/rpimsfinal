<div id="back-borang">
    <a href="<?=base_url('urusmaklumat')?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>
<section class="form-section">

<form method="post" class="borang">
    <h4><b><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;Daftar Staf</b></h4>
    <hr>
    <table class="form-table">
        
        <?php
        if (isset($msg)) 
        {
           echo $msg;
        }
        ?>
        <br>
        <tr>
            <td>
                <b>No Pekerja :</b>
                <br>
                <input type="text" placeholder="" name="NoPekerja" data-toggle='tooltip' data-placement='left' title='Sila isikan No Pekerja yang sesuai. Contoh format kod : 000001.' required/>
            </td>  
            <td>
                <b>No Kad Pengenalan :</b>
                <br>
                <input type="text" placeholder="" name="NoICStaf" data-toggle='tooltip' data-placement='left' title='Sila isikan No Kad Pengenalan yang sesuai. Contoh format : 911111081111.' />
            </td>
            <td></td>
        </tr>
        <tr>
            <td colspan="3">
                <b>Nama Staf :</b>
                <br>
                <input type="text" style="width:400px; text-transform:uppercase;" placeholder="" name="NamaStaf" required  />
            </td> 
        </tr>


        <tr>

            <td>
                <b>BIDANG :</b>
                <br>
                <?php
                   
                    $result = $this->db->query("SELECT KodJab, NamaJabBhg from jabatan WHERE status='active' ORDER BY NamaJabBhg ASC")->result_array();
                    
                    echo "<select name='KodJab' value='KodJab' required>";
                    echo '<option value="" disabled selected hidden>&nbsp&nbsp--</option>';

                   foreach ($result as $row) 
                    {
                        echo '<option value="'.$row['KodJab'].'">'.$row['NamaJabBhg'].' &nbsp;('.$row['KodJab'].')</option>';
                    }

                    echo "</select>";
                ?>
            </td>  
            <td>
                <b>Kampus :</b>
                <br>
                <?php
                   
                    $result=$this->db->query("SELECT KodKampus, NamaKampus from kampus WHERE status='active' ORDER BY NamaKampus ASC")->result_array();
                    
                    echo "<select name='KodKampus' value='KodKampus' required>";
                    echo '<option value="" disabled selected hidden>&nbsp&nbsp--</option>';

                      foreach ($result as $row) 
                    {
                        echo '<option value="'.$row['KodKampus'].'">'.$row['NamaKampus'].'</option>';
                    }
                    echo "</select>";
                ?>
            </td>
            <td>
                <b>Jantina :</b>
                <br>
                <select name="Jantina" value="Jantina" required>
                  <option value="" disabled selected hidden>&nbsp;--</option>
                  <option value="LELAKI">LELAKI</option>
                  <option value="PEREMPUAN">PEREMPUAN</option>
                </select>
            </td>
        </tr>
        <tr>
            <td>
                <b>Emel :</b>
                <br>
                <input type="email"  placeholder="" name="Emel"   />
            </td>
            <td>
                <b>Telefon Bilik :</b>
                <br>
                <input type="text" placeholder="" name="TelBilik"   />
            </td>
            <td>
                <b>Telefon Mobil :</b>
                <br>
                <input type="text" placeholder="" name="TelMobil"   />
            </td>
        </tr>
        <tr>
            <td>
                <b>Gred Jawatan :</b>
                <br>
                <select name="GredJawatan" value="GredJawatan" >
                    <option value="" disabled selected hidden>&nbsp;--</option>
                    <option value="VK7">Professor(VK7)</option> 
                    <option value="DM54">Professor Madya(DM54)</option>
                    <option value="DM53">Professor Madya(DM53)</option>
                    <option value="DM52">Pensyarah Kanan(DM52)</option>
                    <option value="DM51">Pensyarah Kanan(DM51)</option>
                    <option value="DM46">Pensyarah(DM46)</option>
                    <option value="DM45">Pensyarah(DM45)</option>
                </select>
            </td>
            <td>
                <b>Tarikh Mula Khidmat :</b>
                <br>
                <input type="date" placeholder="" name="TarikhMulaKhidmat"   />
            </td>
            <td>
                <b>Tarikh Pencen :</b>
                <br>
                <input type="date" placeholder="" name="TarikhPencen"   />
            </td>
        </tr>
        <tr>
            <td>
                <b>Jenis Lantikan :</b>
                <br>
                <select name="JenisLantikan" value="JenisLantikan" >
                    <option value="" disabled selected hidden>&nbsp;--</option>
                    <option value="TETAP">TETAP</option>
                  <option value="SEMENTARA">SEMENTARA</option>
                </select>
            </td>
            <td>
                <b>Role :</b>
                <br>
                <select name="role" value="role" required>
                  <option value="" disabled selected hidden>&nbsp;--</option>
                  <option value="1">Superadmin</option>
                  <option value="2">KPP</option>
                  <option value="3">Pensyarah</option>
                  <option value="4">Kerani</option>
                </select>
            </td>
            <td> 
                <button type="submit" class="button-ungu button4" name = "btn-signup" value = "Update">Daftar Staf</button>
            </td>
        </tr>
    </table>
</form>
</section>