<?php
    require_once "../config/config.php";
    require "../assets/libs/vendor/autoload.php";

if(isset($_POST['add'])) {
    $namaorg_sma = trim(mysqli_real_escape_string($con, $_POST['namaorg_sma']));
    $dthn_sma = trim(mysqli_real_escape_string($con, $_POST['dthn_sma']));
    $sthn_sma = trim(mysqli_real_escape_string($con, $_POST['sthn_sma']));
    $noijazah_sma = trim(mysqli_real_escape_string($con, $_POST['noijazah_sma']));
    $nama_sma = trim(mysqli_real_escape_string($con, $_POST['nama_sma']));
    $kota_sma = trim(mysqli_real_escape_string($con, $_POST['kota_sma']));
    $file = $_FILES['file']['name'];    

    $cek_noijazah_sma = mysqli_query($con, "SELECT * FROM tb_rpsma WHERE noijazah_sma = '$noijazah_sma'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_noijazah_sma) > 0) {
        echo "<script>alert('No Ijazah sudah ada !');window.location='add.php'</script>";
    } else {
        $ekstensi_diperbolehkan = array('pdf');
        $nama = $_FILES['file']['name'];
        $x = explode('.', $nama);
        $ekstensi = strtolower (end($x));
        $ukuran = $_FILES['file']['size'];
    
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                if($ukuran < 1044070) {
                    move_uploaded_file($_FILES['file']['tmp_name'], '../assets/fileijazah_sma/'.$nama);
                    $query =mysqli_query($con, "INSERT INTO tb_rpsma (namaorg_sma, dthn_sma, sthn_sma, noijazah_sma, nama_sma, kota_sma, fileijazah_sma) 
                    VALUES ('$namaorg_sma', '$dthn_sma', '$sthn_sma', '$noijazah_sma', '$nama_sma', '$kota_sma', '$file')") or die (mysqli_error($con));
                    echo "<script>window.location='data.php'</script>";
                    if($query){
                        echo 'File Berhasil di upload';
                    }else {
                        echo 'Gagal mengupload file';
                    }
                }else {
                    echo 'Ukuran file terlalu besar';
                }
            }else {
                echo 'Ekstensi/format file yang diupload tidak diperbolehkan';
            }
    }
}else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $namaorg_sma = trim(mysqli_real_escape_string($con, $_POST['namaorg_sma']));
    $dthn_sma = trim(mysqli_real_escape_string($con, $_POST['dthn_sma']));
    $sthn_sma = trim(mysqli_real_escape_string($con, $_POST['sthn_sma']));
    $noijazah_sma = trim(mysqli_real_escape_string($con, $_POST['noijazah_sma']));
    $nama_sma = trim(mysqli_real_escape_string($con, $_POST['nama_sma']));
    $kota_sma = trim(mysqli_real_escape_string($con, $_POST['kota_sma']));
    $file = $_FILES['file']['name'];    

    $cek_noijazah_sma = mysqli_query($con, "SELECT * FROM tb_rpsma WHERE noijazah_sma = '$noijazah_sma'  AND id_sma != '$id'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_noijazah_sma) > 0) {
        echo "<script>alert('No Ijazah sudah ada !');window.location='edit.php?id=$id';</script>";
    } else {
        $ekstensi_diperbolehkan = array('pdf');
        $nama = $_FILES['file']['name'];
        $x = explode('.', $nama);
        $ekstensi = strtolower (end($x));
        $ukuran = $_FILES['file']['size'];
    
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                if($ukuran < 1044070) {
                    move_uploaded_file($_FILES['file']['tmp_name'], '../assets/fileijazah_sma/'.$nama);
                    $query =mysqli_query($con, "UPDATE tb_rpsma SET namaorg_sma ='$namaorg_sma', dthn_sma ='$dthn_sma', sthn_sma ='$sthn_sma', noijazah_sma ='$noijazah_sma', nama_sma ='$nama_sma', 
                    kota_sma ='$kota_sma', fileijazah_sma ='$file' WHERE id_sma ='$id'") or die (mysqli_error($con));
                    echo "<script>window.location='data.php'</script>"; 
                    if($query){
                        echo 'File Berhasil di upload';
                    }else {
                        echo 'Gagal mengupload file';
                    }
                }else {
                    echo 'Ukuran file terlalu besar';
                }
            }else {
                echo 'Ekstensi/format file yang diupload tidak diperbolehkan';
            }    
    }
}
?>