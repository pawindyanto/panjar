<?php

$conn = mysqli_connect("localhost", "root", "", "panjar");




// Function

function terbilang($x)
{
    $abil = array(
        "", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan",
        "Sepuluh", "Sebelas"
    );
    if ($x < 12) return " " . $abil[$x];
    elseif ($x < 20) return terbilang($x - 10) . " Belas";
    elseif ($x < 100) return terbilang($x / 10) . " Puluh" . terbilang($x % 10);
    elseif ($x < 200) return " Seratus" . terbilang($x - 100);
    elseif ($x < 1000) return terbilang($x / 100) . " Ratus" . terbilang($x % 100);
    elseif ($x < 2000) return " Seribu" . terbilang($x - 1000);
    elseif ($x < 1000000) return terbilang($x / 1000) . " Ribu" . terbilang($x % 1000);
    elseif ($x < 1000000000) return terbilang($x / 1000000) . " Juta" . terbilang($x % 1000000);
}
