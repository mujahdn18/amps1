<?php
    require_once "../config/config.php";
    require "../assets/libs/vendor/autoload.php";

if(isset($_POST['add'])) {
    $id = $_POST['id'];
    $no_surat_sk = trim(mysqli_real_escape_string($con, $_POST['no_surat_sk']));
    $tgl_surat = trim(mysqli_real_escape_string($con, $_POST['tgl_surat']));
    $id_pegawai = trim(mysqli_real_escape_string($con, $_POST['id_pegawai']));
    $tujuan = trim(mysqli_real_escape_string($con, $_POST['tujuan']));
    $perihal = trim(mysqli_real_escape_string($con, $_POST['perihal']));
    $jenis_surat = trim(mysqli_real_escape_string($con, $_POST['jenis_surat']));
    $klasifikasi_arsip = trim(mysqli_real_escape_string($con, $_POST['klasifikasi_arsip']));
    $unit_pengolah = trim(mysqli_real_escape_string($con, $_POST['unit_pengolah']));
    $dt_surat_masuk = trim(mysqli_real_escape_string($con, $_POST['dt_surat_masuk']));
    $eselon = trim(mysqli_real_escape_string($con, $_POST['eselon']));
    $sifat_surat = trim(mysqli_real_escape_string($con, $_POST['sifat_surat']));
    $file = $_FILES['file']['name'];

    $cek_no_surat = mysqli_query($con, "SELECT * FROM tb_sk WHERE no_surat_sk = '$no_surat_sk'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_no_surat) > 0) {
        echo "<script>alert('Nomor Surat sudah ada !');window.location='add.php'</script>";
    } else {
        $ekstensi_diperbolehkan = array('pdf');
        $nama = $_FILES['file']['name'];
        $x = explode('.', $nama);
        $ekstensi = strtolower (end($x));
        $ukuran = $_FILES['file']['size'];
    
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                if($ukuran < 1044070) {
                    move_uploaded_file($_FILES['file']['tmp_name'], '../assets/file_surat_keluar/'.$nama);
                    $query =mysqli_query($con, "INSERT INTO tb_sk (id_sk, no_surat_sk, tgl_surat, id_pegawai, tujuan, perihal, jenis_surat, klasifikasi_arsip, unit_pengolah, dt_surat_masuk, eselon, filepdf, sifat_surat) 
                    VALUES ('$id', '$no_surat_sk', '$tgl_surat', '$id_pegawai', '$tujuan', '$perihal', '$jenis_surat', '$klasifikasi_arsip', '$unit_pengolah', '$dt_surat_masuk', '$eselon', '$file' , '$sifat_surat')") or die (mysqli_error($con));
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
    $no_surat_sk = trim(mysqli_real_escape_string($con, $_POST['no_surat_sk']));
    $tgl_surat = trim(mysqli_real_escape_string($con, $_POST['tgl_surat']));
    $id_pegawai = trim(mysqli_real_escape_string($con, $_POST['id_pegawai']));
    $tujuan = trim(mysqli_real_escape_string($con, $_POST['tujuan']));
    $perihal = trim(mysqli_real_escape_string($con, $_POST['perihal']));
    $jenis_surat = trim(mysqli_real_escape_string($con, $_POST['jenis_surat']));
    $klasifikasi_arsip = trim(mysqli_real_escape_string($con, $_POST['klasifikasi_arsip']));
    $unit_pengolah = trim(mysqli_real_escape_string($con, $_POST['unit_pengolah']));
    $dt_surat_masuk = trim(mysqli_real_escape_string($con, $_POST['dt_surat_masuk']));
    $eselon = trim(mysqli_real_escape_string($con, $_POST['eselon']));
    $sifat_surat = trim(mysqli_real_escape_string($con, $_POST['sifat_surat']));
    $file = $_FILES['file']['name'];

    $cek_no_surat = mysqli_query($con, "SELECT * FROM tb_sk WHERE no_surat_sk = '$no_surat_sk' AND id_sk != '$id'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_no_surat) > 0) {
        echo "<script>alert('Nomor Surat sudah ada !');window.location='edit.php?iid=$id';</script>";
    } else {
        $ekstensi_diperbolehkan = array('pdf');
        $nama = $_FILES['file']['name'];
        $x = explode('.', $nama);
        $ekstensi = strtolower (end($x));
        $ukuran = $_FILES['file']['size'];
    
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                if($ukuran < 1044070) {
                    move_uploaded_file($_FILES['file']['tmp_name'], '../assets/file_surat_keluar/'.$nama);
                    $query =mysqli_query($con, "UPDATE tb_sk SET no_surat_sk ='$no_surat_sk', tgl_surat ='$tgl_surat', id_pegawai ='$id_pegawai', tujuan ='$tujuan', perihal ='$perihal', 
                    jenis_surat ='$jenis_surat', klasifikasi_arsip ='$klasifikasi_arsip', unit_pengolah ='$unit_pengolah', dt_surat_masuk ='$dt_surat_masuk', eselon ='$eselon', filepdf ='$file', sifat_surat ='$sifat_surat' WHERE id_sk ='$id'") or die (mysqli_error($con));
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