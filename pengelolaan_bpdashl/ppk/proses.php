<?php
    require_once "../config/config.php";
    require "../assets/libs/vendor/autoload.php";

if(isset($_POST['add'])) {
    $nama_ppk = trim(mysqli_real_escape_string($con, $_POST['nama_ppk']));
    $nip = trim(mysqli_real_escape_string($con, $_POST['nip']));
    $seksi_ppk = trim(mysqli_real_escape_string($con, $_POST['seksi_ppk']));

    $cek_nip = mysqli_query($con, "SELECT * FROM tb_ppk WHERE nip = '$nip'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_nip) > 0) {
        echo "<script>alert('NIP/Data sudah ada !');window.location='add.php'</script>";
    } else {
        mysqli_query($con, "INSERT INTO tb_ppk (nama_ppk, nip, seksi_ppk) 
                        VALUES ('$nama_ppk', '$nip', '$seksi_ppk')") or die (mysqli_error($con));
    echo "<script>window.location='data.php'</script>";  
    } 
    
}else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama_ppk = trim(mysqli_real_escape_string($con, $_POST['nama_ppk']));
    $nip = trim(mysqli_real_escape_string($con, $_POST['nip']));
    $seksi_ppk = trim(mysqli_real_escape_string($con, $_POST['seksi_ppk']));

    $cek_nip = mysqli_query($con, "SELECT * FROM tb_ppk WHERE nip = '$nip' AND id_ppk != '$id'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_nip) > 0) {
        echo "<script>alert('NIP/Data sudah ada !');window.location='edit.php?id=$id';</script>";
    } else {
        mysqli_query($con, "UPDATE tb_ppk SET nama_ppk ='$nama_ppk', nip ='$nip', seksi_ppk ='$seksi_ppk' WHERE id_ppk ='$id'") or die (mysqli_error($con));
        echo "<script>window.location='data.php'</script>";   
    } 
}
?>