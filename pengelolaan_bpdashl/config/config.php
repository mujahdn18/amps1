<?php

date_default_timezone_set('Asia/Jakarta');

session_start();

$con = mysqli_connect('localhost', 'root', '', 'pengelolaan_bpdashl');
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
}
function base_url($url = null) {
    $base_url = "http://localhost/pengelolaan_bpdashl";
    if ($url != null) {
        return $base_url."/".$url;
    } else {
        return $base_url;
    }
}
function tgl_indo($tgl) {
    $bulan = array(
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember',
    );
    $pecahkan = explode('-', $tgl);
    return $pecahkan[2].' '. $bulan[(int)$pecahkan[1]].' '.$pecahkan[0];
}
function tgl_indoyb($tgl) {
    $bulan = array(
        1 => 'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember',
    );
    $pecahkan = explode('-', $tgl);
    return $bulan[(int)$pecahkan[1]].' '.$pecahkan[0];
}
function tampil_tgl($tgl1,$tgl2) {
    $db = $con;
    $sql = "SELECT * FROM tb_sm WHERE tgl_agenda BETWEEN '$tgl1' AND '$tgl2'";
    $query = $db->query($sql) or die ($db->error);
    return $query;
}
function rupiah($angka){
    $hasil="Rp." . number_format($angka, 2, ',','.');
    return $hasil;
}
function terbilang($angka){
    $angka = (float) $angka;
    $bilangan = array('','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan','Sepuluh','Sebelas');

    if($angka < 12 ){
        return $bilangan[$angka];
    }
    elseif($angka < 20){
        return $bilangan[$angka - 10]." Belas";
    }
    elseif($angka < 100){
        $hasil_bagi = (int)($angka / 10);
        $hasil_mod = $angka % 10;
        return trim(sprintf('%s Puluh %s', $bilangan[$hasil_bagi], $bilangan[$hasil_mod]));
    }
    elseif($angka < 200){
        return sprintf('Seratus %s', terbilang($angka - 100));
    }
    elseif($angka < 1000){
        $hasil_bagi = (int)($angka / 100);
        $hasil_mod = $angka % 100;
        return trim(sprintf('%s Ratus %s', $bilangan[$hasil_bagi], terbilang($hasil_mod)));
    }
    elseif($angka < 2000){
        return sprintf('Seribu %s', terbilang($angka - 1000));
    }
    elseif($angka < 1000000){
        $hasil_bagi = (int)($angka / 1000);
        $hasil_mod = $angka % 1000;
        return trim(sprintf('%s Ribu %s', terbilang($hasil_bagi), terbilang($hasil_mod)));
    }
    elseif($angka < 1000000000){
        $hasil_bagi = (int)($angka / 1000000);
        $hasil_mod = $angka % 1000000;
        return trim(sprintf('%s Juta %s', terbilang($hasil_bagi), terbilang($hasil_mod)));
    }

    
}
// $nominal = 1234567890;
//     echo "nominal  : ".rupiah($nominal);
//     echo "<br>";
//     echo "terbilang  : ".terbilang($nominal).' Rupiah';
?>