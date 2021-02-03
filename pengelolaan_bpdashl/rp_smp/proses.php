<?php
    require_once "../config/config.php";
    require "../assets/libs/vendor/autoload.php";

if(isset($_POST['add'])) {
    $namaorg_smp = trim(mysqli_real_escape_string($con, $_POST['namaorg_smp']));
    $dthn_smp = trim(mysqli_real_escape_string($con, $_POST['dthn_smp']));
    $sthn_smp = trim(mysqli_real_escape_string($con, $_POST['sthn_smp']));
    $noijazah_smp = trim(mysqli_real_escape_string($con, $_POST['noijazah_smp']));
    $nama_smp = trim(mysqli_real_escape_string($con, $_POST['nama_smp']));
    $kota_smp = trim(mysqli_real_escape_string($con, $_POST['kota_smp']));
    $file = $_FILES['file']['name'];    

    $cek_noijazah_smp = mysqli_query($con, "SELECT * FROM tb_rpsmp WHERE noijazah_smp = '$noijazah_smp'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_noijazah_smp) > 0) {
        echo "<script>alert('No Ijazah sudah ada !');window.location='add.php'</script>";
    } else {
        $ekstensi_diperbolehkan = array('pdf');
    $nama = $_FILES['file']['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower (end($x));
    $ukuran = $_FILES['file']['size'];

        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            if($ukuran < 1044070) {
                move_uploaded_file($_FILES['file']['tmp_name'], '../assets/fileijazah_smp/'.$nama);
                $query =mysqli_query($con, "INSERT INTO tb_rpsmp (namaorg_smp, dthn_smp, sthn_smp, noijazah_smp, nama_smp, kota_smp, fileijazah_smp) 
                VALUES ('$namaorg_smp', '$dthn_smp', '$sthn_smp', '$noijazah_smp', '$nama_smp', '$kota_smp', '$file')") or die (mysqli_error($con));
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
    $namaorg_smp = trim(mysqli_real_escape_string($con, $_POST['namaorg_smp']));
    $dthn_smp = trim(mysqli_real_escape_string($con, $_POST['dthn_smp']));
    $sthn_smp = trim(mysqli_real_escape_string($con, $_POST['sthn_smp']));
    $noijazah_smp = trim(mysqli_real_escape_string($con, $_POST['noijazah_smp']));
    $nama_smp = trim(mysqli_real_escape_string($con, $_POST['nama_smp']));
    $kota_smp = trim(mysqli_real_escape_string($con, $_POST['kota_smp']));
    $file = $_FILES['file']['name'];   
    
    $cek_noijazah_smp = mysqli_query($con, "SELECT * FROM tb_rpsmp WHERE noijazah_smp = '$noijazah_smp'  AND id_smp != '$id'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_noijazah_smp) > 0) {
        echo "<script>alert('No Ijazah sudah ada !');window.location='edit.php?id=$id';</script>";
    } else {
        $ekstensi_diperbolehkan = array('pdf');
        $nama = $_FILES['file']['name'];
        $x = explode('.', $nama);
        $ekstensi = strtolower (end($x));
        $ukuran = $_FILES['file']['size'];
    
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                if($ukuran < 1044070) {
                    move_uploaded_file($_FILES['file']['tmp_name'], '../assets/fileijazah_smp/'.$nama);
                    $query =mysqli_query($con, "UPDATE tb_rpsmp SET namaorg_smp ='$namaorg_smp', dthn_smp ='$dthn_smp', sthn_smp ='$sthn_smp', noijazah_smp ='$noijazah_smp', nama_smp ='$nama_smp', 
                    kota_smp ='$kota_smp', fileijazah_smp ='$file' WHERE id_smp ='$id'") or die (mysqli_error($con));
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