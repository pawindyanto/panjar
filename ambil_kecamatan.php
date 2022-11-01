<?php
include './config/conn_DBpanjar.php';

$kota_id = $_POST['kota_id'];

$kecamatan = mysqli_query($conn, "SELECT * FROM ref_kecamatan  WHERE KD_KOTA = $kota_id");

while ($d = mysqli_fetch_assoc($kecamatan)) {
    echo '<option value="' . $d['KD_KEC'] . '">' . $d['NM_KEC'] . '</option>';
}
