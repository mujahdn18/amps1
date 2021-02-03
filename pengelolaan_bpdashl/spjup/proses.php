<?php
    require_once "../config/config.php";
    require "../assets/libs/vendor/autoload.php";
    
if(isset($_POST['add'])) {
    $no_kuitansi= trim(mysqli_real_escape_string($con, $_POST['no_kuitansi']));
    $no_drpp = trim(mysqli_real_escape_string($con, $_POST['no_drpp']));
    $seksi = trim(mysqli_real_escape_string($con, $_POST['seksi']));
    $keg = trim(mysqli_real_escape_string($con, $_POST['keg']));
    $jumlah_uang = trim(mysqli_real_escape_string($con, $_POST['jumlah_uang']));
    $ket = trim(mysqli_real_escape_string($con, $_POST['ket']));

    $cek_no_kuitansi = mysqli_query($con, "SELECT * FROM tb_spjup WHERE no_kuitansi = '$no_kuitansi'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_no_kuitansi) > 0) {
        echo "<script>alert('No Kuitansi sudah ada !');window.location='add.php'</script>";
    } else {
        mysqli_query($con, "INSERT INTO tb_spjup (no_kuitansi, no_drpp, seksi, keg, jumlah_uang, ket) 
                        VALUES ('$no_kuitansi', '$no_drpp', '$seksi', '$keg', '$jumlah_uang', '$ket')") or die (mysqli_error($con));
    echo "<script>window.location='data.php'</script>";  
    } 
    
}else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $no_kuitansi= trim(mysqli_real_escape_string($con, $_POST['no_kuitansi']));
    $no_drpp = trim(mysqli_real_escape_string($con, $_POST['no_drpp']));
    $seksi = trim(mysqli_real_escape_string($con, $_POST['seksi']));
    $keg = trim(mysqli_real_escape_string($con, $_POST['keg']));
    $jumlah_uang = trim(mysqli_real_escape_string($con, $_POST['jumlah_uang']));
    $ket = trim(mysqli_real_escape_string($con, $_POST['ket']));

    $cek_no_kuitansi = mysqli_query($con, "SELECT * FROM tb_spjup WHERE no_kuitansi = '$no_kuitansi' AND id_spjup != '$id'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_no_kuitansi) > 0) {
        echo "<script>alert('No Kuitansi sudah ada !');window.location='edit.php?id=$id';</script>";
    } else {
        mysqli_query($con, "UPDATE tb_spjup SET no_kuitansi ='$no_kuitansi', no_drpp ='$no_drpp', seksi ='$seksi', keg ='$keg', 
        jumlah_uang ='$jumlah_uang', ket ='$ket' WHERE id_spjup ='$id'") or die (mysqli_error($con));
        echo "<script>window.location='data.php'</script>";   
    } 
}
?>