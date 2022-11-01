<?php

include './config/conn_DBpanjar.php';

$kecamatan_id = $_POST['kecamatan_id'];

$kecamatan = mysqli_query($conn, "SELECT * FROM ref_kelurahan  WHERE KD_KEC = $kecamatan_id");

while ($d = mysqli_fetch_assoc($kecamatan)) {
    echo '<option value="' . $d['KD_KEL'] . '">' . $d['NM_KEL'] . '</option>';
}
