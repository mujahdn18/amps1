<?php
    require_once "../config/config.php";
    require "../assets/libs/vendor/autoload.php";

if(isset($_POST['add'])) {
    $namaorg_pt2 = trim(mysqli_real_escape_string($con, $_POST['namaorg_pt2']));
    $dthn_pt2 = trim(mysqli_real_escape_string($con, $_POST['dthn_pt2']));
    $sthn_pt2 = trim(mysqli_real_escape_string($con, $_POST['sthn_pt2']));
    $noijazah_pt2 = trim(mysqli_real_escape_string($con, $_POST['noijazah_pt2']));
    $nama_pt2 = trim(mysqli_real_escape_string($con, $_POST['nama_pt2']));
    $kota_pt2 = trim(mysqli_real_escape_string($con, $_POST['kota_pt2']));
    $file = $_FILES['file']['name'];    

    $cek_noijazah_pt2 = mysqli_query($con, "SELECT * FROM tb_rppt2 WHERE noijazah_pt2 = '$noijazah_pt2'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_noijazah_pt2) > 0) {
        echo "<script>alert('No Ijazah sudah ada !');window.location='add.php'</script>";
    } else {
        $ekstensi_diperbolehkan = array('pdf');
        $nama = $_FILES['file']['name'];
        $x = explode('.', $nama);
        $ekstensi = strtolower (end($x));
        $ukuran = $_FILES['file']['size'];
    
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                if($ukuran < 1044070) {
                    move_uploaded_file($_FILES['file']['tmp_name'], '../assets/fileijazah_pt2/'.$nama);
                    $query =mysqli_query($con, "INSERT INTO tb_rppt2 (namaorg_pt2, dthn_pt2, sthn_pt2, noijazah_pt2, nama_pt2, kota_pt2, fileijazah_pt2) 
                    VALUES ('$namaorg_pt2', '$dthn_pt2', '$sthn_pt2', '$noijazah_pt2', '$nama_pt2', '$kota_pt2', '$file')") or die (mysqli_error($con));
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
    $namaorg_pt2 = trim(mysqli_real_escape_string($con, $_POST['namaorg_pt2']));
    $dthn_pt2 = trim(mysqli_real_escape_string($con, $_POST['dthn_pt2']));
    $sthn_pt2 = trim(mysqli_real_escape_string($con, $_POST['sthn_pt2']));
    $noijazah_pt2 = trim(mysqli_real_escape_string($con, $_POST['noijazah_pt2']));
    $nama_pt2 = trim(mysqli_real_escape_string($con, $_POST['nama_pt2']));
    $kota_pt2 = trim(mysqli_real_escape_string($con, $_POST['kota_pt2']));
    $file = $_FILES['file']['name'];   
    
    $cek_noijazah_pt2 = mysqli_query($con, "SELECT * FROM tb_rppt2 WHERE noijazah_pt2 = '$noijazah_pt2'  AND id_pt2 != '$id'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_noijazah_pt2) > 0) {
        echo "<script>alert('No Ijazah sudah ada !');window.location='edit.php?id=$id';</script>";
    } else {
        $ekstensi_diperbolehkan = array('pdf');
        $nama = $_FILES['file']['name'];
        $x = explode('.', $nama);
        $ekstensi = strtolower (end($x));
        $ukuran = $_FILES['file']['size'];
    
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                if($ukuran < 1044070) {
                    move_uploaded_file($_FILES['file']['tmp_name'], '../assets/fileijazah_pt2/'.$nama);
                    $query =mysqli_query($con, "UPDATE tb_rppt2 SET namaorg_pt2 ='$namaorg_pt2', dthn_pt2 ='$dthn_pt2', sthn_pt2 ='$sthn_pt2', noijazah_pt2 ='$noijazah_pt2', nama_pt2 ='$nama_pt2', 
                    kota_pt2 ='$kota_pt2', fileijazah_pt2 ='$file' WHERE id_pt2 ='$id'") or die (mysqli_error($con));
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