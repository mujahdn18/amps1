<?php
    require_once "../config/config.php";
    require "../assets/libs/vendor/autoload.php";

if(isset($_POST['add'])) {
    $no_bukti = trim(mysqli_real_escape_string($con, $_POST['no_bukti']));
    $jenis_transaksi = trim(mysqli_real_escape_string($con, $_POST['jenis_transaksi']));
    $tgl_transaksi = trim(mysqli_real_escape_string($con, $_POST['tgl_transaksi']));
    $penerima = trim(mysqli_real_escape_string($con, $_POST['penerima']));
    $keg = trim(mysqli_real_escape_string($con, $_POST['keg']));
    $jumlah_uang = trim(mysqli_real_escape_string($con, $_POST['jumlah_uang']));

    $cek_no_bukti = mysqli_query($con, "SELECT * FROM tb_transaksi WHERE no_bukti = '$no_bukti'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_no_bukti) > 0) {
        echo "<script>alert('No Bukti sudah ada !');window.location='add.php'</script>";
    } else {
        mysqli_query($con, "INSERT INTO tb_transaksi (no_bukti, jenis_transaksi, tgl_transaksi, penerima, keg, jumlah_uang) 
                        VALUES ('$no_bukti', '$jenis_transaksi', '$tgl_transaksi', '$penerima', '$keg', '$jumlah_uang')") or die (mysqli_error($con));
    echo "<script>window.location='data.php'</script>";  
    } 
    
}else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $no_bukti = trim(mysqli_real_escape_string($con, $_POST['no_bukti']));
    $jenis_transaksi = trim(mysqli_real_escape_string($con, $_POST['jenis_transaksi']));
    $tgl_transaksi = trim(mysqli_real_escape_string($con, $_POST['tgl_transaksi']));
    $penerima = trim(mysqli_real_escape_string($con, $_POST['penerima']));
    $keg = trim(mysqli_real_escape_string($con, $_POST['keg']));
    $jumlah_uang = trim(mysqli_real_escape_string($con, $_POST['jumlah_uang']));

    $cek_no_bukti = mysqli_query($con, "SELECT * FROM tb_transaksi WHERE no_bukti = '$no_bukti' AND id_transaksi != '$id'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_no_bukti) > 0) {
        echo "<script>alert('No Bukti sudah ada !');window.location='edit.php?id=$id';</script>";
    } else {
        mysqli_query($con, "UPDATE tb_transaksi SET no_bukti ='$no_bukti', jenis_transaksi ='$jenis_transaksi', tgl_transaksi ='$tgl_transaksi', penerima ='$penerima', keg ='$keg', 
        jumlah_uang ='$jumlah_uang' WHERE id_transaksi ='$id'") or die (mysqli_error($con));
        echo "<script>window.location='data.php'</script>";   
    } 
}
?>