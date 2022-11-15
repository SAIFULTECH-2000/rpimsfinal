<div id="back-borang">
    <a href="<?= base_url('auth') ?>"><button class="button"
            style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>
<section class="form-section">

    <form method="post" class="borang">
        <h4><b><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;Kemaskini Profil</b></h4>
        <hr>
        <table class="form-table">

            <?php
            if (isset($msg)) {
                echo $msg;
            }
            ?>
            <br>
            <tr>
                <td>
                    <b>No Pekerja :</b>
                    <br>
                    <input type="text" placeholder="" name="NoPekerja" value="<?= $query2['NoPekerja'] ?>"
                        data-toggle='tooltip' data-placement='left'
                        title='Sila isikan No Pekerja yang sesuai. Contoh format kod : 000001.' readonly />
                </td>
                <td>
                    <b>No Kad Pengenalan :</b>
                    <br>
                    <input type="text" placeholder="" name="NoICStaf" value="<?= $query2['NoICStaf'] ?>"
                        data-toggle='tooltip' data-placement='left'
                        title='Sila isikan No Kad Pengenalan yang sesuai. Contoh format : 911111081111.' />
                </td>
                <td></td>
            </tr>
            <tr>
                <td colspan="3">
                    <b>Nama Staf :</b>
                    <br>
                    <input type="text" style="width:400px; text-transform:uppercase;" placeholder="" name="NamaStaf"
                        value="<?= $query2['NamaStaf'] ?>" required />
                </td>
            </tr>


            <tr>

                <td>
                    <b>Jabatan :</b>
                    <br>
                    <?php

                    $result = $this->db->query("SELECT KodJab, NamaJabBhg from jabatan WHERE status='active' ORDER BY NamaJabBhg ASC")->result_array();

                    echo "<select name='KodJab' value='KodJab' required>";
                    echo '<option value="" disabled selected hidden>&nbsp&nbsp--</option>';

                    foreach ($result as $row) {
                        if ($row['KodJab'] == $query2['KodJab']) {
                            echo '<option value="' . $row['KodJab'] . '" selected>' . $row['NamaJabBhg'] . ' &nbsp;(' . $row['KodJab'] . ')</option>';
                        } else {
                            echo '<option value="' . $row['KodJab'] . '" >' . $row['NamaJabBhg'] . ' &nbsp;(' . $row['KodJab'] . ')</option>';
                        }
                    }

                    echo "</select>";
                    ?>
                </td>
                <td>
                    <b>Kampus :</b>
                    <br>
                    <?php

                    $result = $this->db->query("SELECT KodKampus, NamaKampus from kampus WHERE status='active' ORDER BY NamaKampus ASC")->result_array();

                    echo "<select name='KodKampus' value='KodKampus' required>";
                    echo '<option value="" disabled selected hidden>&nbsp&nbsp--</option>';

                    foreach ($result as $row) {
                        if ($row['KodKampus'] == $query2['KodKampus'])
                            echo '<option value="' . $row['KodKampus'] . '"selected>' . $row['NamaKampus'] . '</option>';
                        else
                            echo '<option value="' . $row['KodKampus'] . '">' . $row['NamaKampus'] . '</option>';
                    }
                    echo "</select>";
                    ?>
                </td>
                <td>
                    <b>Jantina :</b>
                    <br>
                    <select name="Jantina" value="Jantina" required>
                        <option value="" disabled selected hidden>&nbsp;--</option>
                        <option value="LELAKI" <?php if ($query2['Jantina'] == "LELAKI") {
                                                    echo "selected";
                                                } ?>>LELAKI</option>
                        <option value="PEREMPUAN" <?php if ($query2['Jantina'] == "PEREMPUAN") {
                                                        echo "selected";
                                                    } ?>>PEREMPUAN</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <b>Emel :</b>
                    <br>
                    <input type="email" placeholder="" name="Emel" value="<?= $query2['Emel'] ?> " />
                </td>
                <td>
                    <b>Telefon Bilik :</b>
                    <br>
                    <input type="text" placeholder="" name="TelBilik" value="<?= $query2['TelBilik'] ?>" />
                </td>
                <td>
                    <b>Telefon Mobil :</b>
                    <br>
                    <input type="text" placeholder="" name="TelMobil" value="<?= $query2['TelMobil'] ?>" />
                </td>
            </tr>
            <tr>
                <?php if ($this->session->userdata('role_id') != 4 && $this->session->userdata('role_id') != 1) { ?>
                <td>
                    <b>Gred Jawatan :</b>
                    <br>
                    <select name="GredJawatan" value="GredJawatan">
                        <option value="" disabled selected hidden>&nbsp;--</option>
                        <option value="VK7" <?php if ($query2['GredJawatan'] == "VK7") {
                                                    echo "selected";
                                                } ?>>Professor(VK7)</option>
                        <option value="DM54" <?php if ($query2['GredJawatan'] == "DM54") {
                                                        echo "selected";
                                                    } ?>>Professor Madya(DM54)</option>
                        <option value="DM53" <?php if ($query2['GredJawatan'] == "DM53") {
                                                        echo "selected";
                                                    } ?>>Professor Madya(DM53)</option>
                        <option value="DM52" <?php if ($query2['GredJawatan'] == "DM52") {
                                                        echo "selected";
                                                    } ?>>Pensyarah Kanan(DM52)</option>
                        <option value="DM51" <?php if ($query2['GredJawatan'] == "DM51") {
                                                        echo "selected";
                                                    } ?>>Pensyarah Kanan(DM51)</option>
                        <option value="DM46" <?php if ($query2['GredJawatan'] == "DM46") {
                                                        echo "selected";
                                                    } ?>>Pensyarah(DM46)</option>
                        <option value="DM45" <?php if ($query2['GredJawatan'] == "DM45") {
                                                        echo "selected";
                                                    } ?>>Pensyarah(DM45)</option>
                    </select>
                </td>
                <?php } ?>
                <td>
                    <b>Tarikh Mula Khidmat :</b>
                    <br>
                    <input type="date" placeholder="" name="TarikhMulaKhidmat"
                        value="<?= $query2['TarikhMulaKhidmat'] ?>" />
                </td>
                <td>
                    <b>Tarikh Pencen :</b>
                    <br>
                    <input type="date" placeholder="" name="TarikhPencen" value="<?= $query2['TarikhPencen'] ?>" />
                </td>
            </tr>
            <tr>
                <td>
                    <b>Jenis Lantikan :</b>
                    <br>
                    <select name="JenisLantikan" value="JenisLantikan">
                        <option value="" disabled selected hidden>&nbsp;--</option>
                        <option value="TETAP" <?php if ($query2['JenisLantikan'] == 'TETAP') {
                                                    echo 'selected';
                                                } ?>>TETAP</option>
                        <option value="SEMENTARA" <?php if ($query2['JenisLantikan'] == 'SEMENTARA') {
                                                        echo 'selected';
                                                    } ?>>SEMENTARA</option>
                    </select>
                </td>
                <td>
                    <b>No Bilik Pejabat :</b>
                    <br>
                    <input type="text" name="bilikpejabat" value="<?= $query2['bilik_pejabat'] ?>" />
                </td>

                <td>
                    <button type="submit" class="button-ungu button4" name="btn-signup"
                        value="Update">Kemaskini</button>
                </td>
            </tr>
        </table>
    </form>
</section>