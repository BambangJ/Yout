<?php
include "config.php";
session_start();
  if($_SESSION['log']!="login"){
    header("location:login.php");
  }
  function ribuan ($nilai){
    return number_format ($nilai, 0, ',', '.');
}
$uid = $_SESSION['userid'];
$DataLogin = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM login WHERE userid='$uid'"));
$username = $DataLogin['username'];
$toko = $DataLogin['toko'];
$alamat = $DataLogin['alamat'];
$telepon = $DataLogin['telepon'];
$logo = $DataLogin['logo'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kantin YesMie!</title>
    <link rel="icon" href="logo.png">
    <link rel="icon" href="logo.png" type="image/ico">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="assets/vendor/datatables/responsive.bootstrap4.min.css" rel="stylesheet">
</head>

<body>
    <div class="page-wrapper toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark border-0" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper" style="background-color: #c0c0c0;">
            <div class="sidebar-content">
                <div class="sidebar-brand" style="background-color: #c0c0c0;">
                    <a href="./" class="text-dark"><i class="fas fa-shopping-cart mr-1"></i><?php echo $toko ?></a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="sidebar-header">
                    <div class="user-pic" style="height:70px;width:70px;">
                        <img class="img-responsive img-rounded" src="assets/images/<?php echo $logo ?>"
                            alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name"><?php echo $username ?>
                        </span>
                        <span class="user-role">User</span>
                        <span class="user-status">
                            <i class="fa fa-circle"></i>
                            <span>Online</span>
                        </span>
                    </div>
                </div>
                <!-- sidebar-header  -->

                <div class="sidebar-menu" style="background-color: #c0c0c0;">
                    <ul>
                        <li>
                            <a href="index.php">
                                <i class="fas fa-tv"></i>
                                <span>Transaksi</span>
                            </a>
                        </li>
                        <li>
                            <a href="menu.php">
                                <i class="fas fa-cart-arrow-down"></i>
                                <span>Menu</span>
                            </a>
                        </li>
                        <li>
                            <a href="laporan.php">
                                <i class="fa fa-chart-line"></i>
                                <span>Laporan</span>
                            </a>
                        </li>
                        <li>
                            <a href="pengaturan.php">
                                <i class="fa fa-cog"></i>
                                <span>Pengaturan</span>
                            </a>
                        </li>
                        <li>
                            <a href="#Exit" data-toggle="modal">
                                <i class="fa fa-power-off"></i>
                                <span>Keluar</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <div class="sidebar-footer text-dark" style="background-color: #c0c0c0;">
                © 2022 Kantin YesMie!
            </div>
        </nav>
        <!-- sidebar-wrapper  -->
        <main class="page-content">
            <div class="container-fluid">

                <div class="d-block d-sm-block d-md-none d-lg-none py-2"></div>