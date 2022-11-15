<?php  if(  $role = $this->session->userdata('role_id')!=4){ ?>
    <div id="back-menu">
    <a href="<?= base_url('auth') ?>"><button class="button"
            style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>
<?php }?>

<br>
<section>
    <table align="center">

        <tr>
            <td colspan="5">
                <b>
                    <font size="5"> <br> <i class="fa fa-diamond" aria-hidden="true"></i>&nbsp PROFIL</font>
                </b>
                <hr>
        </tr>

        <tr>
            <td><a href="<?= base_url('user/profile') ?>" class="menu-button">
                    <div class="container"><br><br><b>
                            <font size="5"> <i class="fa fa-address-card-o fa-2x" aria-hidden="true"></i> </font>
                            <br><br>Profil <br></font>
                        </b></div><a>
            </td>

            <td><a href="<?= base_url('user/kemaskini') ?>" class="menu-button">
                    <div class="container"><br><br><b>
                            <font size="5"> <i class="fa fa-user-o fa-2x" aria-hidden="true"></i> </font>
                            <br><br>Kemaskini<br> Profil<br></font>
                        </b></div>
            </td><a>
                <?php if ($this->session->userdata('role_id') != 4 && $this->session->userdata('role_id') != 1) { ?>
                <td><a href="<?= base_url('user/perlantikan') ?>">
                        <div class="container"><br><br> <b>
                                <font size="5"> <i class="fa fa-file-text-o fa-2x" aria-hidden="true"></i> </font>
                                <br><br>Perlantikan RP</font>
                            </b></div>
                </td><a>
                    <?php } ?>

        </tr>


    </table>



</section>