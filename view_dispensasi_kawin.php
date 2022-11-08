<?php

use Mpdf\Tag\Br;

session_start();
// Define Database
include "./config/conn_DBpanjar.php";
$jumlah = $_SESSION["jumlah"];
// if (!isset($_SESSION["gugat"])) {
//   header("Location: hitung_gugat");
//   exit;
// }
// Define Variabel by Session 




$kota1 = $_SESSION["kota1"];
$kecamatan1 = $_SESSION["kecamatan1"];
$kelurahan1 = $_SESSION["kelurahan1"];

$kota2 = $_SESSION["kota2"];
$kecamatan2 = $_SESSION["kecamatan2"];
$kelurahan2 = $_SESSION["kelurahan2"];

$kota3 = $_SESSION["kota3"];
$kecamatan3 = $_SESSION["kecamatan3"];
$kelurahan3 = $_SESSION["kelurahan3"];

$kota4 = $_SESSION["kota4"];
$kecamatan4 = $_SESSION["kecamatan4"];
$kelurahan4 = $_SESSION["kelurahan4"];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/logo-pa-pasuruan.png">
    <title>
        Aplikasi Kalkulator Panjar
    </title>
    <script src='https://code.responsivevoice.org/responsivevoice.js'></script>
    <script type="text/javascript">
        responsiveVoice.OnVoiceReady = function() {
            console.log("speech time?");
            responsiveVoice.speak(
                "Jumlah Biaya Dispensasi Kawin Sebesar <?php echo $terbilang; ?> Rupiah",
                "Indonesian Female", {
                    pitch: 1,
                    rate: 1,
                    volume: 1
                }
            );
        };
    </script>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="./assets/css/argon-dashboard.css?v=2.0.2" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-gray-100">
    <div class="min-height-300 bg-success position-absolute w-100"></div>
    <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="#" target="_blank">
                <!-- <img src="./assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo"> -->
                <span class="ms-1 font-weight-bold">Pengadilan Agama Pasuruan</span>
            </a>
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
            <?php
            include "./layout/navbar.php";
            ?>

        </div>

    </aside>
    <main class="main-content position-relative border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">

                    <!-- <h6 class="font-weight-bolder text-white mb-0">Cerai Talak</h6> -->
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">

                    <ul class="navbar-nav  justify-content-end">

                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                    <i class="sidenav-toggler-line bg-white"></i>
                                </div>
                            </a>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">

            <div class="row mt-4">
                <div class="col-lg-12 mb-lg-0 mb-4">
                    <div class="card mb-3 z-index-2 h-100">
                        <div class="card-header pb-0 text-center pt-3 bg-transparent">
                            <h6 class="text-capitalize">Rincian Biaya Panjar Dispensasi Kawin</h6>
                        </div>
                        <div class="card-body">


                            <div class="card">
                                <div class="table-responsive">
                                    <?php
                                    if ($jumlah == '1') {
                                        $pemohon = mysqli_query($conn, "SELECT a.NM_KEL, a.RADIUS, b.NM_KEC, c.biaya
                                            FROM ref_kelurahan a
                                            LEFT JOIN ref_kecamatan b
                                            ON a.KD_KEC = b.KD_KEC
                                            LEFT JOIN ref_radius c
                                            ON a.RADIUS = c.radius
                                            WHERE a.KD_KEC='$kecamatan1'
                                            and a.KD_KEL='$kelurahan1'
                                            ");

                                        $result1 = mysqli_fetch_assoc($pemohon);

                                        $biaya_pemohon = 3 * $result1["biaya"];

                                        // Define biaya rincian
                                        $pendaftaran = 30000;
                                        $proses = 75000;
                                        $pnbp_pgl1 = 10000;
                                        $pnbp_putusan = 10000;
                                        $redaksi = 10000;
                                        $materai = 10000;
                                        $jumlah = $biaya_pemohon + $pendaftaran + $proses + ($pnbp_pgl1) + ($pnbp_pgl1) + $pnbp_putusan + $redaksi + $materai;

                                        $terbilang = terbilang($jumlah);
                                        echo '<div class="card-body">


                                        <div class="card">
                                          <div class="table-responsive">
                                            <table class="table align-items-center mb-0">
                                              <thead>
                                                <tr>
                                                  <th class="text-uppercase text-secondary font-weight-bolder opacity-7">
                                                    KEGIATAN
                          
                                                  </th>
                                                  <th class="text-uppercase text-secondary  font-weight-bolder opacity-7 ps-2">BIAYA</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">Pendaftaran</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format($pendaftaran, 0, ",", ".") . '</p>
                                                  </td>
                                                </tr>
                          
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">Biaya Proses</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format($proses, 0, ",", ".") . ' </p>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">Panggilan Pemohon 1 (3 kali)</h6>
                                                        <br>
                                                        <h6 class="mb-0 text-xs">Lokasi: KELURAHAN ' . $result1["NM_KEL"] . ', </h6>
                                                        <h6 class="mb-0 text-xs">KECAMATAN ' . $result1["NM_KEC"] . '</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format($biaya_pemohon, 0, ",", ".") . '</p>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">PNBP Panggilan</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format(($pnbp_pgl1), 0, ",", ".") . '</p>
                                                  </td>
                                                </tr>
                                                
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">PNBP Panggilan</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format(($pnbp_pgl1), 0, ",", ".") . '</p>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">PNBP PBT Putusan</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format($pnbp_putusan, 0, ",", ".") . '</p>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">Redaksi</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format($redaksi, 0, ",", ".") . '</p>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">Materai</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format($materai, 0, ",", ".") . '</p>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs"><b>Jumlah</b></h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0"><b>Rp. ' . number_format($jumlah, 0, ",", ".") . '</b></p>
                                                  </td>
                                                </tr>
                          
                          
                          
                          
                          
                                              </tbody>
                                            </table>
                          
                                          </div>
                          
                          
                                        </div>
                                        <div class="mt-4">
                                          <a href="hitung_dispensasi_kawin" class="btn btn-sm btn-danger" style="margin-right: 15px;">Close</a>
                                          <a href="rpt_dispensasi_kawin" class="btn btn-sm btn-primary">Print PDF</a>
                                        </div>
                                      </div>';
                                    } elseif ($jumlah == '2') {
                                        $pemohon = mysqli_query($conn, "SELECT a.NM_KEL, a.RADIUS, b.NM_KEC, c.biaya
                                              FROM ref_kelurahan a
                                              LEFT JOIN ref_kecamatan b
                                              ON a.KD_KEC = b.KD_KEC
                                              LEFT JOIN ref_radius c
                                              ON a.RADIUS = c.radius
                                              WHERE a.KD_KEC='$kecamatan1'
                                              and a.KD_KEL='$kelurahan1'
                                              ");

                                        $result1 = mysqli_fetch_assoc($pemohon);

                                        $biaya_pemohon = 3 * $result1["biaya"];


                                        // Define and Identified Location Name for Termohon
                                        $termohon = mysqli_query($conn, "SELECT a.NM_KEL AS KELURAHAN, a.RADIUS, b.NM_KEC AS KECAMATAN, c.biaya AS harga
                                              FROM ref_kelurahan a
                                              LEFT JOIN ref_kecamatan b
                                              ON a.KD_KEC = b.KD_KEC
                                              LEFT JOIN ref_radius c
                                              ON a.RADIUS = c.radius
                                              WHERE a.KD_KEC='$kecamatan2'
                                              and a.KD_KEL='$kelurahan2'
                                              ");

                                        $result2 = mysqli_fetch_assoc($termohon);

                                        $biaya_termohon = 3 * $result2["harga"];

                                        // Define biaya rincian
                                        $pendaftaran = 30000;
                                        $proses = 75000;
                                        $pnbp_pgl1 = 10000;
                                        $pnbp_putusan = 10000;
                                        $redaksi = 10000;
                                        $materai = 10000;
                                        $jumlah = $biaya_pemohon + $biaya_termohon + $pendaftaran + $proses + ($pnbp_pgl1) + ($pnbp_pgl1) + $pnbp_putusan + $redaksi + $materai;

                                        $terbilang = terbilang($jumlah);
                                        echo '<div class="card-body">


                                        <div class="card">
                                          <div class="table-responsive">
                                            <table class="table align-items-center mb-0">
                                              <thead>
                                                <tr>
                                                  <th class="text-uppercase text-secondary font-weight-bolder opacity-7">
                                                    KEGIATAN
                          
                                                  </th>
                                                  <th class="text-uppercase text-secondary  font-weight-bolder opacity-7 ps-2">BIAYA</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">Pendaftaran</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format($pendaftaran, 0, ",", ".") . '</p>
                                                  </td>
                                                </tr>
                          
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">Biaya Proses</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format($proses, 0, ",", ".") . ' </p>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">Panggilan Pemohon 1 (3 kali)</h6>
                                                        <br>
                                                        <h6 class="mb-0 text-xs">Lokasi: KELURAHAN ' . $result1["NM_KEL"] . ', </h6>
                                                        <h6 class="mb-0 text-xs">KECAMATAN ' . $result1["NM_KEC"] . '</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format($biaya_pemohon, 0, ",", ".") . '</p>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">Panggilan Pemohon 2 (3 kali)</h6>
                                                        <br>
                                                        <h6 class="mb-0 text-xs">Lokasi: KELURAHAN ' . $result2["KELURAHAN"] . ', </h6>
                                                        <h6 class="mb-0 text-xs">KECAMATAN ' . $result2["KECAMATAN"] . '</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format($biaya_termohon, 0, ",", ".") . '</p>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">PNBP Panggilan</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format(($pnbp_pgl1), 0, ",", ".") . '</p>
                                                  </td>
                                                </tr>
                                                
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">PNBP Panggilan</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format(($pnbp_pgl1), 0, ",", ".") . '</p>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">PNBP PBT Putusan</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format($pnbp_putusan, 0, ",", ".") . '</p>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">Redaksi</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format($redaksi, 0, ",", ".") . '</p>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">Materai</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format($materai, 0, ",", ".") . '</p>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs"><b>Jumlah</b></h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0"><b>Rp. ' . number_format($jumlah, 0, ",", ".") . '</b></p>
                                                  </td>
                                                </tr>
                          
                          
                          
                          
                          
                                              </tbody>
                                            </table>
                          
                                          </div>
                          
                          
                                        </div>
                                        <div class="mt-4">
                                          <a href="hitung_dispensasi_kawin" class="btn btn-sm btn-danger" style="margin-right: 15px;">Close</a>
                                          <a href="rpt_dispensasi_kawin" class="btn btn-sm btn-primary">Print PDF</a>
                                        </div>
                                      </div>';
                                    } elseif ($jumlah == '3') {
                                        $pemohon1 = mysqli_query($conn, "SELECT a.NM_KEL, a.RADIUS, b.NM_KEC, c.biaya
                                              FROM ref_kelurahan a
                                              LEFT JOIN ref_kecamatan b
                                              ON a.KD_KEC = b.KD_KEC
                                              LEFT JOIN ref_radius c
                                              ON a.RADIUS = c.radius
                                              WHERE a.KD_KEC='$kecamatan1'
                                              and a.KD_KEL='$kelurahan1'
                                              ");
                                        $result1 = mysqli_fetch_assoc($pemohon1);
                                        $biaya_pemohon = 3 * $result1["biaya"];


                                        // Define and Identified Location Name for Termohon
                                        $pemohon2 = mysqli_query($conn, "SELECT a.NM_KEL AS KELURAHAN, a.RADIUS, b.NM_KEC AS KECAMATAN, c.biaya AS harga
                                              FROM ref_kelurahan a
                                              LEFT JOIN ref_kecamatan b
                                              ON a.KD_KEC = b.KD_KEC
                                              LEFT JOIN ref_radius c
                                              ON a.RADIUS = c.radius
                                              WHERE a.KD_KEC='$kecamatan2'
                                              and a.KD_KEL='$kelurahan2'
                                              ");
                                        $result2 = mysqli_fetch_assoc($pemohon2);
                                        $biaya_pemohon2 = 3 * $result2["harga"];

                                        $pemohon3 = mysqli_query($conn, "SELECT a.NM_KEL AS KELURAHAN, a.RADIUS, b.NM_KEC AS KECAMATAN, c.biaya AS harga
                                              FROM ref_kelurahan a
                                              LEFT JOIN ref_kecamatan b
                                              ON a.KD_KEC = b.KD_KEC
                                              LEFT JOIN ref_radius c
                                              ON a.RADIUS = c.radius
                                              WHERE a.KD_KEC='$kecamatan3'
                                              and a.KD_KEL='$kelurahan3'
                                              ");
                                        $result3 = mysqli_fetch_assoc($pemohon3);
                                        $biaya_pemohon3 = 3 * $result3["harga"];

                                        // Define biaya rincian
                                        $pendaftaran = 30000;
                                        $proses = 75000;
                                        $pnbp_pgl1 = 10000;
                                        $pnbp_putusan = 10000;
                                        $redaksi = 10000;
                                        $materai = 10000;
                                        $jumlah = $biaya_pemohon + $biaya_pemohon2 + $biaya_pemohon3 + $pendaftaran + $proses + ($pnbp_pgl1) + ($pnbp_pgl1) + $pnbp_putusan + $redaksi + $materai;

                                        $terbilang = terbilang($jumlah);
                                        echo '<div class="card-body">


                                        <div class="card">
                                          <div class="table-responsive">
                                            <table class="table align-items-center mb-0">
                                              <thead>
                                                <tr>
                                                  <th class="text-uppercase text-secondary font-weight-bolder opacity-7">
                                                    KEGIATAN
                          
                                                  </th>
                                                  <th class="text-uppercase text-secondary  font-weight-bolder opacity-7 ps-2">BIAYA</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">Pendaftaran</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format($pendaftaran, 0, ",", ".") . '</p>
                                                  </td>
                                                </tr>
                          
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">Biaya Proses</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format($proses, 0, ",", ".") . ' </p>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">Panggilan Pemohon 1 (3 kali)</h6>
                                                        <br>
                                                        <h6 class="mb-0 text-xs">Lokasi: KELURAHAN ' . $result1["NM_KEL"] . ', </h6>
                                                        <h6 class="mb-0 text-xs">KECAMATAN ' . $result1["NM_KEC"] . '</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format($biaya_pemohon, 0, ",", ".") . '</p>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">Panggilan Pemohon 2 (3 kali)</h6>
                                                        <br>
                                                        <h6 class="mb-0 text-xs">Lokasi: KELURAHAN ' . $result2["KELURAHAN"] . ', </h6>
                                                        <h6 class="mb-0 text-xs">KECAMATAN ' . $result2["KECAMATAN"] . '</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format($biaya_pemohon2, 0, ",", ".") . '</p>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">Panggilan Pemohon 3 (3 kali)</h6>
                                                        <br>
                                                        <h6 class="mb-0 text-xs">Lokasi: KELURAHAN ' . $result3["KELURAHAN"] . ', </h6>
                                                        <h6 class="mb-0 text-xs">KECAMATAN ' . $result3["KECAMATAN"] . '</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format($biaya_pemohon3, 0, ",", ".") . '</p>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">PNBP Panggilan</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format(($pnbp_pgl1), 0, ",", ".") . '</p>
                                                  </td>
                                                </tr>
                                                
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">PNBP Panggilan</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format(($pnbp_pgl1), 0, ",", ".") . '</p>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">PNBP PBT Putusan</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format($pnbp_putusan, 0, ",", ".") . '</p>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">Redaksi</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format($redaksi, 0, ",", ".") . '</p>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">Materai</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format($materai, 0, ",", ".") . '</p>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs"><b>Jumlah</b></h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0"><b>Rp. ' . number_format($jumlah, 0, ",", ".") . '</b></p>
                                                  </td>
                                                </tr>
                          
                          
                          
                          
                          
                                              </tbody>
                                            </table>
                          
                                          </div>
                          
                          
                                        </div>
                                        <div class="mt-4">
                                          <a href="hitung_dispensasi_kawin" class="btn btn-sm btn-danger" style="margin-right: 15px;">Close</a>
                                          <a href="rpt_dispensasi_kawin" class="btn btn-sm btn-primary">Print PDF</a>
                                        </div>
                                      </div>';
                                    } elseif ($jumlah == '4') {
                                        $pemohon1 = mysqli_query($conn, "SELECT a.NM_KEL, a.RADIUS, b.NM_KEC, c.biaya
                                        FROM ref_kelurahan a
                                        LEFT JOIN ref_kecamatan b
                                        ON a.KD_KEC = b.KD_KEC
                                        LEFT JOIN ref_radius c
                                        ON a.RADIUS = c.radius
                                        WHERE a.KD_KEC='$kecamatan1'
                                        and a.KD_KEL='$kelurahan1'
                                        ");
                                        $result1 = mysqli_fetch_assoc($pemohon1);
                                        $biaya_pemohon = 3 * $result1["biaya"];


                                        // Define and Identified Location Name for Termohon
                                        $pemohon2 = mysqli_query($conn, "SELECT a.NM_KEL AS KELURAHAN, a.RADIUS, b.NM_KEC AS KECAMATAN, c.biaya AS harga
                                        FROM ref_kelurahan a
                                        LEFT JOIN ref_kecamatan b
                                        ON a.KD_KEC = b.KD_KEC
                                        LEFT JOIN ref_radius c
                                        ON a.RADIUS = c.radius
                                        WHERE a.KD_KEC='$kecamatan2'
                                        and a.KD_KEL='$kelurahan2'
                                        ");
                                        $result2 = mysqli_fetch_assoc($pemohon2);
                                        $biaya_pemohon2 = 3 * $result2["harga"];

                                        $pemohon3 = mysqli_query($conn, "SELECT a.NM_KEL AS KELURAHAN, a.RADIUS, b.NM_KEC AS KECAMATAN, c.biaya AS harga
                                        FROM ref_kelurahan a
                                        LEFT JOIN ref_kecamatan b
                                        ON a.KD_KEC = b.KD_KEC
                                        LEFT JOIN ref_radius c
                                        ON a.RADIUS = c.radius
                                        WHERE a.KD_KEC='$kecamatan3'
                                        and a.KD_KEL='$kelurahan3'
                                        ");
                                        $result3 = mysqli_fetch_assoc($pemohon3);
                                        $biaya_pemohon3 = 3 * $result3["harga"];

                                        $pemohon4 = mysqli_query($conn, "SELECT a.NM_KEL AS KELURAHAN, a.RADIUS, b.NM_KEC AS KECAMATAN, c.biaya AS harga
                                        FROM ref_kelurahan a
                                        LEFT JOIN ref_kecamatan b
                                        ON a.KD_KEC = b.KD_KEC
                                        LEFT JOIN ref_radius c
                                        ON a.RADIUS = c.radius
                                        WHERE a.KD_KEC='$kecamatan3'
                                        and a.KD_KEL='$kelurahan3'
                                        ");
                                        $result4 = mysqli_fetch_assoc($pemohon4);
                                        $biaya_pemohon4 = 3 * $result4["harga"];

                                        // Define biaya rincian
                                        $pendaftaran = 30000;
                                        $proses = 75000;
                                        $pnbp_pgl1 = 10000;
                                        $pnbp_putusan = 10000;
                                        $redaksi = 10000;
                                        $materai = 10000;
                                        $jumlah = $biaya_pemohon + $biaya_pemohon2 + $biaya_pemohon3 + $biaya_pemohon4 + $pendaftaran + $proses + ($pnbp_pgl1) + ($pnbp_pgl1) + $pnbp_putusan + $redaksi + $materai;

                                        $terbilang = terbilang($jumlah);
                                        echo '<div class="card-body">


                                        <div class="card">
                                          <div class="table-responsive">
                                            <table class="table align-items-center mb-0">
                                              <thead>
                                                <tr>
                                                  <th class="text-uppercase text-secondary font-weight-bolder opacity-7">
                                                    KEGIATAN
                          
                                                  </th>
                                                  <th class="text-uppercase text-secondary  font-weight-bolder opacity-7 ps-2">BIAYA</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">Pendaftaran</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format($pendaftaran, 0, ",", ".") . '</p>
                                                  </td>
                                                </tr>
                          
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">Biaya Proses</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format($proses, 0, ",", ".") . ' </p>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">Panggilan Pemohon 1 (3 kali)</h6>
                                                        <br>
                                                        <h6 class="mb-0 text-xs">Lokasi: KELURAHAN ' . $result1["NM_KEL"] . ', </h6>
                                                        <h6 class="mb-0 text-xs">KECAMATAN ' . $result1["NM_KEC"] . '</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format($biaya_pemohon, 0, ",", ".") . '</p>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">Panggilan Pemohon 2 (3 kali)</h6>
                                                        <br>
                                                        <h6 class="mb-0 text-xs">Lokasi: KELURAHAN ' . $result2["KELURAHAN"] . ', </h6>
                                                        <h6 class="mb-0 text-xs">KECAMATAN ' . $result2["KECAMATAN"] . '</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format($biaya_pemohon2, 0, ",", ".") . '</p>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">Panggilan Pemohon 3 (3 kali)</h6>
                                                        <br>
                                                        <h6 class="mb-0 text-xs">Lokasi: KELURAHAN ' . $result3["KELURAHAN"] . ', </h6>
                                                        <h6 class="mb-0 text-xs">KECAMATAN ' . $result3["KECAMATAN"] . '</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format($biaya_pemohon3, 0, ",", ".") . '</p>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">Panggilan Pemohon 4 (3 kali)</h6>
                                                        <br>
                                                        <h6 class="mb-0 text-xs">Lokasi: KELURAHAN ' . $result4["KELURAHAN"] . ', </h6>
                                                        <h6 class="mb-0 text-xs">KECAMATAN ' . $result4["KECAMATAN"] . '</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format($biaya_pemohon4, 0, ",", ".") . '</p>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">PNBP Panggilan</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format(($pnbp_pgl1), 0, ",", ".") . '</p>
                                                  </td>
                                                </tr>
                                                
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">PNBP Panggilan</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format(($pnbp_pgl1), 0, ",", ".") . '</p>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">PNBP PBT Putusan</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format($pnbp_putusan, 0, ",", ".") . '</p>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">Redaksi</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format($redaksi, 0, ",", ".") . '</p>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs">Materai</h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0">Rp. ' . number_format($materai, 0, ",", ".") . '</p>
                                                  </td>
                                                </tr>
                                                <tr>
                                                  <td>
                                                    <div class="d-flex px-2 py-1">
                          
                                                      <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-xs"><b>Jumlah</b></h6>
                                                      </div>
                                                    </div>
                                                  </td>
                                                  <td>
                                                    <p class="text-xs font-weight-bold mb-0"><b>Rp. ' . number_format($jumlah, 0, ",", ".") . '</b></p>
                                                  </td>
                                                </tr>
                          
                          
                          
                          
                          
                                              </tbody>
                                            </table>
                          
                                          </div>
                          
                          
                                        </div>
                                        <div class="mt-4">
                                          <a href="hitung_dispensasi_kawin" class="btn btn-sm btn-danger" style="margin-right: 15px;">Close</a>
                                          <a href="rpt_dispensasi_kawin" class="btn btn-sm btn-primary">Print PDF</a>
                                        </div>
                                      </div>';
                                    }
                                    ?>


                                </div>


                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-lg-5">

                </div>
            </div>


        </div>
    </main>

    <!--   Core JS Files   -->
    <script src="./assets/js/core/popper.min.js"></script>
    <script src="./assets/js/core/bootstrap.min.js"></script>
    <script src="./assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="./assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#5e72e4",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="./assets/js/argon-dashboard.min.js?v=2.0.2"></script>
</body>

</html>