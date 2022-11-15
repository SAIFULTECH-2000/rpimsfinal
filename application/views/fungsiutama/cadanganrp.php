 <div id="back-kiri">
		<a href="<?=base_url('fungsiutama')?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>

<section class="small-section">
	<?php
	$output = NULL;
	$output2 = NULL;
	$head = NULL;
	if(!empty($_POST['search']))
    {
        $input = $_POST['search'];
    }
	?>
    <center>

	<table class="search-table">
        <tr>
            <td colspan='4'>
                <center>
                <b><font size = '5'> <br> <i class='fa fa-address-card-o' aria-hidden='true'></i>&nbsp CADANGAN RESOURCE PERSON</font></b>
                <br>
                <hr>
                <br>
                <b>PERHATIAN : </b>
                <br><br>
                Sila masukkan <b>Kod Kursus</b> untuk menjana senarai<br> pensyarah yang layak untuk menjadi sebagai RP kursus tersebut.
                <br><br><br>
                <form method='POST' class="cari">
                    <input type='TEXT' name='search' style="text-transform: uppercase;" value="<?=set_value('search')?>"/>
                    <button type='submit' class='button1 button4 button2' name='submit'>CARI</button>
                </form>
                <br>
                <?php
                if(isset($search))
                { 
                    ?>
                    <p align='left'><b><font size = '5'><i class='fa fa-search' aria-hidden='true'></i>&nbsp;CADANGAN RP BAGI KURSUS <font color='purple'><?php echo strtoupper($search); ?></font></font></b></p>
                    <div id='table-wrapper'>
                        <div id='table-scroll'>	
                            <table align='center' style="width:100%;">
                                <tr>
                                    <th class='col-xs-1'><center>Bil.</center></th>
                                    <th class='col-xs-1'><center>No Pekerja</center></th>
                                    <th colspan='2'>Nama Staf</th>
                                    <th class='col-xs-1'><center>Tindakan</center></th>
                                </tr>
                            <?php
                            $no = 0;
                            $rp = false;
                            $rp_next = false;
                           
                                foreach($result as $row)
                                {
                                    $no++;
                                    $KodKursus = $row['KodKursus'];
                                    $NoPekerja = $row['NoPekerja'];
                                    $NamaStaf = $row['NamaStaf'];
                                    if($row['rp'] == "ya")
                                    {
                                        $rp = true;
                                        ?>
                                            <tr>
                                                <td bgcolor='#F1C40F'><center><?php echo $no; ?>.</center></td>
                                                <td bgcolor='#F1C40F'><center><?php echo $NoPekerja; ?></center></td>
                                                <td bgcolor='#F1C40F'><?php echo $NamaStaf; ?></td>
                                                <td class="col-xs-3" bgcolor='#F1C40F' style="font-weight:bold; text-align:right;">RP KURSUS <?php echo strtoupper($search); ?></td>
                                                <td bgcolor='#F1C40F'><center><a href="<?=base_url('urusmaklumat/daftar_perlantikan_rp')?>/<?= $NoPekerja?>/<?=set_value('search')?>" style="color:green;" data-toggle="tooltip" data-placement="bottom" title="Lantik RP"><i class="fa fa-refresh" aria-hidden="true"></i></a></center></td>
                                            </tr>
                                        <?php
                                    }
                                    else
                                    {
                                        $rp_next = true;
                                        ?>
                                            <tr>
                                                <td><center><?php echo $no; ?>.</center></td>
                                                <td><center><?php echo $NoPekerja; ?></center></td>
                                                <td colspan="2"><?php echo $NamaStaf; ?></td>
                                                <td><center><a href="<?=base_url('urusmaklumat/daftar_perlantikan_rp')?>/<?= $NoPekerja?>/<?=set_value('search')?>" style="color:blue;" data-toggle="tooltip" data-placement="bottom" title="Lantik RP"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></center></td>
                                            </tr>
                                        <?php
                                    }
                                }
                                if(!$rp_next)
                                {
                                    ?>
                                    <tr>
                                        <td colspan='5' style='color:red; font-weight:bold; font-style:italic;'><center>Maaf, tiada pensyarah lain yang sesuai.</center></td>
                                    </tr>
                                    <?php
                                }
                            
                            if($no==0)
                            {
                                ?>
                                <tr>
                                    <td colspan='5' style='color:red; font-weight:bold; font-style:italic;'><center>Maaf, tiada maklumat dijumpai.</center></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </table>
                        </div>
                    </div>
                    <?php
                }
            ?>
            </center>
            </td>
        </tr>
        
    </table>
    <a href="<?=base_url('urusmaklumat/daftar_perlantikan_rp')?>/" style="color:green;" data-toggle="tooltip" data-placement="bottom" title="Lantik RP"><i class="fa fa-refresh" aria-hidden="true"></i>Lantikan Baru</a>
    </center>

</section>