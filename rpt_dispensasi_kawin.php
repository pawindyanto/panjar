<?php
session_start();
// Define Database
include './config/conn_DBpanjar.php';
if (!isset($_SESSION["dispensasi_kawin"])) {
    header("Location: hitung_dispensasi_kawin");
    exit;
}
$jumlah_pemohon = $_SESSION["jumlah"];
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

// Define and Identified Location Name for Pemohon
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
$biaya_pemohon = 1 * $result1["biaya"];


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
$biaya_pemohon2 = 1 * $result2["harga"];

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
$biaya_pemohon3 = 1 * $result3["harga"];

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
$biaya_pemohon4 = 1 * $result4["harga"];

// Define biaya rincian
$pendaftaran = 30000;
$proses = 75000;
$pnbp_pgl1 = 10000;
$pnbp_putusan = 10000;
$redaksi = 10000;
$materai = 10000;
$jumlah_pemohon1 = $biaya_pemohon +  $pendaftaran + $proses + ($pnbp_pgl1 * 1)  + $pnbp_putusan + $redaksi + $materai;
$jumlah_pemohon2 = $biaya_pemohon + $biaya_pemohon2  + $pendaftaran + $proses + ($pnbp_pgl1 * 2)  + $pnbp_putusan + $redaksi + $materai;
$jumlah_pemohon3 = $biaya_pemohon + $biaya_pemohon2 + $biaya_pemohon3  + $pendaftaran + $proses + ($pnbp_pgl1 * 3)  + $pnbp_putusan + $redaksi + $materai;
$jumlah_pemohon4 = $biaya_pemohon + $biaya_pemohon2 + $biaya_pemohon3 + $biaya_pemohon4 + $pendaftaran + $proses + ($pnbp_pgl1 * 4)  + $pnbp_putusan + $redaksi + $materai;

// Require composer autoload
require_once __DIR__ . '/vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();
$html1 = '
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/logo-pa-pasuruan.png">
    <title>Rincian Dispensasi Nikah</title>
    <style>
    .isi{
      border: 1px solid black;
      border-collapse: collapse;
      
    }

    p{
      font-size:14px;
    }
</style>
</head>

<body>
<table>
<tr>
    <th style="width:10%;">
       <img src="./assets/img/logo-pa-pasuruan-bw.png" width="60" alt="" style="padding-bottom: 6px;">
    </th>
    <th style="padding-left: 30px; padding-bottom: 6px; width:90%;">
        <h2 style="font-size:21px">PENGADILAN AGAMA PASURUAN</h2>
        <h5 style="font-size:15px">Jl. Ir. H. Juanda No. 11-A Telp./Fax.(0343) 410284/ (0343) 431155</h5>
        <h5 style="font-size:15px">PASURUAN 67129 </h5>
        
    </th>
    
</tr>
</table>
<hr style="border: 9px solid black;">
<table class="isi" style="width:100%;" >
<tr class="isi">
      <td colspan="2" class="isi" style="padding: 10px 0; text-align: center">
          <h4>Rincian Biaya Perkara Dispensasi Nikah </h4>
      </td> 
</tr>
  <tr class="isi">
      <td style="text-align: center" class="isi">
          <p>Rincian Kegiatan</p>
         
      </td>
      
      <td style="text-align: center" class="isi">
          <p>Biaya</p>
      </td> 
  </tr>
  <tr class="isi">
      <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
          <p>Pendaftaran</p>
         
      </td>
      
      <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
          <p>Rp. ' . number_format($pendaftaran, 0, ",", ".") . '</p>
      </td> 
  </tr>
  <tr class="isi">
      <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
          <p>Biaya Proses</p>
         
      </td>
      
      <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
          <p>Rp. ' . number_format($proses, 0, ",", ".") . '</p>
      </td> 
  </tr>
  <tr class="isi">
      <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
          <p>Panggilan Pemohon 1 (1 Kali)</p>
          <br>
          <p>Lokasi: KELURAHAN ' . $result1["NM_KEL"] . ', KECAMATAN ' . $result1["NM_KEC"] . '</p>
      </td>
      
      <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
          <p>Rp. ' . number_format($biaya_pemohon, 0, ",", ".") . '</p>
      </td> 
  </tr>
  <tr class="isi">
      <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
          <p>PNBP Panggilan </p>
         
      </td>
      
      <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
          <p>Rp. ' . number_format(($pnbp_pgl1 * 1), 0, ",", ".") . '</p>
      </td> 
  </tr>
 
  <tr class="isi">
      <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
          <p>PNBP PBT Putusan</p>
         
      </td>
      
      <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
          <p>Rp. ' . number_format($pnbp_putusan, 0, ",", ".") . '</p>
      </td> 
  </tr>
  <tr class="isi">
      <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
          <p>Redaksi</p>
         
      </td>
      
      <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
          <p>Rp. ' . number_format($redaksi, 0, ",", ".") . '</p>
      </td> 
  </tr>
  <tr class="isi">
      <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
          <p>Materai</p>
         
      </td>
      
      <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
          <p>Rp. ' . number_format($materai, 0, ",", ".") . '</p>
      </td> 
  </tr>
  <tr class="isi">
    <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
        <p><b>Jumlah</b></p>
      
    </td>
  
    <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
        <p><b>Rp. ' . number_format($jumlah_pemohon1, 0, ",", ".") . '</b></p>
    </td> 
  </tr>
  
</table>
<p>Catatan: Biaya Diatas Bisa Lebih Atau Kurang</p>
</body>

</html>
';
$html2 = '
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/logo-pa-pasuruan.png">
    <title>Rincian Dispensasi Nikah</title>
    <style>
    .isi{
      border: 1px solid black;
      border-collapse: collapse;
      
    }

    p{
      font-size:14px;
    }
</style>
</head>

<body>
<table>
<tr>
    <th style="width:10%;">
       <img src="./assets/img/logo-pa-pasuruan-bw.png" width="60" alt="" style="padding-bottom: 6px;">
    </th>
    <th style="padding-left: 30px; padding-bottom: 6px; width:90%;">
        <h2 style="font-size:21px">PENGADILAN AGAMA PASURUAN</h2>
        <h5 style="font-size:15px">Jl. Ir. H. Juanda No. 11-A Telp./Fax.(0343) 410284/ (0343) 431155</h5>
        <h5 style="font-size:15px">PASURUAN 67129 </h5>
        
    </th>
    
</tr>
</table>
<hr style="border: 9px solid black;">
<table class="isi" style="width:100%;" >
<tr class="isi">
      <td colspan="2" class="isi" style="padding: 10px 0; text-align: center">
          <h4>Rincian Biaya Perkara Dispensasi Nikah </h4>
      </td> 
</tr>
  <tr class="isi">
      <td style="text-align: center" class="isi">
          <p>Rincian Kegiatan</p>
         
      </td>
      
      <td style="text-align: center" class="isi">
          <p>Biaya</p>
      </td> 
  </tr>
  <tr class="isi">
      <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
          <p>Pendaftaran</p>
         
      </td>
      
      <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
          <p>Rp. ' . number_format($pendaftaran, 0, ",", ".") . '</p>
      </td> 
  </tr>
  <tr class="isi">
      <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
          <p>Biaya Proses</p>
         
      </td>
      
      <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
          <p>Rp. ' . number_format($proses, 0, ",", ".") . '</p>
      </td> 
  </tr>
  <tr class="isi">
      <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
          <p>Panggilan Pemohon 1 (1 Kali)</p>
          <br>
          <p>Lokasi: KELURAHAN ' . $result1["NM_KEL"] . ', KECAMATAN ' . $result1["NM_KEC"] . '</p>
      </td>
      
      <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
          <p>Rp. ' . number_format($biaya_pemohon, 0, ",", ".") . '</p>
      </td> 
  </tr>
  <tr class="isi">
      <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
          <p>PNBP Panggilan </p>
         
      </td>
      
      <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
          <p>Rp. ' . number_format(($pnbp_pgl1 * 1), 0, ",", ".") . '</p>
      </td> 
  </tr>
  <tr class="isi">
      <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
          <p>Panggilan Pemohon 2 (1 Kali)</p>
          <br>
          <p>Lokasi: KELURAHAN ' . $result2["KELURAHAN"] . ', KECAMATAN ' . $result2["KECAMATAN"] . '</p>
      </td>
      
      <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
          <p>Rp. ' . number_format($biaya_pemohon2, 0, ",", ".") . '</p>
      </td> 
  </tr>
  <tr class="isi">
      <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
          <p>PNBP Panggilan </p>
         
      </td>
      
      <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
          <p>Rp. ' . number_format(($pnbp_pgl1 * 1), 0, ",", ".") . '</p>
      </td> 
  </tr>
  <tr class="isi">
      <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
          <p>PNBP PBT Putusan</p>
         
      </td>
      
      <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
          <p>Rp. ' . number_format($pnbp_putusan, 0, ",", ".") . '</p>
      </td> 
  </tr>
  <tr class="isi">
      <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
          <p>Redaksi</p>
         
      </td>
      
      <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
          <p>Rp. ' . number_format($redaksi, 0, ",", ".") . '</p>
      </td> 
  </tr>
  <tr class="isi">
      <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
          <p>Materai</p>
         
      </td>
      
      <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
          <p>Rp. ' . number_format($materai, 0, ",", ".") . '</p>
      </td> 
  </tr>
  <tr class="isi">
    <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
        <p><b>Jumlah</b></p>
      
    </td>
  
    <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
        <p><b>Rp. ' . number_format($jumlah_pemohon2, 0, ",", ".") . '</b></p>
    </td> 
  </tr>
  
</table>
<p>Catatan: Biaya Diatas Bisa Lebih Atau Kurang</p>
</body>

</html>
';
$html3 = '
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/logo-pa-pasuruan.png">
    <title>Rincian Dispensasi Nikah</title>
    <style>
    .isi{
      border: 1px solid black;
      border-collapse: collapse;
      
    }

    p{
      font-size:14px;
    }
</style>
</head>

<body>
<table>
<tr>
    <th style="width:10%;">
       <img src="./assets/img/logo-pa-pasuruan-bw.png" width="60" alt="" style="padding-bottom: 6px;">
    </th>
    <th style="padding-left: 30px; padding-bottom: 6px; width:90%;">
        <h2 style="font-size:21px">PENGADILAN AGAMA PASURUAN</h2>
        <h5 style="font-size:15px">Jl. Ir. H. Juanda No. 11-A Telp./Fax.(0343) 410284/ (0343) 431155</h5>
        <h5 style="font-size:15px">PASURUAN 67129 </h5>
        
    </th>
    
</tr>
</table>
<hr style="border: 9px solid black;">
<table class="isi" style="width:100%;" >
<tr class="isi">
      <td colspan="2" class="isi" style="padding: 10px 0; text-align: center">
          <h4>Rincian Biaya Perkara Dispensasi Nikah </h4>
      </td> 
</tr>
  <tr class="isi">
      <td style="text-align: center" class="isi">
          <p>Rincian Kegiatan</p>
         
      </td>
      
      <td style="text-align: center" class="isi">
          <p>Biaya</p>
      </td> 
  </tr>
  <tr class="isi">
      <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
          <p>Pendaftaran</p>
         
      </td>
      
      <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
          <p>Rp. ' . number_format($pendaftaran, 0, ",", ".") . '</p>
      </td> 
  </tr>
  <tr class="isi">
      <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
          <p>Biaya Proses</p>
         
      </td>
      
      <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
          <p>Rp. ' . number_format($proses, 0, ",", ".") . '</p>
      </td> 
  </tr>
  <tr class="isi">
      <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
          <p>Panggilan Pemohon 1 (1 Kali)</p>
          <br>
          <p>Lokasi: KELURAHAN ' . $result1["NM_KEL"] . ', KECAMATAN ' . $result1["NM_KEC"] . '</p>
      </td>
      
      <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
          <p>Rp. ' . number_format($biaya_pemohon, 0, ",", ".") . '</p>
      </td> 
  </tr>
  <tr class="isi">
      <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
          <p>PNBP Panggilan </p>
         
      </td>
      
      <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
          <p>Rp. ' . number_format(($pnbp_pgl1 * 1), 0, ",", ".") . '</p>
      </td> 
  </tr>
  <tr class="isi">
      <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
          <p>Panggilan Pemohon 2 (1 Kali)</p>
          <br>
          <p>Lokasi: KELURAHAN ' . $result2["KELURAHAN"] . ', KECAMATAN ' . $result2["KECAMATAN"] . '</p>
      </td>
      
      <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
          <p>Rp. ' . number_format($biaya_pemohon2, 0, ",", ".") . '</p>
      </td> 
  </tr>
  <tr class="isi">
      <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
          <p>PNBP Panggilan </p>
         
      </td>
      
      <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
          <p>Rp. ' . number_format(($pnbp_pgl1 * 1), 0, ",", ".") . '</p>
      </td> 
  </tr>
  <tr class="isi">
  <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
      <p>Panggilan Pemohon 3 (1 Kali)</p>
      <br>
      <p>Lokasi: KELURAHAN ' . $result3["KELURAHAN"] . ', KECAMATAN ' . $result3["KECAMATAN"] . '</p>
  </td>
  
  <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
      <p>Rp. ' . number_format($biaya_pemohon3, 0, ",", ".") . '</p>
  </td> 
</tr>
<tr class="isi">
  <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
      <p>PNBP Panggilan </p>
     
  </td>
  
  <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
      <p>Rp. ' . number_format(($pnbp_pgl1 * 1), 0, ",", ".") . '</p>
  </td> 
</tr>
  <tr class="isi">
      <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
          <p>PNBP PBT Putusan</p>
         
      </td>
      
      <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
          <p>Rp. ' . number_format($pnbp_putusan, 0, ",", ".") . '</p>
      </td> 
  </tr>
  <tr class="isi">
      <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
          <p>Redaksi</p>
         
      </td>
      
      <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
          <p>Rp. ' . number_format($redaksi, 0, ",", ".") . '</p>
      </td> 
  </tr>
  <tr class="isi">
      <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
          <p>Materai</p>
         
      </td>
      
      <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
          <p>Rp. ' . number_format($materai, 0, ",", ".") . '</p>
      </td> 
  </tr>
  <tr class="isi">
    <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
        <p><b>Jumlah</b></p>
      
    </td>
  
    <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
        <p><b>Rp. ' . number_format($jumlah_pemohon3, 0, ",", ".") . '</b></p>
    </td> 
  </tr>
  
</table>
<p>Catatan: Biaya Diatas Bisa Lebih Atau Kurang</p>
</body>

</html>
';
$html4 = '
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./images/logo-pa-pasuruan.png">
    <title>Rincian Dispensasi Nikah</title>
    <style>
    .isi{
      border: 1px solid black;
      border-collapse: collapse;
      
    }

    p{
      font-size:14px;
    }
</style>
</head>

<body>
<table>
<tr>
    <th style="width:10%;">
       <img src="./assets/img/logo-pa-pasuruan-bw.png" width="60" alt="" style="padding-bottom: 6px;">
    </th>
    <th style="padding-left: 30px; padding-bottom: 6px; width:90%;">
        <h2 style="font-size:21px">PENGADILAN AGAMA PASURUAN</h2>
        <h5 style="font-size:15px">Jl. Ir. H. Juanda No. 11-A Telp./Fax.(0343) 410284/ (0343) 431155</h5>
        <h5 style="font-size:15px">PASURUAN 67129 </h5>
        
    </th>
    
</tr>
</table>
<hr style="border: 9px solid black;">
<table class="isi" style="width:100%;" >
<tr class="isi">
      <td colspan="2" class="isi" style="padding: 10px 0; text-align: center">
          <h4>Rincian Biaya Perkara Dispensasi Nikah </h4>
      </td> 
</tr>
  <tr class="isi">
      <td style="text-align: center" class="isi">
          <p>Rincian Kegiatan</p>
         
      </td>
      
      <td style="text-align: center" class="isi">
          <p>Biaya</p>
      </td> 
  </tr>
  <tr class="isi">
      <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
          <p>Pendaftaran</p>
         
      </td>
      
      <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
          <p>Rp. ' . number_format($pendaftaran, 0, ",", ".") . '</p>
      </td> 
  </tr>
  <tr class="isi">
      <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
          <p>Biaya Proses</p>
         
      </td>
      
      <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
          <p>Rp. ' . number_format($proses, 0, ",", ".") . '</p>
      </td> 
  </tr>
  <tr class="isi">
      <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
          <p>Panggilan Pemohon 1 (1 Kali)</p>
          <br>
          <p>Lokasi: KELURAHAN ' . $result1["NM_KEL"] . ', KECAMATAN ' . $result1["NM_KEC"] . '</p>
      </td>
      
      <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
          <p>Rp. ' . number_format($biaya_pemohon, 0, ",", ".") . '</p>
      </td> 
  </tr>
  <tr class="isi">
      <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
          <p>PNBP Panggilan </p>
         
      </td>
      
      <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
          <p>Rp. ' . number_format(($pnbp_pgl1 * 1), 0, ",", ".") . '</p>
      </td> 
  </tr>
  <tr class="isi">
  <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
      <p>Panggilan Pemohon 2 (1 Kali)</p>
      <br>
      <p>Lokasi: KELURAHAN ' . $result2["KELURAHAN"] . ', KECAMATAN ' . $result2["KECAMATAN"] . '</p>
  </td>
  
  <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
      <p>Rp. ' . number_format($biaya_pemohon2, 0, ",", ".") . '</p>
  </td> 
</tr>
<tr class="isi">
  <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
      <p>PNBP Panggilan </p>
     
  </td>
  
  <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
      <p>Rp. ' . number_format(($pnbp_pgl1 * 1), 0, ",", ".") . '</p>
  </td> 
</tr>

<tr class="isi">
    <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
        <p>Panggilan Pemohon 3 (1 Kali)</p>
        <br>
        <p>Lokasi: KELURAHAN ' . $result3["KELURAHAN"] . ', KECAMATAN ' . $result3["KECAMATAN"] . '</p>
    </td>

    <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
        <p>Rp. ' . number_format($biaya_pemohon3, 0, ",", ".") . '</p>
    </td> 
</tr>
<tr class="isi">
    <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
        <p>PNBP Panggilan </p>
    
    </td>

    <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
        <p>Rp. ' . number_format(($pnbp_pgl1 * 1), 0, ",", ".") . '</p>
    </td> 
</tr>

<tr class="isi">
    <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
        <p>Panggilan Pemohon 4 (1 Kali)</p>
        <br>
        <p>Lokasi: KELURAHAN ' . $result4["KELURAHAN"] . ', KECAMATAN ' . $result4["KECAMATAN"] . '</p>
    </td>

    <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
        <p>Rp. ' . number_format($biaya_pemohon4, 0, ",", ".") . '</p>
    </td> 
</tr>
<tr class="isi">
    <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
        <p>PNBP Panggilan </p>
    
    </td>

    <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
        <p>Rp. ' . number_format(($pnbp_pgl1 * 1), 0, ",", ".") . '</p>
    </td> 
</tr>

  <tr class="isi">
      <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
          <p>PNBP PBT Putusan</p>
         
      </td>
      
      <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
          <p>Rp. ' . number_format($pnbp_putusan, 0, ",", ".") . '</p>
      </td> 
  </tr>
  <tr class="isi">
      <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
          <p>Redaksi</p>
         
      </td>
      
      <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
          <p>Rp. ' . number_format($redaksi, 0, ",", ".") . '</p>
      </td> 
  </tr>
  <tr class="isi">
      <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
          <p>Materai</p>
         
      </td>
      
      <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
          <p>Rp. ' . number_format($materai, 0, ",", ".") . '</p>
      </td> 
  </tr>
  <tr class="isi">
    <td style=" width:25%; padding-left: 10px; padding-top: 10px; text-align: left">
        <p><b>Jumlah</b></p>
      
    </td>
  
    <td style="width:30%; padding-left: 30px; padding-top: 10px; " class="isi">
        <p><b>Rp. ' . number_format($jumlah_pemohon4, 0, ",", ".") . '</b></p>
    </td> 
  </tr>
  
</table>
<p>Catatan: Biaya Diatas Bisa Lebih Atau Kurang</p>
</body>

</html>
';
// Write some HTML code:
if ($jumlah_pemohon == '1') {
    $mpdf->WriteHTML($html1);
} elseif ($jumlah_pemohon == '2') {
    $mpdf->WriteHTML($html2);
} elseif ($jumlah_pemohon == '3') {
    $mpdf->WriteHTML($html3);
} elseif ($jumlah_pemohon == '4') {
    $mpdf->WriteHTML($html4);
}

// Output a PDF file directly to the browser
$mpdf->Output();
