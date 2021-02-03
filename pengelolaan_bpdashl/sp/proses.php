<?php
    require_once "../config/config.php";
    require "../assets/libs/vendor/autoload.php";

if(isset($_POST['add'])) {
    $no_sp = trim(mysqli_real_escape_string($con, $_POST['no_sp']));
    $id_pegawai = trim(mysqli_real_escape_string($con, $_POST['id_pegawai']));
    $keterangan = trim(mysqli_real_escape_string($con, $_POST['keterangan']));
    $tgl_sp = trim(mysqli_real_escape_string($con, $_POST['tgl_sp']));
    
    
    mysqli_query($con, "INSERT INTO tb_sp (no_sp, id_pegawai, keterangan, tgl_sp) 
    VALUES ('$no_sp', '$id_pegawai', '$keterangan', '$tgl_sp')") or die (mysqli_error($con));
    echo "<script>window.location='data.php'</script>";
    
}else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $no_sp = trim(mysqli_real_escape_string($con, $_POST['no_sp']));
    $id_pegawai = trim(mysqli_real_escape_string($con, $_POST['id_pegawai']));
    $keterangan = trim(mysqli_real_escape_string($con, $_POST['keterangan']));
    $tgl_sp = trim(mysqli_real_escape_string($con, $_POST['tgl_sp']));
    
    
    mysqli_query($con, "UPDATE tb_sp SET no_sp='$no_sp', id_pegawai='$id_pegawai', keterangan='$keterangan', tgl_sp='$tgl_sp' WHERE id_sp='$id'") or die (mysqli_error($con));
    echo "<script>window.location='data.php'</script>";
}
?>