<?php
    require_once "../config/config.php";
    require "../assets/libs/vendor/autoload.php";

if(isset($_POST['add'])) {
    $id = $_POST['id'];
    $kode_absen = trim(mysqli_real_escape_string($con, $_POST['kode_absen']));
    $tgl_absen = trim(mysqli_real_escape_string($con, $_POST['tgl_absen']));
    $id_pegawai = trim(mysqli_real_escape_string($con, $_POST['id_pegawai']));
    $masuk = trim(mysqli_real_escape_string($con, $_POST['masuk']));
    $telat = trim(mysqli_real_escape_string($con, $_POST['telat']));
    $izin = trim(mysqli_real_escape_string($con, $_POST['izin']));
    $sakit = trim(mysqli_real_escape_string($con, $_POST['sakit']));
    $lembur = trim(mysqli_real_escape_string($con, $_POST['lembur']));

    $jmlmasuk = $masuk * 15000;
    $jmltelat = $telat * 7000;
    $jmlizin = $izin * 5000;
    $jmlsakit = $sakit * 6000;
    $jmllembur = $lembur * 10000;

    $total = $jmlmasuk + $jmltelat + $jmlizin + $jmlsakit + $jmllembur;

    $cek_kode_absen = mysqli_query($con, "SELECT * FROM tb_absen WHERE kode_absen = '$kode_absen'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_kode_absen) > 0) {
        echo "<script>alert('Kode sudah ada !');window.location='add.php'</script>";
    } else {
    mysqli_query($con, "INSERT INTO tb_absen (id_absen, kode_absen, tgl_absen, id_pegawai, masuk, telat, izin, sakit, lembur, jml_masuk, jml_telat, jml_izin, jml_sakit, jml_lembur, total) 
        VALUES ('$id', '$kode_absen', '$tgl_absen', '$id_pegawai', '$masuk', '$telat', '$izin', '$sakit', '$lembur', '$jmlmasuk', '$jmltelat', '$jmlizin', '$jmlsakit', '$jmllembur', '$total')") or die (mysqli_error($con));
    echo "<script>window.location='data.php'</script>";  
    }     
}else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $kode_absen = trim(mysqli_real_escape_string($con, $_POST['kode_absen']));
    $tgl_absen = trim(mysqli_real_escape_string($con, $_POST['tgl_absen']));
    $id_pegawai = trim(mysqli_real_escape_string($con, $_POST['id_pegawai']));
    $masuk = trim(mysqli_real_escape_string($con, $_POST['masuk']));
    $telat = trim(mysqli_real_escape_string($con, $_POST['telat']));
    $izin = trim(mysqli_real_escape_string($con, $_POST['izin']));
    $sakit = trim(mysqli_real_escape_string($con, $_POST['sakit']));
    $lembur = trim(mysqli_real_escape_string($con, $_POST['lembur']));

    $jmlmasuk = $masuk * 15000;
    $jmltelat = $telat * 7000;
    $jmlizin = $izin * 5000;
    $jmlsakit = $sakit * 6000;
    $jmllembur = $lembur * 10000;

    $total = $jmlmasuk + $jmltelat + $jmlizin + $jmlsakit + $jmllembur;

    $cek_kode_absen = mysqli_query($con, "SELECT * FROM tb_absen WHERE kode_absen = '$kode_absen' AND id_absen != '$id'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_kode_absen) > 0) {
        echo "<script>alert('Kode sudah ada !');window.location='edit.php?id=$id';</script>";
    } else {
        mysqli_query($con, "UPDATE tb_absen SET kode_absen='$kode_absen', tgl_absen='$tgl_absen', id_pegawai='$id_pegawai', masuk='$masuk', telat='$telat', izin='$izin', sakit='$sakit', lembur='$lembur', jml_masuk='$jmlmasuk', jml_telat='$jmltelat', jml_izin='$jmlizin', jml_sakit='$jmlsakit', jml_lembur='$jmllembur', total='$total' WHERE id_absen='$id'") or die (mysqli_error($con));
        echo "<script>window.location='data.php'</script>";
    } 
}
?>