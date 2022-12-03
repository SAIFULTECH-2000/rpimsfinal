<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
body {
    margin-left: 70px;
}

@media print {


    button {
        display: none !important;
    }

}
</style>

<body>
    <div style="page-break-after: always;">
        <?php
		$tarikhsurat = date_create($row["tarikhsurat"]);
		$datamula = date_create($row["TarikhMula"]);
		$datatamat = date_create($row["TarikhTamat"]); ?>
        <table width='100%' style='border-collapse: collapse;'>
            <tr>
                <td colspan="8" width="100" style="text-align: right;">

                </td>
            </tr>
            <tr>
                <td colspan="7" width="70%"
                    style='text-align:right;background-color: rgb(51, 51, 94)!important;color: white;padding-top:20px ;padding-right: 50px;'>
                    www.uitm.edu.my</td>
                <td width="30%"
                    style='text-align:right;background-color:  rgb(145, 145, 179)!important;color: white;padding-top:20px ;padding-right: 50px;'>

                </td>
            </tr>
            <tr>
                <td colspan="8" width="100" style="text-align: right;">
                    <img src="<?= base_url('assets/img/logofskm2.jpg') ?>" width="250px">
                </td>
            </tr>

            <tr>
                <td colspan="8" width="100" style="text-align: right;">
                    <div align="right">
                        <table>
                            <tr>
                                <td>Surat Kami</td>
                                <td>:</td>
                                <td> 500-FSKM(AKA. 23/4/12)</td>
                            </tr>
                            <tr>
                                <td>Tarikh</td>
                                <td>:</td>
                                <td><?php echo date_format($tarikhsurat, "d M y") ?></td>
                            </tr>
                        </table>

                    </div>
                </td>
            </tr>

            <tr>
                <td colspan=" 8" width="100" style="text-align:left">
                    <p style="font-family:'Times New Roman', Times, serif">
                        <?= $row['gelaran'] ?> <?= $row["NamaStaf"] ?><br>
                        <?php if ($row['GredJawatan'] == "VK7") {
							echo 'Professor(VK7)';
						}
						if ($row['GredJawatan'] == "DM54") {
							echo "Professor Madya(DM54)";
						}
						if ($row['GredJawatan'] == "DM53") {
							echo "Professor Madya(DM53)";
						}
						if ($row['GredJawatan'] == "DM52") {
							echo "Pensyarah Kanan(DM52)";
						}
						if ($row['GredJawatan'] == "DM51") {
							echo "Pensyarah Kanan(DM51)";
						}
						if ($row['GredJawatan'] == "DM46") {
							echo "Pensyarah(DM46)";
						}
						if ($row['GredJawatan'] == "DM45") {
							echo "Pensyarah(DM45)";
						} ?><br>
                        <?php 
                        $KodJab = $row['KodJab'];
                       $pengajian= $this->db->query("SELECT * FROM pengajian inner join bidangdalampengajian on pengajian.id = bidangdalampengajian.pengajianid where bidangid = '$KodJab'")->row_array();    
                        if(isset($pengajian)){
                       ?>

                        <?=$pengajian['title'] ?>
                        <?php }?>
                        <br>
                        KOLEJ PENGKOMPUTERAN, INFORMATIK DAN MEDIA<br>
                        Universiti Teknologi MARA<br><br>

                        <?php $gelaran ?><br>
                        <b>
                            PELANTIKAN SEBAGAI RESOURCE PERSON (RP)<br>
                            &nbsp;KOD KURSUS&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <?= $row['KodKursus'] ?><br>
                            &nbsp;NAMA KURSUS&nbsp;&nbsp;&nbsp; : <?= $row["NamaKursus"] ?>
                        </b><br><br>
                        Dengan hormatnya , perkara di atas adalah dirujuk.<br><br>
                        2.&nbsp;&nbsp; Sukacita dimaklumkan bahawa tuan/puan dengai ini dilantik sebagai <b>Resourse
                            Person
                            (RP)</b>
                        kursus<br>
                        fakulti berdasarkan kepakaran dan pengalaman mengajar kod berkenaan.<br><br>
                        3.&nbsp;&nbsp;Syarat-syarat pelantikan tuan/puan sebagai Resourse Person adalah seperti
                        berikut:<br><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;i. Tempoh pelantikan adalah mulai <b>
                            <?php

							echo date_format($datamula, "d M Y") ?> sehingga <?= date_format($datatamat, "d") ?>
                            <?= date_format($datatamat, "M Y") ?> </b><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ii. Diberikan kesetaraan jam syarahan (KJS) untuk K3 sebanyak dua
                        (2)
                        jam seminggu.<br><br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;iii. Dikehendaki memenuhi keseluruhan ATP sekurang-kurangnya 39
                        jam
                        seminggu.<br><br>
                        4.&nbsp;&nbsp;Dengan pelantikan ini, pihak Universiti berharap tuan/puan dapat membantu dalam
                        meningkatkan<br>
                        kualiti pembelajaran bagi semua perkara berhubung dengan silibus kursus tersebut.
                        Bersama-sama<br>
                        ini disertakan senarai tugas untuk rujukan dan tindakan lanjut pihak tuan/puan.<br>
                        Sekian, kerjasama dan komitmen yang diberikan dalam menjalankan tugas ini amat dihargai dan<br>
                        didahului dengan ucapan terima kasih.<br><br>

                    </p> <br><br>
                    <!-- <img src="<?= base_url('assets/img/') ?><?= $tetapan['sign'] ?>" width="250px"> -->

                    _____________________________<br>
                    Prof. Ts. Dr Haryani Binti Haron
                    <table>
                        <tr>
                            <td></td>
                            <td> <?= $tetapan['signdetails'] ?><br></td>
                            <td> <img src="<?= base_url('assets/img/') ?><?= $tetapan['logofooter'] ?>" width="250px"
                                    style="text-align: right"></td>
                        </tr>
                    </table>
                </td>
            </tr>

        </table>
    </div>
    <div>
        <center style="text-align: center">
            <h4>
                TUGAS DAN TANGGUNGJAWAB RESOURCE PERSON<br>
                <?= strtoupper($row['gelaran'])
				?> <?= $row["NamaStaf"] ?><br>
                (<?= $row["NamaKursus"] ?>)
            </h4>
        </center><br><br>
        <p>
            <?= $tetapan['tugas'] ?>
            <?= $tetapan['tugas2'] ?>
        </p>
    </div>
    <button onclick="window.print()">Print this page</button>
</body>

</html>