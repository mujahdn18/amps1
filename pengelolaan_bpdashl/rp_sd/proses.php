<?php
    require_once "../config/config.php";
    require "../assets/libs/vendor/autoload.php";

if(isset($_POST['add'])) {
    $namaorg_sd = trim(mysqli_real_escape_string($con, $_POST['namaorg_sd']));
    $dthn_sd = trim(mysqli_real_escape_string($con, $_POST['dthn_sd']));
    $sthn_sd = trim(mysqli_real_escape_string($con, $_POST['sthn_sd']));
    $noijazah_sd = trim(mysqli_real_escape_string($con, $_POST['noijazah_sd']));
    $nama_sd = trim(mysqli_real_escape_string($con, $_POST['nama_sd']));
    $kota_sd = trim(mysqli_real_escape_string($con, $_POST['kota_sd']));
    $file = $_FILES['file']['name'];    

    $cek_noijazah_sd = mysqli_query($con, "SELECT * FROM tb_rpsd WHERE noijazah_sd = '$noijazah_sd'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_noijazah_sd) > 0) {
        echo "<script>alert('No Ijazah sudah ada !');window.location='add.php'</script>";
    } else {
        $ekstensi_diperbolehkan = array('pdf');
        $nama = $_FILES['file']['name'];
        $x = explode('.', $nama);
        $ekstensi = strtolower (end($x));
        $ukuran = $_FILES['file']['size'];
    
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                if($ukuran < 1044070) {
                    move_uploaded_file($_FILES['file']['tmp_name'], '../assets/fileijazah_sd/'.$nama);
                    $query =mysqli_query($con, "INSERT INTO tb_rpsd (namaorg_sd, dthn_sd, sthn_sd, noijazah_sd, nama_sd, kota_sd, fileijazah_sd) 
                    VALUES ('$namaorg_sd', '$dthn_sd', '$sthn_sd', '$noijazah_sd', '$nama_sd', '$kota_sd', '$file')") or die (mysqli_error($con));
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
    $namaorg_sd = trim(mysqli_real_escape_string($con, $_POST['namaorg_sd']));
    $dthn_sd = trim(mysqli_real_escape_string($con, $_POST['dthn_sd']));
    $sthn_sd = trim(mysqli_real_escape_string($con, $_POST['sthn_sd']));
    $noijazah_sd = trim(mysqli_real_escape_string($con, $_POST['noijazah_sd']));
    $nama_sd = trim(mysqli_real_escape_string($con, $_POST['nama_sd']));
    $kota_sd = trim(mysqli_real_escape_string($con, $_POST['kota_sd']));
    $file = $_FILES['file']['name'];   
    
    $cek_noijazah_sd = mysqli_query($con, "SELECT * FROM tb_rpsd WHERE noijazah_sd = '$noijazah_sd' AND id_sd != '$id'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_noijazah_sd) > 0) {
        echo "<script>alert('No Ijazah sudah ada !');window.location='edit.php?id=$id';</script>";
    } else {
        $ekstensi_diperbolehkan = array('pdf');
    $nama = $_FILES['file']['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower (end($x));
    $ukuran = $_FILES['file']['size'];

        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            if($ukuran < 1044070) {
                move_uploaded_file($_FILES['file']['tmp_name'], '../assets/fileijazah_sd/'.$nama);
                $query =mysqli_query($con, "UPDATE tb_rpsd SET namaorg_sd ='$namaorg_sd', dthn_sd ='$dthn_sd', sthn_sd ='$sthn_sd', noijazah_sd ='$noijazah_sd', nama_sd ='$nama_sd', 
                kota_sd ='$kota_sd', fileijazah_sd ='$file' WHERE id_sd ='$id'") or die (mysqli_error($con));
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