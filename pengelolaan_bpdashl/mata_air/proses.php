<?php
    require_once "../config/config.php";
    require "../assets/libs/vendor/autoload.php";

if(isset($_POST['add'])) {
    $id = $_POST['id'];
    $nama_mata_air = trim(mysqli_real_escape_string($con, $_POST['nama_mata_air']));
    $ph_air = trim(mysqli_real_escape_string($con, $_POST['ph_air']));
    $desa = trim(mysqli_real_escape_string($con, $_POST['desa']));
    $kecamatan = trim(mysqli_real_escape_string($con, $_POST['kecamatan']));
    $kabupaten = trim(mysqli_real_escape_string($con, $_POST['kabupaten']));
    $provinsi = trim(mysqli_real_escape_string($con, $_POST['provinsi']));
    $jarak = trim(mysqli_real_escape_string($con, $_POST['jarak']));

    mysqli_query($con, "INSERT INTO tb_mata_air (id_mata_air, nama_mata_air, ph_air, desa, kecamatan, kabupaten, provinsi, jarak) 
                        VALUES ('$id', '$nama_mata_air', '$ph_air', '$desa', '$kecamatan', '$kabupaten', '$provinsi', '$jarak')") or die (mysqli_error($con));
    echo "<script>window.location='data.php'</script>";  
}else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $nama_mata_air = trim(mysqli_real_escape_string($con, $_POST['nama_mata_air']));
    $ph_air = trim(mysqli_real_escape_string($con, $_POST['ph_air']));
    $desa = trim(mysqli_real_escape_string($con, $_POST['desa']));
    $kecamatan = trim(mysqli_real_escape_string($con, $_POST['kecamatan']));
    $kabupaten = trim(mysqli_real_escape_string($con, $_POST['kabupaten']));
    $provinsi = trim(mysqli_real_escape_string($con, $_POST['provinsi']));
    $jarak = trim(mysqli_real_escape_string($con, $_POST['jarak']));

    mysqli_query($con, "UPDATE tb_mata_air SET nama_mata_air ='$nama_mata_air', ph_air ='$ph_air', desa ='$desa', kecamatan ='$kecamatan', kabupaten ='$kabupaten', 
                provinsi ='$provinsi', jarak ='$jarak' WHERE id_mata_air ='$id'") or die (mysqli_error($con));
    echo "<script>window.location='data.php'</script>";     
}
?>