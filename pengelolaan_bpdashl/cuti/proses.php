<?php
    require_once "../config/config.php";
    require "../assets/libs/vendor/autoload.php";

if(isset($_POST['add'])) {
    $tgl_cuti = trim(mysqli_real_escape_string($con, $_POST['tgl_cuti']));
    $perihal = trim(mysqli_real_escape_string($con, $_POST['perihal']));
    $id_pegawai = trim(mysqli_real_escape_string($con, $_POST['id_pegawai']));
    $jangka_hari = trim(mysqli_real_escape_string($con, $_POST['jangka_hari']));
    $dari_tgl = trim(mysqli_real_escape_string($con, $_POST['dari_tgl']));
    $sampai_tgl = trim(mysqli_real_escape_string($con, $_POST['sampai_tgl']));
    $keterangan = trim(mysqli_real_escape_string($con, $_POST['keterangan']));
    
    
    mysqli_query($con, "INSERT INTO tb_cuti (tgl_cuti, perihal, id_pegawai, jangka_hari, dari_tgl, sampai_tgl, keterangan) 
    VALUES ('$tgl_cuti', '$perihal', '$id_pegawai', '$jangka_hari', '$dari_tgl', '$sampai_tgl', '$keterangan')") or die (mysqli_error($con));
    echo "<script>window.location='data.php'</script>";
    
}else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $tgl_cuti = trim(mysqli_real_escape_string($con, $_POST['tgl_cuti']));
    $perihal = trim(mysqli_real_escape_string($con, $_POST['perihal']));
    $id_pegawai = trim(mysqli_real_escape_string($con, $_POST['id_pegawai']));
    $jangka_hari = trim(mysqli_real_escape_string($con, $_POST['jangka_hari']));
    $dari_tgl = trim(mysqli_real_escape_string($con, $_POST['dari_tgl']));
    $sampai_tgl = trim(mysqli_real_escape_string($con, $_POST['sampai_tgl']));
    $keterangan = trim(mysqli_real_escape_string($con, $_POST['keterangan']));
    
    
    mysqli_query($con, "UPDATE tb_cuti SET tgl_cuti='$tgl_cuti', perihal='$perihal', id_pegawai='$id_pegawai', 
    jangka_hari='$jangka_hari', dari_tgl='$dari_tgl', sampai_tgl='$sampai_tgl', keterangan='$keterangan' 
    WHERE id_cuti='$id'") or die (mysqli_error($con));
    echo "<script>window.location='data.php'</script>";
}
?>