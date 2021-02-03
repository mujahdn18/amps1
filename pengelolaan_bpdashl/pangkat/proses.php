<?php
    require_once "../config/config.php";
    require "../assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])) {
    $id = $_POST['id_pangkat'];
    $pangkat = trim(mysqli_real_escape_string($con, $_POST['pangkat']));
    $gapok = trim(mysqli_real_escape_string($con, $_POST['gapok']));

    $cek_pangkat = mysqli_query($con, "SELECT * FROM tb_pangkat WHERE pangkat = '$pangkat'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_pangkat) > 0) {
        echo "<script>alert('Pangkat sudah ada !');window.location='add.php'</script>";
    } else {
        mysqli_query($con, "INSERT INTO tb_pangkat (id_pangkat, pangkat, gapok) VALUES ('$id', '$pangkat', '$gapok')") or die (mysqli_error($con));
        echo "<script>window.location='data.php'</script>"; 
    } 
}else if(isset($_POST['edit'])) {
    $id = $_POST['id_pangkat'];
    $pangkat = trim(mysqli_real_escape_string($con, $_POST['pangkat']));
    $gapok = trim(mysqli_real_escape_string($con, $_POST['gapok']));

    $cek_pangkat = mysqli_query($con, "SELECT * FROM tb_pangkat WHERE pangkat = '$pangkat' AND id_pangkat != '$id'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_pangkat) > 0) {
        echo "<script>alert('Pangkat sudah ada !');window.location='edit.php?id=$id';</script>";
    } else {
        mysqli_query($con, "UPDATE tb_pangkat SET pangkat ='$pangkat', gapok ='$gapok' WHERE id_pangkat ='$id'") or die (mysqli_error($con));
        echo "<script>window.location='data.php'</script>";
    }      
}
?>