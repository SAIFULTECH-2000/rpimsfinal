<div id="back-borang">
    <a href="<?=base_url('urusmaklumat')?>"><button class="button"
            style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>
<br>
<section>

    <br />
    <h3 align="center">Load Excel Sheet for Register Staff</h3>
    <br />
    <div class="table-responsive">
        <span id="message"></span>
        <form method="post" id="load_excel_form" enctype="multipart/form-data">
            <table class="table">
                <tr>
                    <td width="25%" align="right">Select Excel File</td>
                    <td width="50%"><input type="file" name="file" /></td>
                    <td><input type="hidden" name="files" value="submit"></td>
                    <td width="25%"><input type="submit" name="load" class="btn btn-primary" /></td>
                </tr>
            </table>
        </form>
        <br />


    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">STAF</h6>
            <br>
            <a href="<?=base_url('assets/file/Book1.xls')?>" download>Click Me</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Bil</th>
                            <th>NoPekerja</th>
                            <th>NAMA</th>
                            <th>EMAIL</th>

                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Bil</th>
                            <th>NoPekerja</th>
                            <th>NAMA</th>
                            <th>EMAIL</th>

                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                                    if($test==0){
                                        $i=0;
                                        foreach($result as $row){
                                        if($i!=0){
                                         echo   "
                                            <tr>
                                                <td>$i</td>
                                                <td>".$row[0]."</td>
                                                <td>".$row[1]."</td>
                                                <td>".$row[2]."</td>
                                                
                                            </tr>
                                            ";
                                        }
                                        $i++;
                                        }
                                      
                                      
                                    }
                                   

                                    ?>



                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</section>