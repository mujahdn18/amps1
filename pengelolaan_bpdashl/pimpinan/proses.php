<?php
require_once "../config/config.php";
require "../assets/libs/vendor/autoload.php";

if(isset($_POST['add'])){
    $nama_pimpinan=mysqli_real_escape_string($con, $_POST['nama_pimpinan']);
    $nip_pimpinan=mysqli_real_escape_string($con, $_POST['nip_pimpinan']);
    $id_pangkat=mysqli_real_escape_string($con, $_POST['id_pangkat']);
    $alamat_pimpinan=mysqli_real_escape_string($con, $_POST['alamat_pimpinan']);

    mysqli_query($con, "INSERT INTO tb_pimpinan (nama_pimpinan, nip_pimpinan, id_pangkat, alamat_pimpinan) 
    VALUES ('$nama_pimpinan', '$nip_pimpinan', '$id_pangkat', '$alamat_pimpinan')") or die(mysqli_error($con));
    echo "<script>window.location='data.php'</script>";
}elseif(isset($_POST['edit'])){
    $id=$_POST['id'];
    $nama_pimpinan=mysqli_real_escape_string($con, $_POST['nama_pimpinan']);
    $nip_pimpinan=mysqli_real_escape_string($con, $_POST['nip_pimpinan']);
    $id_pangkat=mysqli_real_escape_string($con, $_POST['id_pangkat']);
    $alamat_pimpinan=mysqli_real_escape_string($con, $_POST['alamat_pimpinan']);

    mysqli_query($con, "UPDATE tb_pimpinan SET nama_pimpinan='$nama_pimpinan', nip_pimpinan='$nip_pimpinan', id_pangkat='$id_pangkat', alamat_pimpinan='$alamat_pimpinan' WHERE id_pimpinan='$id'") or die(mysqli_error($con));
    echo "<script>window.location='data.php'</script>";
}
?>