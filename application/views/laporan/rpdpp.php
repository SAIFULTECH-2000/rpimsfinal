<section>
    <a href="<?= base_url('laporan') ?>"><button class="button"
            style="vertical-align:middle"><span><b>KEMBALI</b></span></button></a>
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Resource Person</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $trp['total'] ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Pensyarah</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $tp['total'] ?></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Subjek
                            </div>
                            <div class="row no-gutters align-items-center">
                                <table>
                                    <tr>
                                        <td>Diploma</td>
                                        <td>:</td>
                                        <td><?= $pratd['total'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Diploma</td>
                                        <td>:</td>
                                        <td><?= $td['total'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Sarjana Muda</td>
                                        <td>:</td>
                                        <td><?= $tsm['total'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Sarjana</td>
                                        <td>:</td>
                                        <td><?= $ts['total'] ?></td>
                                    </tr>
                                </table>
                                <?php
                                $totalsubjek = $td['total'] + $tsm['total'] + $ts['total'];
                                ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Jumlah Subjek Tiada RP</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                <?php
                                $jstrp = 0;
                                $jstrp = $totalsubjek - $trp['total'];;

                                ?>
                                <a href="<?= base_url('laporan/list_subjek_tiada_rp') ?>"><?= $jstrp ?></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <br />
    <div id="table-wrapper">
        <div id="table-scroll">
            <table align="center" class="data-table">
                <tr>
                    <th class='col-xs-1'>
                        <center>BIL.</center>
                    </th>
                    <th class='col-xs-2'>
                        <center>KOD KURSUS</center>
                    </th>
                    <th class='col-xs-8'>
                        <center>NAMA KURSUS</center>
                    </th>
                    <th class='col-xs-8'>
                        <center>NAMA</center>
                    </th>
                    <th class='col-xs-8'>
                        <center>NO PEKERJA</center>
                    </th>
                    <th class='col-xs-8'>
                        <center>KAMPUS</center>
                    </th>
                    <th class='col-xs-8'>
                        <center>BIDANG</center>
                    </th>
                    <th class='col-xs-8'>
                        <center>Tempoh</center>
                    </th>
                </tr>
                <?php
                echo "<br><p><b><font size = '5'>  &nbsp Laporan RP dibawah BIDANG</font></b></p>";
                $no = 1;
                foreach ($result as $row) {
                    echo "
                            <tr>
								<td><center>" . $no . ".</center></td>
								<td><center>" . $row["KodKursus"] . "</center></td>
                                <td><center>" . $row["NamaKursus"] . "</center></td>
								<td>" . $row["NamaStaf"] . "</td>
                                <td><center>" . $row["NoPekerja"] . "</center></td>
                                <td><center>" . $row["NamaKampus"] . "</center></td>
                                <td><center>" . $row["NamaJabBhg"] . "</center></td>
								<td>" . date('d/m/Y', strtotime($row["TarikhMula"])) . "<br> - <br>" . date('d/m/Y', strtotime($row["TarikhTamat"])) . "</td>
							</tr>";
                    $no++;
                }

                ?>

            </table>
        </div>
    </div>

</section>