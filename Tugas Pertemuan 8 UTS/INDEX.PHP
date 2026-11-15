
<?php
// Fungsi untuk menghitung diskon berdasarkan total belanja.
function hitungDiskon($totalBelanja) {
    $diskon = 0;

    if ($totalBelanja >= 100000) {
        $diskon = 0.10 * $totalBelanja;
    } elseif ($totalBelanja >= 50000) {
        $diskon = 0.05 * $totalBelanja;
    }

    return $diskon;
}

$totalBelanja = null;
$diskon = null;
$totalBayar = null;
$persentaseDiskon = 0;
$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $input = $_POST["total_belanja"] ?? "";

    if ($input === "" || !is_numeric($input) || (float)$input < 0) {
        $error = "Masukkan total belanja berupa angka dan tidak boleh negatif.";
    } else {
        $totalBelanja = (float)$input;
        $diskon = hitungDiskon($totalBelanja);
        $totalBayar = $totalBelanja - $diskon;

        if ($totalBelanja >= 100000) {
            $persentaseDiskon = 10;
        } elseif ($totalBelanja >= 50000) {
            $persentaseDiskon = 5;
        }
    }
}

function rupiah($angka) {
    return "Rp " . number_format($angka, 0, ",", ".");
}
?>


