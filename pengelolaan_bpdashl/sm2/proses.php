<?php
    require_once "../config/config.php";
    require "../assets/libs/vendor/autoload.php";

if(isset($_POST['add'])) {
    $no_agenda = trim(mysqli_real_escape_string($con, $_POST['no_agenda']));
    $tgl_agenda = trim(mysqli_real_escape_string($con, $_POST['tgl_agenda']));
    $id_pegawai = trim(mysqli_real_escape_string($con, $_POST['id_pegawai']));
    $kode_surat = trim(mysqli_real_escape_string($con, $_POST['kode_surat']));
    $asal_surat = trim(mysqli_real_escape_string($con, $_POST['asal_surat']));
    $kelompok_asal = trim(mysqli_real_escape_string($con, $_POST['kelompok_asal']));
    $tujuan = trim(mysqli_real_escape_string($con, $_POST['tujuan']));
    $no_surat = trim(mysqli_real_escape_string($con, $_POST['no_surat']));
    $tgl_surat = trim(mysqli_real_escape_string($con, $_POST['tgl_surat']));
    $perihal = trim(mysqli_real_escape_string($con, $_POST['perihal']));
    $file = $_FILES['file']['name'];    
    $lampiran = trim(mysqli_real_escape_string($con, $_POST['lampiran']));
    $sifat_surat = trim(mysqli_real_escape_string($con, $_POST['sifat_surat']));
    
    $cek_no_agenda = mysqli_query($con, "SELECT * FROM tb_sm WHERE no_agenda = '$no_agenda'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_no_agenda) > 0) {
        echo "<script>alert('Nomor Agenda sudah ada !');window.location='add.php'</script>";
    } else {
        $ekstensi_diperbolehkan = array('pdf');
    $nama = $_FILES['file']['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower (end($x));
    $ukuran = $_FILES['file']['size'];

        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            if($ukuran < 1044070) {
                move_uploaded_file($_FILES['file']['tmp_name'], '../assets/file_surat_masuk/'.$nama);
                $query =mysqli_query($con, "INSERT INTO tb_sm (no_agenda, tgl_agenda, id_pegawai, kode_surat, asal_surat, kelompok_asal, tujuan, no_surat, tgl_surat, perihal,filepdf, lampiran, sifat_surat) 
                VALUES ('$no_agenda', '$tgl_agenda', '$id_pegawai', '$kode_surat', '$asal_surat', '$kelompok_asal', '$tujuan', '$no_surat', '$tgl_surat', '$perihal', '$file', '$lampiran', '$sifat_surat')") or die (mysqli_error($con));
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
    $no_agenda = trim(mysqli_real_escape_string($con, $_POST['no_agenda']));
    $tgl_agenda = trim(mysqli_real_escape_string($con, $_POST['tgl_agenda']));
    $id_pegawai = trim(mysqli_real_escape_string($con, $_POST['id_pegawai']));
    $kode_surat = trim(mysqli_real_escape_string($con, $_POST['kode_surat']));
    $asal_surat = trim(mysqli_real_escape_string($con, $_POST['asal_surat']));
    $kelompok_asal = trim(mysqli_real_escape_string($con, $_POST['kelompok_asal']));
    $tujuan = trim(mysqli_real_escape_string($con, $_POST['tujuan']));
    $no_surat = trim(mysqli_real_escape_string($con, $_POST['no_surat']));
    $tgl_surat = trim(mysqli_real_escape_string($con, $_POST['tgl_surat']));
    $perihal = trim(mysqli_real_escape_string($con, $_POST['perihal']));
    $file = $_FILES['file']['name'];    
    $lampiran = trim(mysqli_real_escape_string($con, $_POST['lampiran']));
    $sifat_surat = trim(mysqli_real_escape_string($con, $_POST['sifat_surat']));

    $cek_no_agenda = mysqli_query($con, "SELECT * FROM tb_sm WHERE no_agenda = '$no_agenda' AND id_sm != '$id'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_no_agenda) > 0) {
        echo "<script>alert('Nomor Agenda sudah ada !');window.location='edit.php?id=$id';</script>";
    } else {
        $ekstensi_diperbolehkan = array('pdf');
    $nama = $_FILES['file']['name'];
    $x = explode('.', $nama);
    $ekstensi = strtolower (end($x));
    $ukuran = $_FILES['file']['size'];

        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
            if($ukuran < 1044070) {
                move_uploaded_file($_FILES['file']['tmp_name'], '../assets/file_surat_masuk/'.$nama);
                $query =mysqli_query($con, "UPDATE tb_sm SET no_agenda ='$no_agenda', tgl_agenda ='$tgl_agenda', id_pegawai ='$id_pegawai', kode_surat ='$kode_surat', asal_surat ='$asal_surat', 
                kelompok_asal ='$kelompok_asal', tujuan ='$tujuan', no_surat ='$no_surat', tgl_surat ='$tgl_surat', perihal ='$perihal', filepdf ='$file', lampiran ='$lampiran', sifat_surat ='$sifat_surat' WHERE id_sm ='$id'") or die (mysqli_error($con));
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