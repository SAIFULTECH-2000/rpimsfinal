<link href="<?=base_url('assets/sbadmin/')?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<div id="back-senarai">
    <a href="<?=base_url('carian')?>"><button class="button"
            style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a>
</div>
<section>
    <center>
        <form method='POST' class="cari">
            <div class="row col-lg-11">
                <div class="col col-lg-2">
                </div>
                <div class="input-group col col-lg-6" style="padding:0;">
                    <input type="text" class="form-control" placeholder="ISIKAN CARIAN" name="search" id="search"
                        value="<?=set_value('search')?>" style="text-transform:uppercase;">
                    <span class="input-group-addon" style="padding:0;">
                        <select width="100%" id="carian" name="carian" class="form-control"
                            style="border:0; background-color:#e9ecef;">
                            <option value="active" <?php if($carian == "active"){ echo "selected"; } ?>>AKTIF</option>
                            <option value="inactive" <?php if($carian == "inactive"){ echo "selected"; } ?>>TIDAK AKTIF
                            </option>
                        </select>
                    </span>
                </div>
                <div class="col col-lg-1">
                    <button type='submit' class='button1 button4 button2' name='submit'>CARI</button>
                </div>
                <div class="col col-lg-2">
                </div>
            </div>
            <!--input type='text' placeholder='ISIKAN PENSYARAH UNTUK DICARI' name='search' value="<?php echo $input;?>" style="text-transform:uppercase;"/>
            <button type='submit' class='button1 button4 button2' name='submit'>CARI</button-->
        </form>
    </center>
    <br><br>

    <?php
    if(!empty($hasil))
	{
        if(!empty($search))
        {
        ?>
    <font size='5'><i class='fa fa-search' aria-hidden='true'></i>&nbsp;HASIL CARIAN BAGI <font color='purple'
            style="font-weight:bold;"><?php echo strtoupper($search); ?></font>
    </font>
    <br />
    <?php
        }
    }
	?>
    <b>
        <font size='5'><i class='fa fa-user' aria-hidden='true'></i>&nbsp;SENARAI STAF <font color='purple'>
                (<?= $status; ?>)</font>
        </font>
    </b>
    <br />
    <br />
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="20%">
                                <center>Bil.</center>
                            </th>
                            <th width="20%">
                                <center>No Pekerja</center>
                            </th>
                            <th width="30%">
                                <center>Nama Staf</center>
                            </th>
                            <th width="30%">
                                <center>Tindakan</center>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
					

			
                    $i = 0;
					foreach ($result as $row)
					{
                        $i++;
                        echo "
                            <tr>
                                <td><center>".$i.".</center></td>
								<td><center>".$row["NoPekerja"]."</center></td>
								<td>". strtoupper($row["NamaStaf"])."</td>
                                <td>
                                   
                                    <form method='post' action=".base_url('carian/profile_staf').">
                                    <input type='hidden' name='NoPekerja' value='$row[NoPekerja]'>
                                    <Button type='submit' name='profile' class='btn btn-warning btn-sm' style='color:green;'  ><i class='fa fa-user-circle' aria-hidden='true'></i>Profile</Button>
                                    </form>
                                    <form method='post' action=".base_url('carian/kemaskini_staf').">
                                    <input type='hidden' name='NoPekerja' value='$row[NoPekerja]'>
                                    <Button type='submit' name='kemaskini' class='btn btn-primary btn-sm'  style='color:blue;  ><i class='fa fa-pencil-square-o' aria-hidden='true'></i>Kemaskini</Button>
                                    </form>
                                    <form method='post' action=".base_url('carian/padam_staf').">
                                    <input type='hidden' name='NoPekerja' value='$row[NoPekerja]'>
                                    <Button type='submit' name='profile' class='btn btn-danger btn-sm'  style='color:blue; value='Padam'  ><i class='fa fa-trash-o' aria-hidden='true'></i>Padam</Button>
                                    </form>
                                </td>
							</tr>";
                    }
                    if($i == 0)
                    {
                        ?>
                        <tr>
                            <td colspan="4" style="font-style:italic; color:red; font-weight:bold;">Maaf, tiada data
                                dijumpai.</td>
                        </tr>
                        <?php
                    }
                ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


</section>

<script src="<?=base_url('assets/sbadmin/')?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url('assets/sbadmin/')?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?=base_url('assets/sbadmin/')?>js/demo/datatables-demo.js"></script>
<!-- // END CONTENT SECTION -->