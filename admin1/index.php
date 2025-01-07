<?php
//account dimasukkan kedalam session
session_start();

$koneksi = new mysqli("localhost", "root", "", "webmi");

//harus login
if (!isset($_SESSION['admin'])) {
    echo "<script> alert('Anda Belum Login, Silahkan Tekan Ok Untuk Login'); </script>";
    echo "<script> location='login.php'; </script>";
    exit();
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>

<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="background: #858282; color: white">My Admin</a>
            </div>
            <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;"><a href="index.php?hal=logout" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>



        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side " role="navigation">
            <div class="sidebar-collapse" style="background: #706e6e; color: white">
                <ul class="nav" id="main-menu">
                    <li class="text-center">
                        <img src="assets/img/logo.png" class="user-image img-responsive" />
                    </li>


                    <li><a href="index.php"><i class="fa fa-home "></i> Admin</a></li>
                    <li><a href="index.php?hal=user"><i class="fa fa-user"></i> user</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-photo"></i> gallery
                            <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php?hal=gallery2022"> gallery 2022</a></li>
                            <li><a href="index.php?hal=gallery2023"> gallery 2023</a></li>
                            <li><a href="index.php?hal=gallery2024"> gallery 2024</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-book"></i> Webinar <b
                                class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php?hal=webinar_1">Webinar 1</a></li>
                            <li><a href="index.php?hal=webinar_2">Webinar 2</a></li>
                        </ul>
                    </li>
                    <!-- <li><a href="index.php?hal=laporan_pembelian"><i class="fa fa-file"></i> Laporan</a></li> -->
                    <!-- <li><a href="index.php?hal=logout"><i class="fa fa-sign-out"></i> Logout</a></li> -->

                </ul>

            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <?php
                if (isset($_GET['hal'])) {
                    if ($_GET['hal'] == "webinar_2") {
                        include 'webinar_2.php';
                    } elseif ($_GET['hal'] == "ubahwebinar_2") {
                        include 'ubahwebinar_2.php';
                    } elseif ($_GET['hal'] == "tambahwebinar_2") {
                        include 'tambahwebinar_2.php';
                    } elseif ($_GET['hal'] == "hapus_webinar_2") {
                        include 'hapus_webinar_2.php';
                    } elseif ($_GET['hal'] == "webinar_1") {
                        include 'webinar_1.php';
                    } elseif ($_GET['hal'] == "ubahwebinar_1") {
                        include 'ubahwebinar_1.php';
                    } elseif ($_GET['hal'] == "tambahwebinar_1") {
                        include 'tambahwebinar_1.php';
                    } elseif ($_GET['hal'] == "hapus_webinar_1") {
                        include 'hapus_webinar_1.php';
                    } elseif ($_GET['hal'] == "detail") {
                        include 'detail.php';
                    } elseif ($_GET['hal'] == "detailwebinar_1") {
                        include 'detailwebinar_1.php';
                    } elseif ($_GET['hal'] == "approve_webinar") {
                        include 'approve_webinar.php';
                    } elseif ($_GET['hal'] == "gallery2022") {
                        include 'gallery2022.php';
                    } elseif ($_GET['hal'] == "gallery2023") {
                        include 'gallery2023.php';
                    } elseif ($_GET['hal'] == "gallery2024") {
                        include 'gallery2024.php';
                    } elseif ($_GET['hal'] == "tambahgallery") {
                        include 'tambahgallery.php';
                    } elseif ($_GET['hal'] == "hapusgallery") {
                        include 'hapusgallery.php';
                    } elseif ($_GET['hal'] == "ubahgallery") {
                        include 'ubahgallery.php';
                    } elseif ($_GET['hal'] == "login") {
                        include 'login.php';
                    } elseif ($_GET['hal'] == "logout") {
                        include 'logout.php';
                    } elseif ($_GET['hal'] == "user") {
                        include 'user.php';
                    } elseif ($_GET['hal'] == "ubahuser") {
                        include 'ubahuser.php';
                    } elseif ($_GET['hal'] == "tambahuser") {
                        include 'tambahuser.php';
                    } elseif ($_GET['hal'] == "hapususer") {
                        include 'hapususer.php';
                    }
                } else {
                    include 'home.php';
                }
                ?>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- MORRIS CHART SCRIPTS -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>

</html>