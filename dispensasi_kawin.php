<?php
include "./config/conn_DBpanjar.php";
session_start();
// if (!isset($_SESSION["dispensasi_kawin"])) {
//   header("Location: hitung_dispensasi_kawin");
//   exit;
// }
// Define Talak
$jumlah = $_SESSION["jumlah"];
$kelurahan1 = isset($_POST['kelurahan1']) ? $$_POST['kelurahan1'] : '';
$kelurahan2 = isset($_POST['kelurahan2']) ? $$_POST['kelurahan2'] : '';
$kecamatan1 = isset($_POST['kecamatan1']) ? $$_POST['kecamatan1'] : '';
$kecamatan2 = isset($_POST['kecamatan2']) ? $$_POST['kecamatan2'] : '';
$kota1 = isset($_POST['kota1']) ? $$_POST['kota1'] : '';
$kota2 = isset($_POST['kota2']) ? $$_POST['kota2'] : '';
// Define Talak
if (isset($_POST["talak"])) {
  // $_SESSION["talak"] = true;
  $kota1 = $_POST["kota1"];
  $kota2 = $_POST["kota2"];
  $kota3 = $_POST["kota3"];
  $kota4 = $_POST["kota4"];
  $kecamatan1 = $_POST["kecamatan1"];
  $kecamatan2 = $_POST["kecamatan2"];
  $kecamatan3 = $_POST["kecamatan3"];
  $kecamatan4 = $_POST["kecamatan4"];
  $kelurahan1 = $_POST["kelurahan1"];
  $kelurahan2 = $_POST["kelurahan2"];
  $kelurahan3 = $_POST["kelurahan3"];
  $kelurahan4 = $_POST["kelurahan4"];

  $_SESSION["kota1"] = $kota1;
  $_SESSION["kecamatan1"] = $kecamatan1;
  $_SESSION["kelurahan1"] = $kelurahan1;
  $_SESSION["kota2"] = $kota2;
  $_SESSION["kecamatan2"] = $kecamatan2;
  $_SESSION["kelurahan2"] = $kelurahan2;
  $_SESSION["kota3"] = $kota3;
  $_SESSION["kecamatan3"] = $kecamatan3;
  $_SESSION["kelurahan3"] = $kelurahan3;
  $_SESSION["kota4"] = $kota4;
  $_SESSION["kecamatan4"] = $kecamatan4;
  $_SESSION["kelurahan4"] = $kelurahan4;
  header("Location: view_dispensasi_kawin");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <script src="vendor/jquery/jquery.js"></script>
  <script>
    $(document).ready(function() {
      $('#kota1').change(function() {
        var kota_id = $('#kota1').val();
        $.ajax({
          type: 'POST',
          url: 'ambil_kecamatan.php',
          data: 'kota_id=' + kota_id,
          cache: false,
          success: function(response) {
            $('#kecamatan1').html(response);
          }
        });
      });
    });
    $(document).ready(function() {
      $('#kecamatan1').change(function() {
        var kecamatan_id = $('#kecamatan1').val();
        $.ajax({
          type: 'POST',
          url: 'ambil_desa.php',
          data: 'kecamatan_id=' + kecamatan_id,
          cache: false,
          success: function(response) {
            $('#kelurahan1').html(response);
          }
        });
      });
    });
    $(document).ready(function() {
      $('#kota2').change(function() {
        var kota_id = $('#kota2').val();
        $.ajax({
          type: 'POST',
          url: 'ambil_kecamatan.php',
          data: 'kota_id=' + kota_id,
          cache: false,
          success: function(response) {
            $('#kecamatan2').html(response);
          }
        });
      });
    });
    $(document).ready(function() {
      $('#kecamatan2').change(function() {
        var kecamatan_id = $('#kecamatan2').val();
        $.ajax({
          type: 'POST',
          url: 'ambil_desa.php',
          data: 'kecamatan_id=' + kecamatan_id,
          cache: false,
          success: function(response) {
            $('#kelurahan2').html(response);
          }
        });
      });
    });
    $(document).ready(function() {
      $('#kota3').change(function() {
        var kota_id = $('#kota3').val();
        $.ajax({
          type: 'POST',
          url: 'ambil_kecamatan.php',
          data: 'kota_id=' + kota_id,
          cache: false,
          success: function(response) {
            $('#kecamatan3').html(response);
          }
        });
      });
    });
    $(document).ready(function() {
      $('#kecamatan3').change(function() {
        var kecamatan_id = $('#kecamatan3').val();
        $.ajax({
          type: 'POST',
          url: 'ambil_desa.php',
          data: 'kecamatan_id=' + kecamatan_id,
          cache: false,
          success: function(response) {
            $('#kelurahan3').html(response);
          }
        });
      });
    });
    $(document).ready(function() {
      $('#kota4').change(function() {
        var kota_id = $('#kota4').val();
        $.ajax({
          type: 'POST',
          url: 'ambil_kecamatan.php',
          data: 'kota_id=' + kota_id,
          cache: false,
          success: function(response) {
            $('#kecamatan4').html(response);
          }
        });
      });
    });
    $(document).ready(function() {
      $('#kecamatan4').change(function() {
        var kecamatan_id = $('#kecamatan4').val();
        $.ajax({
          type: 'POST',
          url: 'ambil_desa.php',
          data: 'kecamatan_id=' + kecamatan_id,
          cache: false,
          success: function(response) {
            $('#kelurahan4').html(response);
          }
        });
      });
    });
  </script>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./assets/img/logo-pa-pasuruan.png">
  <title>
    Aplikasi Kalkulator Panjar Biaya Perkara
  </title>
  <script src='https://code.responsivevoice.org/responsivevoice.js'></script>
  <script type="text/javascript">
    responsiveVoice.OnVoiceReady = function() {
      console.log("speech time?");
      responsiveVoice.speak(
        "Perhitungan Dispensasi Kawin dengan pemohon sebanyak <?= terbilang($jumlah); ?> orang ",
        "Indonesian Female", {
          pitch: 1,
          rate: 1,
          volume: 1
        }
      );
    };

    // function copyForm() {
    //   $("#form-asli")
    //     .clone()
    //     .appendTo($("#form-dinamis"))
    // };
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
          <form action="" method="POST">
            <div class="card mb-3 z-index-2 h-100">
              <div class="card-header pb-0 pt-3 bg-transparent">
                <h6 class="text-capitalize">Dispensasi Kawin</h6>

              </div>
              <div class="card-body">
                <?php
                for ($i = 1; $i <= $jumlah; $i++) : ?>
                  <div class="card mt-2" id="form-asli">
                    <div class="card-header pb-0  bg-transparent">
                      <h6 class="text-capitalize">Data Pemohon <?= $i; ?></h6>
                    </div>
                    <div class="card-body">


                      <div class="form-group">
                        <label for="kota1">Kota</label>
                        <select class="form-control" name="kota<?= $i; ?>" id="kota<?= $i; ?>" required>
                          <option value="">--- Pilih Kota ---</option>
                          <?php
                          $kota = mysqli_query($conn, "SELECT * FROM ref_kota ORDER BY KD_KOTA");
                          while ($k = mysqli_fetch_assoc($kota)) : ?>
                            <option value="<?= $k["KD_KOTA"] ?>"><?= $k["NM_KOTA"] ?></option>
                          <?php
                          endwhile;
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="kecamatan1">Kecamatan</label>
                        <select class="form-control" name="kecamatan<?= $i; ?>" id="kecamatan<?= $i; ?>" required>
                          <option value="">--- Pilih Kecamatan ---</option>

                        </select>
                      </div>
                      <div class="form-group">
                        <label for="kelurahan1">Kelurahan</label>
                        <select class="form-control" name="kelurahan<?= $i; ?>" id="kelurahan<?= $i; ?>" required>
                          <option value="">--- Pilih Kelurahan ---</option>

                        </select>
                      </div>



                    </div>

                  </div>
                <?php endfor; ?>
                <div id="form-dinamis">

                </div>
                <div class="mt-4">
                  <button class="btn btn-icon btn-3 btn-success" type="submit" name="talak">
                    <span class="btn-inner--text">Hitung</span>
                  </button>
                  <!-- <button class="btn btn-icon btn-3 btn-info" type="button" onclick="copyForm()" name="tambah">
                    <span class="btn-inner--text">Tambah Pemohon</span>
                  </button> -->
                </div>
              </div>
            </div>
          </form>
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