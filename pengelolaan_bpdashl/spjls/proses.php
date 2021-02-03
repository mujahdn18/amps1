<?php
    require_once "../config/config.php";
    require "../assets/libs/vendor/autoload.php";

if(isset($_POST['add'])) {
    $id_spt= trim(mysqli_real_escape_string($con, $_POST['id_spt']));
    $no_spm = trim(mysqli_real_escape_string($con, $_POST['no_spm']));
    $tgl_spm = trim(mysqli_real_escape_string($con, $_POST['tgl_spm']));
    $seksi = trim(mysqli_real_escape_string($con, $_POST['seksi']));
    $jumlah_uang = trim(mysqli_real_escape_string($con, $_POST['jumlah_uang']));
    $ket = trim(mysqli_real_escape_string($con, $_POST['ket']));

    mysqli_query($con, "INSERT INTO tb_spjls (id_spt, no_spm, tgl_spm, seksi, jumlah_uang, ket) 
                        VALUES ('$id_spt', '$no_spm', '$tgl_spm', '$seksi', '$jumlah_uang', '$ket')") or die (mysqli_error($con));
    echo "<script>window.location='data.php'</script>";      
}else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $id_spt= trim(mysqli_real_escape_string($con, $_POST['id_spt']));
    $no_spm = trim(mysqli_real_escape_string($con, $_POST['no_spm']));
    $tgl_spm = trim(mysqli_real_escape_string($con, $_POST['tgl_spm']));
    $seksi = trim(mysqli_real_escape_string($con, $_POST['seksi']));
    $jumlah_uang = trim(mysqli_real_escape_string($con, $_POST['jumlah_uang']));
    $ket = trim(mysqli_real_escape_string($con, $_POST['ket']));
    
    mysqli_query($con, "UPDATE tb_spjls SET id_spt ='$id_spt', no_spm ='$no_spm', tgl_spm ='$tgl_spm', seksi ='$seksi', 
                        jumlah_uang ='$jumlah_uang', ket ='$ket' WHERE id_spjls ='$id'") or die (mysqli_error($con));
    echo "<script>window.location='data.php'</script>";   
     
}
?>