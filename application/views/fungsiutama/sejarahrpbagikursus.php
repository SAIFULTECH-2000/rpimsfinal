 <div id="back-kiri">
		<a href="<?=base_url('fungsiutama')?>"><button class="button" style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a><br><br><br>
</div>

<section class="small-section">



	<?php

	$output = NULL;
	$output2 = NULL;
	$head = NULL;
    $input = '';
   
       
    
	echo "<center>

	<table class='search-table'><tr><td>
	<b><center><font size = '5'> <br> <i class='fa fa-history' aria-hidden='true'></i>&nbsp SEJARAH PERLANTIKAN RESOURCE PERSON</font></b><br><hr><br>

	<b>PERHATIAN : </b><br><br>
	Sila masukkan <b>Kod Kursus</b> untuk <br>menjana senarai Resource Person bagi kursus yang dicari.<br><br><br>
	

	<form method='POST' class='cari'>
		<input type='TEXT' name='search' />
		<button type='submit' class='button1 button4 button2' name='submit'>CARI</button>
	</form></center>";

	if(isset($search))
	{


        echo "<br><p align='left'><b><font size = '5'> <i class='fa fa-search' aria-hidden='true'></i> &nbsp HASIL CARIAN BAGI KURSUS <font color='purple'>$search</font></font></b></p>";

       
            echo "<div id='table-wrapper'>
                    <div id='table-scroll'>	
                        <table align='center'>

                            <th class='col-xs-2'><center>Bil.</center></th>
                            <th class='col-xs-8'><center>Nama Staf</center></th>
                            <th class='col-xs-8'><center>Tempoh</center></th>
                            <th class='col-xs-8'><center>Surat Lantikan</center></th>
                            <th class='col-xs-8'><center>Status</center></th></tr>";
            $i=0;
            foreach($result as $row)
            {
               // var_dump($row);
                $i++;
                $id=$row['id'];
                $KodKursus = $row['KodKursus'];
                $NamaStaf = $row['NamaStaf'];
                $TarikhMula = $row['TarikhMula'];
                $TarikhTamat = $row['TarikhTamat'];
                $status = "tidak aktif";
                $NoPekerja = $row['NoPekerja'];
                if($row['status'] == "active")
                    $status = "aktif";

                $bgcolor = "";
                if(date('Y-m-d') <= date('Y-m-d',strtotime($row['TarikhTamat'])))
                    $bgcolor = "bgcolor='#F1C40F'";
                $output .= "<tr $bgcolor> 
                                <td><center>$i.</td>
                                <td><center>$NamaStaf($NoPekerja)</td>
                                <td><center>".date('d/m/Y', strtotime($TarikhMula))." &nbsp;<b>hingga</b>&nbsp;  ".date('d/m/Y', strtotime($TarikhTamat))."</td>
                                <td><center> <a target='_blank' href='".base_url('surat/view/').$id."'>Papar</a> </td>
                                <td><center>$status</td>
                            </tr>";
            }


        

        if($i ==0)
        {
            $output = "<tr><td colspan='5' bgcolor='#F1C40F'><center>Sila masukkan kod yang betul.</td></tr>";
        }
	}
	?>
	<center>
    <?php
        echo $output; 
	?>
    </center>

<?php 

	echo "</td></tr></table>";

?>


		

</section>