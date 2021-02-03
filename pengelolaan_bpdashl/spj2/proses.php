<?php
    require_once "../config/config.php";
    require "../assets/libs/vendor/autoload.php";

if(isset($_POST['add'])) {
    $no_surat_spj = trim(mysqli_real_escape_string($con, $_POST['no_surat_spj']));
    $id_pegawai = trim(mysqli_real_escape_string($con, $_POST['id_pegawai']));
    $id_spt = trim(mysqli_real_escape_string($con, $_POST['id_spt']));
    $id_spd = trim(mysqli_real_escape_string($con, $_POST['id_spd']));
    $id_ppk = trim(mysqli_real_escape_string($con, $_POST['id_ppk']));
    $id_pejabat = trim(mysqli_real_escape_string($con, $_POST['id_pejabat']));
    $mak = trim(mysqli_real_escape_string($con, $_POST['mak']));
    $u_harian = trim(mysqli_real_escape_string($con, $_POST['u_harian']));

    $jangka_waktu = mysqli_query($con, "SELECT jangka_waktu from tb_spt where id_spt = '$id_spt'");
    $row = mysqli_fetch_assoc($jangka_waktu);

    $u_transportasi = trim(mysqli_real_escape_string($con, $_POST['u_transportasi']));
    $u_penginapan = trim(mysqli_real_escape_string($con, $_POST['u_penginapan']));
    $tgl_surat = trim(mysqli_real_escape_string($con, $_POST['tgl_surat']));
    $total_u_harian = $u_harian * $row['jangka_waktu'];
    $jumlah_uang = $total_u_harian+ $u_transportasi + $u_penginapan;

    $cek_no_surat = mysqli_query($con, "SELECT * FROM tb_spj WHERE no_surat_spj = '$no_surat_spj'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_no_surat) > 0) {
        echo "<script>alert('Nomor Surat sudah ada !');window.location='add.php'</script>";
    } else {
        mysqli_query($con, "INSERT INTO tb_spj (no_surat_spj, id_pegawai, id_spt, id_ppk, id_pejabat, mak, jumlah_uang, tgl_surat_spj, id_spd, u_harian, total_u_harian, u_transportasi, u_penginapan) 
                            VALUES ('$no_surat_spj', '$id_pegawai', '$id_spt', '$id_ppk', '$id_pejabat', '$mak', '$jumlah_uang', '$tgl_surat', '$id_spd', '$u_harian', '$total_u_harian', '$u_transportasi', '$u_penginapan')") or die (mysqli_error($con));
        echo "<script>window.location='data.php'</script>";  
    } 
    
}else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $no_surat_spj = trim(mysqli_real_escape_string($con, $_POST['no_surat_spj']));
    $id_pegawai = trim(mysqli_real_escape_string($con, $_POST['id_pegawai']));
    $id_spt = trim(mysqli_real_escape_string($con, $_POST['id_spt']));
    $id_spd = trim(mysqli_real_escape_string($con, $_POST['id_spd']));
    $id_ppk = trim(mysqli_real_escape_string($con, $_POST['id_ppk']));
    $id_pejabat = trim(mysqli_real_escape_string($con, $_POST['id_pejabat']));
    $mak = trim(mysqli_real_escape_string($con, $_POST['mak']));
    $u_harian = trim(mysqli_real_escape_string($con, $_POST['u_harian']));
    
    $jangka_waktu = mysqli_query($con, "SELECT jangka_waktu from tb_spt where id_spt = '$id_spt'");
    $row = mysqli_fetch_assoc($jangka_waktu);

    $u_transportasi = trim(mysqli_real_escape_string($con, $_POST['u_transportasi']));
    $u_penginapan = trim(mysqli_real_escape_string($con, $_POST['u_penginapan']));
    $tgl_surat = trim(mysqli_real_escape_string($con, $_POST['tgl_surat']));
    $total_u_harian = $u_harian * $row['jangka_waktu'];
    $jumlah_uang = $total_u_harian+ $u_transportasi + $u_penginapan;

    $cek_no_surat = mysqli_query($con, "SELECT * FROM tb_spj WHERE no_surat_spj = '$no_surat_spj' AND id_spj != '$id'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_no_surat) > 0) {
        echo "<script>alert('Nomor Surat sudah ada !');window.location='edit.php?id=$id';</script>";
    } else {
        mysqli_query($con, "UPDATE tb_spj SET no_surat_spj ='$no_surat_spj', id_pegawai ='$id_pegawai', id_spt ='$id_spt', id_ppk ='$id_ppk', id_pejabat ='$id_pejabat', mak ='$mak', jumlah_uang ='$jumlah_uang', tgl_surat_spj ='$tgl_surat', id_spd ='$id_spd', u_harian ='$u_harian', total_u_harian ='$total_u_harian', u_transportasi ='$u_transportasi', u_penginapan ='$u_penginapan' WHERE id_spj ='$id'") or die (mysqli_error($con));
    echo "<script>window.location='data.php'</script>";
    } 
}
?>