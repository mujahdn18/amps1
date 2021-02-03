<?php
    require_once "../config/config.php";
    require "../assets/libs/vendor/autoload.php";

if(isset($_POST['add'])) {
    $namaorg_pt1 = trim(mysqli_real_escape_string($con, $_POST['namaorg_pt1']));
    $dthn_pt1 = trim(mysqli_real_escape_string($con, $_POST['dthn_pt1']));
    $sthn_pt1 = trim(mysqli_real_escape_string($con, $_POST['sthn_pt1']));
    $noijazah_pt1 = trim(mysqli_real_escape_string($con, $_POST['noijazah_pt1']));
    $nama_pt1 = trim(mysqli_real_escape_string($con, $_POST['nama_pt1']));
    $kota_pt1 = trim(mysqli_real_escape_string($con, $_POST['kota_pt1']));
    $file = $_FILES['file']['name'];    

    $cek_noijazah_pt1 = mysqli_query($con, "SELECT * FROM tb_rppt1 WHERE noijazah_pt1 = '$noijazah_pt1'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_noijazah_pt1) > 0) {
        echo "<script>alert('No Ijazah sudah ada !');window.location='add.php'</script>";
    } else {
        $ekstensi_diperbolehkan = array('pdf');
    $nama = $_FILES['file']['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower (end($x));
    $ukuran = $_FILES['file']['size'];

        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            if($ukuran < 1044070) {
                move_uploaded_file($_FILES['file']['tmp_name'], '../assets/fileijazah_pt1/'.$nama);
                $query =mysqli_query($con, "INSERT INTO tb_rppt1 (namaorg_pt1, dthn_pt1, sthn_pt1, noijazah_pt1, nama_pt1, kota_pt1, fileijazah_pt1) 
                VALUES ('$namaorg_pt1', '$dthn_pt1', '$sthn_pt1', '$noijazah_pt1', '$nama_pt1', '$kota_pt1', '$file')") or die (mysqli_error($con));
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
    $namaorg_pt1 = trim(mysqli_real_escape_string($con, $_POST['namaorg_pt1']));
    $dthn_pt1 = trim(mysqli_real_escape_string($con, $_POST['dthn_pt1']));
    $sthn_pt1 = trim(mysqli_real_escape_string($con, $_POST['sthn_pt1']));
    $noijazah_pt1 = trim(mysqli_real_escape_string($con, $_POST['noijazah_pt1']));
    $nama_pt1 = trim(mysqli_real_escape_string($con, $_POST['nama_pt1']));
    $kota_pt1 = trim(mysqli_real_escape_string($con, $_POST['kota_pt1']));
    $file = $_FILES['file']['name'];    

    $cek_noijazah_pt1 = mysqli_query($con, "SELECT * FROM tb_rppt1 WHERE noijazah_pt1 = '$noijazah_pt1' AND id_pt1 != '$id'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_noijazah_pt1) > 0) {
        echo "<script>alert('No Ijazah sudah ada !');window.location='edit.php?id=$id';</script>";
    } else {
        $ekstensi_diperbolehkan = array('pdf');
        $nama = $_FILES['file']['name'];
        $x = explode('.', $nama);
        $ekstensi = strtolower (end($x));
        $ukuran = $_FILES['file']['size'];
    
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                if($ukuran < 1044070) {
                    move_uploaded_file($_FILES['file']['tmp_name'], '../assets/fileijazah_pt1/'.$nama);
                    $query =mysqli_query($con, "UPDATE tb_rppt1 SET namaorg_pt1 ='$namaorg_pt1', dthn_pt1 ='$dthn_pt1', sthn_pt1 ='$sthn_pt1', noijazah_pt1 ='$noijazah_pt1', nama_pt1 ='$nama_pt1', 
                    kota_pt1 ='$kota_pt1', fileijazah_pt1 ='$file' WHERE id_pt1 ='$id'") or die (mysqli_error($con));
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