<?php
    require_once "../config/config.php";
    require "../assets/libs/vendor/autoload.php";

if(isset($_POST['add'])) {
    $id = $_POST['id'];
    $no_anggaran = trim(mysqli_real_escape_string($con, $_POST['no_anggaran']));
    $jumlah_uangpl = trim(mysqli_real_escape_string($con, $_POST['jumlah_uangpl']));
    $jumlah_uangnonpl = trim(mysqli_real_escape_string($con, $_POST['jumlah_uangnonpl']));
    $id_ppk = trim(mysqli_real_escape_string($con, $_POST['id_ppk']));

    $cek_no_anggaran = mysqli_query($con, "SELECT * FROM tb_anggaran WHERE no_anggaran = '$no_anggaran'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_no_anggaran) > 0) {
        echo "<script>alert('No Anggaran sudah ada !');window.location='add.php'</script>";
    } else {
        mysqli_query($con, "INSERT INTO tb_anggaran (id_anggaran, no_anggaran, jumlah_uangpl, jumlah_uangnonpl, id_ppk) 
                        VALUES ('$id', '$no_anggaran', '$jumlah_uangpl', '$jumlah_uangnonpl', '$id_ppk')") or die (mysqli_error($con));
    echo "<script>window.location='data.php'</script>";  
    } 
    
}else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $no_anggaran = trim(mysqli_real_escape_string($con, $_POST['no_anggaran']));
    $jumlah_uangpl = trim(mysqli_real_escape_string($con, $_POST['jumlah_uangpl']));
    $jumlah_uangnonpl = trim(mysqli_real_escape_string($con, $_POST['jumlah_uangnonpl']));
    $id_ppk = trim(mysqli_real_escape_string($con, $_POST['id_ppk']));

    $cek_no_anggaran = mysqli_query($con, "SELECT * FROM tb_anggaran WHERE no_anggaran = '$no_anggaran' AND id_anggaran != '$id'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_no_anggaran) > 0) {
        echo "<script>alert('No Anggaran sudah ada !');window.location='edit.php?id=$id';</script>";
    } else {
        mysqli_query($con, "UPDATE tb_anggaran SET no_anggaran ='$no_anggaran', jumlah_uangpl ='$jumlah_uangpl', jumlah_uangnonpl ='$jumlah_uangnonpl', id_ppk ='$id_ppk' WHERE id_anggaran ='$id'") or die (mysqli_error($con));
        echo "<script>window.location='data.php'</script>";   
    } 
}
?>