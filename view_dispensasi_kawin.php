<?php
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


if ($jumlah == '1') {
echo  
} elseif ($jumlah == '2') {
}
elseif ($jumlah == '2') {
}
elseif ($jumlah == '2') {
}
?>