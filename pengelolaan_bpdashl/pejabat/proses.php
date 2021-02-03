<?php
    require_once "../config/config.php";
    require "../assets/libs/vendor/autoload.php";

if(isset($_POST['add'])) {
    $nama_pejabat = trim(mysqli_real_escape_string($con, $_POST['nama_pejabat']));
    $nip = trim(mysqli_real_escape_string($con, $_POST['nip']));
    $jabatan = trim(mysqli_real_escape_string($con, $_POST['jabatan']));
    $seksi_pejabat = trim(mysqli_real_escape_string($con, $_POST['seksi_pejabat']));

    $cek_nip = mysqli_query($con, "SELECT * FROM tb_pejabat WHERE nip = '$nip'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_nip) > 0) {
        echo "<script>alert('NIP/Data sudah ada !');window.location='add.php'</script>";
    } else {
        mysqli_query($con, "INSERT INTO tb_pejabat (nama_pejabat, nip, jabatan, seksi_pejabat) 
                        VALUES ('$nama_pejabat', '$nip', '$jabatan', '$seksi_pejabat')") or die (mysqli_error($con));
    echo "<script>window.location='data.php'</script>";  
    } 
    
}else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama_pejabat = trim(mysqli_real_escape_string($con, $_POST['nama_pejabat']));
    $nip = trim(mysqli_real_escape_string($con, $_POST['nip']));
    $jabatan = trim(mysqli_real_escape_string($con, $_POST['jabatan']));
    $seksi_pejabat = trim(mysqli_real_escape_string($con, $_POST['seksi_pejabat']));

    $cek_nip = mysqli_query($con, "SELECT * FROM tb_pejabat WHERE nip = '$nip' AND id_pejabat != '$id'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_nip) > 0) {
        echo "<script>alert('NIP/Data sudah ada !');window.location='edit.php?id=$id';</script>";
    } else {
        mysqli_query($con, "UPDATE tb_pejabat SET nama_pejabat ='$nama_pejabat', nip ='$nip', jabatan ='$jabatan', seksi_pejabat ='$seksi_pejabat' WHERE id_pejabat ='$id'") or die (mysqli_error($con));
        echo "<script>window.location='data.php'</script>";   
    } 
}
?>