<?php
    require_once "../config/config.php";
    require "../assets/libs/vendor/autoload.php";

if(isset($_POST['add'])) {
    $no_surat_spd = trim(mysqli_real_escape_string($con, $_POST['no_surat_spd']));
    $id_pegawai = trim(mysqli_real_escape_string($con, $_POST['id_pegawai']));
    $tingkat_biaya = trim(mysqli_real_escape_string($con, $_POST['tingkat_biaya']));
    $id_spt = trim(mysqli_real_escape_string($con, $_POST['id_spt']));
    $transportasi = trim(mysqli_real_escape_string($con, $_POST['transportasi']));
    $tujuan = trim(mysqli_real_escape_string($con, $_POST['tujuan']));
    $akun = trim(mysqli_real_escape_string($con, $_POST['akun']));
    $keterangan = trim(mysqli_real_escape_string($con, $_POST['keterangan']));
    $tgl_surat = trim(mysqli_real_escape_string($con, $_POST['tgl_surat']));
    $id_ppk = trim(mysqli_real_escape_string($con, $_POST['id_ppk']));

    $cek_no_surat = mysqli_query($con, "SELECT * FROM tb_spd WHERE no_surat_spd = '$no_surat_spd'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_no_surat) > 0) {
        echo "<script>alert('Nomor Surat sudah ada !');window.location='add.php'</script>";
    } else {
        mysqli_query($con, "INSERT INTO tb_spd (no_surat_spd, id_pegawai, tingkat_biaya, id_spt, transportasi, tujuan, akun, keterangan, tgl_surat_spd, id_ppk) 
                            VALUES ('$no_surat_spd', '$id_pegawai', '$tingkat_biaya', '$id_spt', '$transportasi', '$tujuan', '$akun', '$keterangan', '$tgl_surat', '$id_ppk')") or die (mysqli_error($con));
        echo "<script>window.location='data.php'</script>";  
    } 
    
}else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $no_surat_spd = trim(mysqli_real_escape_string($con, $_POST['no_surat_spd']));
    $id_pegawai = trim(mysqli_real_escape_string($con, $_POST['id_pegawai']));
    $tingkat_biaya = trim(mysqli_real_escape_string($con, $_POST['tingkat_biaya']));
    $id_spt = trim(mysqli_real_escape_string($con, $_POST['id_spt']));
    $transportasi = trim(mysqli_real_escape_string($con, $_POST['transportasi']));
    $tujuan = trim(mysqli_real_escape_string($con, $_POST['tujuan']));
    $akun = trim(mysqli_real_escape_string($con, $_POST['akun']));
    $keterangan = trim(mysqli_real_escape_string($con, $_POST['keterangan']));
    $tgl_surat = trim(mysqli_real_escape_string($con, $_POST['tgl_surat']));
    $id_ppk = trim(mysqli_real_escape_string($con, $_POST['id_ppk']));

    $cek_no_surat = mysqli_query($con, "SELECT * FROM tb_spd WHERE no_surat_spd = '$no_surat_spd' AND id_spd != '$id'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_no_surat) > 0) {
        echo "<script>alert('Nomor Surat sudah ada !');window.location='edit.php?id=$id';</script>";
    } else {
        mysqli_query($con, "UPDATE tb_spd SET no_surat_spd ='$no_surat_spd', id_pegawai ='$id_pegawai', tingkat_biaya ='$tingkat_biaya', id_spt ='$id_spt', transportasi ='$transportasi', tujuan ='$tujuan', akun ='$akun', keterangan ='$keterangan', tgl_surat_spd ='$tgl_surat', id_ppk ='$id_ppk' WHERE id_spd ='$id'") or die (mysqli_error($con));
    echo "<script>window.location='data.php'</script>"; 
    }
    
}
?>