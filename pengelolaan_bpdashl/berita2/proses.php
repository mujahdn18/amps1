<?php
    require_once "../config/config.php";
    require "../assets/libs/vendor/autoload.php";

if(isset($_POST['add'])) {
    $judul_berita = trim(mysqli_real_escape_string($con, $_POST['judul_berita']));
    $tgl_berita = trim(mysqli_real_escape_string($con, $_POST['tgl_berita']));
    $id_pegawai = trim(mysqli_real_escape_string($con, $_POST['id_pegawai']));
    $isi_berita = trim(mysqli_real_escape_string($con, $_POST['isi_berita']));
    $foto = $_FILES['foto']['name'];

    $cek_judul_berita = mysqli_query($con, "SELECT * FROM tb_berita WHERE judul_berita = '$judul_berita'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_judul_berita) > 0) {
        echo "<script>alert('Judul Berita sudah ada !');window.location='add.php'</script>";
    } else {
        $ekstensi_diperbolehkan = array('png','jpg');
        $nama = $_FILES['foto']['name'];
        $x = explode('.', $nama);
        $ekstensi = strtolower (end($x));
        $ukuran = $_FILES['foto']['size'];
    
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                if($ukuran < 1044070) {
                    move_uploaded_file($_FILES['foto']['tmp_name'], '../assets/img_berita/'.$nama);
                    $query =mysqli_query($con, "INSERT INTO tb_berita (judul_berita, tgl_berita, id_pegawai, isi_berita, foto_berita) 
                    VALUES ('$judul_berita', '$tgl_berita', '$id_pegawai', '$isi_berita', '$foto')") or die (mysqli_error($con));               
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
    $judul_berita = trim(mysqli_real_escape_string($con, $_POST['judul_berita']));
    $tgl_berita = trim(mysqli_real_escape_string($con, $_POST['tgl_berita']));
    $id_pegawai = trim(mysqli_real_escape_string($con, $_POST['id_pegawai']));
    $isi_berita = trim(mysqli_real_escape_string($con, $_POST['isi_berita']));
    $foto = $_FILES['foto']['name'];

    $cek_judul_berita = mysqli_query($con, "SELECT * FROM tb_berita WHERE judul_berita = '$judul_berita' AND id_berita != '$id'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_judul_berita) > 0) {
        echo "<script>alert('Judul Berita sudah ada !');window.location='edit.php?id=$id';</script>";
    } else {
        $ekstensi_diperbolehkan = array('png','jpg');
        $nama = $_FILES['foto']['name'];
        $x = explode('.', $nama);
        $ekstensi = strtolower (end($x));
        $ukuran = $_FILES['foto']['size'];
    
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                if($ukuran < 1044070) {
                    move_uploaded_file($_FILES['foto']['tmp_name'], '../assets/img_berita/'.$nama);
                    $query =mysqli_query($con, "UPDATE tb_berita SET judul_berita='$judul_berita', tgl_berita='$tgl_berita', id_pegawai='$id_pegawai', isi_berita='$isi_berita', foto_berita='$foto' WHERE id_berita='$id'") or die (mysqli_error($con));               
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