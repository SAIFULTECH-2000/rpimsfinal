<?php 
    setlocale(LC_ALL, 'ms_MY');
    date_default_timezone_set('Asia/Kuala_Lumpur');
	// session_start();
    // $title = "Laman Utama";
    // $main = true;
    // include('header2.php'); 

    // include('dbconnect.php');
    // $queryperlantikan = mysqli_query($DBcon, "UPDATE PERLANTIKAN set status='inactive' where TarikhTamat<=CAST(CURRENT_TIMESTAMP AS DATE)");
    // $querymovetamat = mysqli_query($DBcon, "INSERT INTO PERLANTIKANTAMAT SELECT * FROM PERLANTIKAN WHERE status='inactive'");
    // $querydeletetamat = mysqli_query($DBcon, "DELETE FROM PERLANTIKAN WHERE status='inactive'");
    // $querystaf = mysqli_query($DBcon, "UPDATE STAF set status='inactive' where TarikhPencen=CAST(CURRENT_TIMESTAMP AS DATE)");
    // $querynoti = mysqli_query($DBcon, "INSERT INTO NOTIFIKASI (NoPekerja, NamaStaf, KodKursus, TarikhMula, TarikhTamat, SuratPerlantikan)
    //                                    SELECT PERLANTIKAN.NoPekerja, STAF.NamaStaf, PERLANTIKAN.KodKursus, PERLANTIKAN.TarikhMula, PERLANTIKAN.TarikhTamat, PERLANTIKAN.SuratPerlantikan FROM PERLANTIKAN
    //                                    INNER JOIN STAF ON PERLANTIKAN.NoPekerja=STAF.NoPekerja 
    //                                    WHERE CURRENT_DATE >= (CAST(TarikhTamat AS DATE) + INTERVAL -1 MONTH)
    //                                    AND  NOT EXISTS (SELECT * 
    //                                                     FROM NOTIFIKASI
    //                                                     WHERE NOTIFIKASI.NoPekerja = PERLANTIKAN.NoPekerja
    //                                                     AND NOTIFIKASI.KodKursus = PERLANTIKAN.KodKursus
    //                                                     AND NOTIFIKASI.TarikhMula = PERLANTIKAN.TarikhMula)");
                                                        
?>
<!DOCTYPE html>
<html>

<head>


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=base_url('assets/')?>css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/')?>css/font-awesome.min.css">
    </link>
    <link rel="stylesheet" href="<?=base_url('assets/')?>css/fonts.css">
    </link>
    <!--link type="text/css" rel="stylesheet" href="css/caristylexx.css"></link>
    <!--link type="text/css" rel="stylesheet" href="css/tables.css"></link>
    <link rel="stylesheet" href="css/bootstrap.min.css"-->
    <link type="text/css" rel="stylesheet" href="<?=base_url('assets/')?>css/all.css?x=<?php echo time(); ?>">
    </link>
    <link rel="shortcut icon" href="<?=base_url('assets/')?>img/fskmlogo.png" />
    <script src="<?=base_url('assets/js/jquery.min.js"')?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.bundle.min.js')?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>
        Laman Utama
    </title>
</head>

<style>
.closebtn {
    margin-left: 15px;
    margin-right: 15px;
    margin-top: 8px;
    color: black;
    font-weight: bold;
    float: right;
    font-size: 22px;
    line-height: 20px;
    cursor: pointer;
    transition: 0.3s;
}

.closebtn:hover {
    color: purple;
}
</style>

<style>
p.round3 {
    border: 1px solid #CAC0CF;
    border-radius: 7px;
    width: 770px;
    padding-top: 14px;
    padding-bottom: 22px;
    padding-left: 5px;
    padding-right: 5px;
    align-self: center;
}

.blink {
    animation: blink-animation 0.2s steps(5, start) infinite;
    -webkit-animation: blink-animation 1s steps(5, start) infinite;
}

@keyframes blink-animation {
    to {
        visibility: hidden;
    }
}

@-webkit-keyframes blink-animation {
    to {
        visibility: hidden;
    }
}
</style>

<!-- HEADER SECTION -->

<body>

    <?php
    // if (isset($_SESSION['message'])) 
    // {
    //     echo "<div id='error_msg'>".$_SESSION['message']."</div>";
    //     unset($_SESSION['message']);
    // }
?>
    <!-- CONTENT SECTION -->

    <script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
    <div class="headerx" id="top">

    </div>

    <div class="header">
        <!--<div id="img1" class="header"><img src="<?=base_url('assets/')?>img/download.jpg">-->
    </div>
    </div>

    <div id="top1">
        <a href="#top"><button class="button0 button4 button2" style="vertical-align:middle"><span><b>
                        <font size="3">&#8679;</font>
                    </b></span></button></a><br><br><br>
    </div>

    <div id="usericon" class="header"><i class="fa fa-user-circle fa-3x" aria-hidden="true"></i></div>
    <div id="admin" class="header"><br>SELAMAT DATANG, <b>

            <?php 

    $str = $this->session->userdata('username');  
    $str = strtoupper($str);
     echo $str;

    ?></b>.<br>

        <!--date and time -->
        <script type="text/javascript">
        tday = new Array("Ahad", "Isnin", "Selasa", "Rabu", "Khamis", "Jumaat", "Sabtu");
        tmonth = new Array("Januari", "Februari", "Mac", "April", "Mei", "Jun", "Julai", "Ogos", "September", "Oktober",
            "November", "Disember");

        function GetClock() {
            var d = new Date();
            var nday = d.getDay(),
                nmonth = d.getMonth(),
                ndate = d.getDate(),
                nyear = d.getYear();
            if (nyear < 1000) nyear += 1900;
            var nhour = d.getHours(),
                nmin = d.getMinutes(),
                nsec = d.getSeconds(),
                ap;

            if (nhour == 0) {
                ap = " AM";
                nhour = 12;
            } else if (nhour < 12) {
                ap = " AM";
            } else if (nhour == 12) {
                ap = " PM";
            } else if (nhour > 12) {
                ap = " PM";
                nhour -= 12;
            }

            if (nmin <= 9) nmin = "0" + nmin;
            if (nsec <= 9) nsec = "0" + nsec;

            document.getElementById('clockbox').innerHTML = "" + tday[nday] + ", " + tmonth[nmonth] + " " + ndate +
                ", " + nyear + "   " + nhour + ":" + nmin + ":" + nsec + ap + "";
        }

        window.onload = function() {
            GetClock();
            setInterval(GetClock, 1000);
        }
        </script>
        <div id="clockbox">

        </div>

    </div>

    <div id="RPMS" class="header" align="right">

        RESOURCE PERSON INFORMATION MANAGEMENT SYSTEM
    </div>

    <!-- // END HEADER SECTION -->


    <!-- SIDE NAVIGATION -->
    <ul class="sidenav">

        <li>
            <div class="w3-accordion">
                <a class="active" onclick="myAccFunc()" href="<?=base_url('auth')?>">Laman Utama &nbsp;&nbsp;<i
                        class="fa fa-caret-down"></i></a>
                <div class="active" id="demoAcc" class="w3-accordion-content">
                    <?php
        $role = $this->session->userdata('role_id');
            if($role == 1||$role ==2)
            {
            ?>
                    <a href="<?=base_url('/fungsiutama')?>" class="w3-white"><i class="fa fa-angle-right"
                            aria-hidden="true"></i><span style="margin-left: 1em; font-size: 13px;"></t>Fungsi Utama</a>
                    <?php
            
            if($role !=2){
            ?>
                    <a href="<?=base_url('/carian')?>" class="w3-white"><i class="fa fa-angle-right"
                            aria-hidden="true"></i><span style="margin-left: 1em; font-size: 13px;">Pencarian</a>
                    <a href="<?=base_url('/urusmaklumat')?>" class="w3-white"><i class="fa fa-angle-right aria-hidden="
                            true"></i><span style="margin-left: 1em; font-size: 13px;">Urus Maklumat</a>
                    <?php } ?>
                    <a href="<?=base_url('/laporan')?>" class="w3-white"><i class="fa fa-angle-right aria-hidden="
                            true"></i><span style="margin-left: 1em; font-size: 13px;">Laporan</a>
                    <a href="<?=base_url('/notifikasi')?>" class="w3-white"><i class="fa fa-angle-right aria-hidden="
                            true"></i><span style="margin-left: 1em; font-size: 13px;">Notifikasi</a>
                    <?php 
                if($role ==1){
                ?>
                    <a href="<?=base_url('/pengesahan')?>" class="w3-white"><i class="fa fa-angle-right aria-hidden="
                            true"></i><span style="margin-left: 1em; font-size: 13px;">Pengesahan</a>
                    <?php
                }}
          ?>
                </div>
            </div>
        </li>
        <?php
     if($role == 1)
            {?>
        <li><a href="<?=base_url('/tetapan')?>"><i class="fa fa-cog" aria-hidden="true"></i> &nbsp; Tetapan
                &nbsp;&nbsp;</a></li>
        <?php }?>
        <li><a href="<?=base_url('/user/profile')?>"><i class="fa fa-user"></i>&nbsp; Profile &nbsp;&nbsp;</a></li>
        <li><a href="<?=base_url('/manual')?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> &nbsp; Manual
                Pengguna &nbsp;&nbsp;</a></li>
        <li><a href="<?=base_url('auth/logout')?>"><i class="fa fa-sign-out" aria-hidden="true"></i> &nbsp; Logout
                &nbsp;&nbsp;</a></li>


    </ul>

    <!-- END SIDE NAVIGATION -->

    <script>
    function myAccFunc() {
        var x = document.getElementById("demoAcc");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
            x.previousElementSibling.className += " w3-pale-red";
        } else {
            x.className = x.className.replace(" w3-show", "");
            x.previousElementSibling.className =
                x.previousElementSibling.className.replace(" w3-pale-red", "");
        }
    }

    function myDropFunc() {
        var x = document.getElementById("demoDrop");
        if (x.className.indexOf("w3-show") == -1) {
            x.className += " w3-show";
            x.previousElementSibling.className += " w3-pale-red";
        } else {
            x.className = x.className.replace(" w3-show", "");
            x.previousElementSibling.className =
                x.previousElementSibling.className.replace(" w3-pale-red", "");
        }
    }
    </script>