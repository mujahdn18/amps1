<?php
    require_once "../config/config.php";
    require "../assets/libs/vendor/autoload.php";

if(isset($_POST['add'])) {
    $namaorg_pt3 = trim(mysqli_real_escape_string($con, $_POST['namaorg_pt3']));
    $dthn_pt3 = trim(mysqli_real_escape_string($con, $_POST['dthn_pt3']));
    $sthn_pt3 = trim(mysqli_real_escape_string($con, $_POST['sthn_pt3']));
    $noijazah_pt3 = trim(mysqli_real_escape_string($con, $_POST['noijazah_pt3']));
    $nama_pt3 = trim(mysqli_real_escape_string($con, $_POST['nama_pt3']));
    $kota_pt3 = trim(mysqli_real_escape_string($con, $_POST['kota_pt3']));
    $file = $_FILES['file']['name'];   
    
    $cek_noijazah_pt3 = mysqli_query($con, "SELECT * FROM tb_rppt3 WHERE noijazah_pt3 = '$noijazah_pt3'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_noijazah_pt3) > 0) {
        echo "<script>alert('No Ijazah sudah ada !');window.location='add.php'</script>";
    } else {
        $ekstensi_diperbolehkan = array('pdf');
        $nama = $_FILES['file']['name'];
        $x = explode('.', $nama);
        $ekstensi = strtolower (end($x));
        $ukuran = $_FILES['file']['size'];
    
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                if($ukuran < 1044070) {
                    move_uploaded_file($_FILES['file']['tmp_name'], '../assets/fileijazah_pt3/'.$nama);
                    $query =mysqli_query($con, "INSERT INTO tb_rppt3 (namaorg_pt3, dthn_pt3, sthn_pt3, noijazah_pt3, nama_pt3, kota_pt3, fileijazah_pt3) 
                    VALUES ('$namaorg_pt3', '$dthn_pt3', '$sthn_pt3', '$noijazah_pt3', '$nama_pt3', '$kota_pt3', '$file')") or die (mysqli_error($con));
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
    $namaorg_pt3 = trim(mysqli_real_escape_string($con, $_POST['namaorg_pt3']));
    $dthn_pt3 = trim(mysqli_real_escape_string($con, $_POST['dthn_pt3']));
    $sthn_pt3 = trim(mysqli_real_escape_string($con, $_POST['sthn_pt3']));
    $noijazah_pt3 = trim(mysqli_real_escape_string($con, $_POST['noijazah_pt3']));
    $nama_pt3 = trim(mysqli_real_escape_string($con, $_POST['nama_pt3']));
    $kota_pt3 = trim(mysqli_real_escape_string($con, $_POST['kota_pt3']));
    $file = $_FILES['file']['name'];    

    $cek_noijazah_pt3 = mysqli_query($con, "SELECT * FROM tb_rppt3 WHERE noijazah_pt3 = '$noijazah_pt3'  AND id_pt3 != '$id'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_noijazah_pt3) > 0) {
        echo "<script>alert('No Ijazah sudah ada !');window.location='edit.php?id=$id';</script>";
    } else {
        $ekstensi_diperbolehkan = array('pdf');
        $nama = $_FILES['file']['name'];
        $x = explode('.', $nama);
        $ekstensi = strtolower (end($x));
        $ukuran = $_FILES['file']['size'];
    
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                if($ukuran < 1044070) {
                    move_uploaded_file($_FILES['file']['tmp_name'], '../assets/fileijazah_pt3/'.$nama);
                    $query =mysqli_query($con, "UPDATE tb_rppt3 SET namaorg_pt3 ='$namaorg_pt3', dthn_pt3 ='$dthn_pt3', sthn_pt3 ='$sthn_pt3', noijazah_pt3 ='$noijazah_pt3', nama_pt3 ='$nama_pt3', 
                    kota_pt3 ='$kota_pt3', fileijazah_pt3 ='$file' WHERE id_pt3 ='$id'") or die (mysqli_error($con));
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