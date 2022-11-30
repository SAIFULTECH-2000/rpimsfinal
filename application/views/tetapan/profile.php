<div id="back-menu">
		<a href="<?=base_url('auth')?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>

<section>
        <table align="center" width="90%">
        
            <tr>
                <td colspan="5">
                    <b><font size = "5"> <br> <i class="fa fa-fire" aria-hidden="true"></i>&nbsp Maklumat Penguna</font></b> 
                    
                    <hr>
            </tr>
                    <tr>
            <td>
                <table>
                    <tr>
                        <td>Nama Pengguna </td> 
                        <td>&nbsp;</td>
                        <td>:</td>
                        <td>&nbsp;</td>
                        <td><?= $user['NamaStaf'];  ?></td>
                    </tr>
                    <tr>
                        <td>Email</td> 
                        <td>&nbsp;</td>
                        <td>:</td>
                        <td>&nbsp;</td>
                        <td><?php echo $user['Emel']; ?></td>
                    </tr>

                    <tr>
                        <td>No Pekerja</td> 
                        <td>&nbsp;</td>
                        <td>:</td>
                        <td>&nbsp;</td>
                        <td><?php $user['NoPekerja']; ?></td>
                    </tr>
                    <tr>
                        <td>No IC</td> 
                        <td>&nbsp;</td>
                        <td>:</td>
                        <td>&nbsp;</td>
                        <td><?php $user['NoICStaf']; ?></td>
                    </tr>
                     <tr>
                        <td>BIDANG</td> 
                        <td>&nbsp;</td>
                        <td>:</td>
                        <td>&nbsp;</td>
                        <td><?php $user['KodJab']; ?></td>
                    </tr>
                     <tr>
                        <td>Kampus</td> 
                        <td>&nbsp;</td>
                        <td>:</td>
                        <td>&nbsp;</td>
                        <td><?php $user['KodKampus']; ?></td>
                    </tr>

                </table>
            </td>
        </tr>
        </table>

        

</section>