<?php
    require_once "../config/config.php";
    require "../assets/libs/vendor/autoload.php";

if(isset($_POST['add'])) {
    $id = $_POST['id'];
    $nip = trim(mysqli_real_escape_string($con, $_POST['nip']));
    $nama_pegawai = trim(mysqli_real_escape_string($con, $_POST['nama_pegawai']));
    $tgl_lahir = trim(mysqli_real_escape_string($con, $_POST['tgl_lahir']));
    $status_nikah = trim(mysqli_real_escape_string($con, $_POST['status_nikah']));
    $email = trim(mysqli_real_escape_string($con, $_POST['email']));
    $negara = trim(mysqli_real_escape_string($con, $_POST['negara']));
    $jenis_kelamin = trim(mysqli_real_escape_string($con, $_POST['jenis_kelamin']));
    $jabatan = trim(mysqli_real_escape_string($con, $_POST['jabatan']));
    $id_pangkat = trim(mysqli_real_escape_string($con, $_POST['id_pangkat']));
    $seksi = trim(mysqli_real_escape_string($con, $_POST['seksi']));
    $no_hp = trim(mysqli_real_escape_string($con, $_POST['no_hp']));
    $istri = trim(mysqli_real_escape_string($con, $_POST['istri']));
    $anak = trim(mysqli_real_escape_string($con, $_POST['anak']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $id_eselon = trim(mysqli_real_escape_string($con, $_POST['id_eselon']));
    $id_sd = trim(mysqli_real_escape_string($con, $_POST['id_sd']));
    $id_smp = trim(mysqli_real_escape_string($con, $_POST['id_smp']));
    $id_sma = trim(mysqli_real_escape_string($con, $_POST['id_sma']));
    $id_pt1 = trim(mysqli_real_escape_string($con, $_POST['id_pt1']));
    $id_pt2 = trim(mysqli_real_escape_string($con, $_POST['id_pt2']));
    $id_pt3 = trim(mysqli_real_escape_string($con, $_POST['id_pt3']));
    $foto = $_FILES['foto']['name'];

    $cek_nip = mysqli_query($con, "SELECT * FROM tb_pegawai WHERE nip = '$nip'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_nip) > 0) {
        echo "<script>alert('NIP sudah ada !');window.location='add.php'</script>";
    } else {
        $ekstensi_diperbolehkan = array('png','jpg');
        $nama = $_FILES['foto']['name'];
        $x = explode('.', $nama);
        $ekstensi = strtolower (end($x));
        $ukuran = $_FILES['foto']['size'];
    
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                if($ukuran < 1044070) {
                    move_uploaded_file($_FILES['foto']['tmp_name'], '../assets/img/'.$nama);
                    $query =mysqli_query($con, "INSERT INTO tb_pegawai (id_pegawai, nip, nama_pegawai, tgl_lahir, status_nikah, email, negara, jenis_kelamin, jabatan, id_pangkat, seksi, no_hp, alamat, foto, istri, anak, id_eselon, id_sd, id_smp, id_sma, id_pt1, id_pt2, id_pt3) 
                    VALUES ('$id', '$nip', '$nama_pegawai', '$tgl_lahir', '$status_nikah', '$email', '$negara', '$jenis_kelamin', '$jabatan', '$id_pangkat', '$seksi', '$no_hp', '$alamat', '$foto', '$istri', '$anak', '$id_eselon', '$id_sd', '$id_smp', '$id_sma', '$id_pt1', '$id_pt2', '$id_pt3')") or die (mysqli_error($con));               
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
    $nip = trim(mysqli_real_escape_string($con, $_POST['nip']));
    $nama_pegawai = trim(mysqli_real_escape_string($con, $_POST['nama_pegawai']));
    $tgl_lahir = trim(mysqli_real_escape_string($con, $_POST['tgl_lahir']));
    $status_nikah = trim(mysqli_real_escape_string($con, $_POST['status_nikah']));
    $email = trim(mysqli_real_escape_string($con, $_POST['email']));
    $negara = trim(mysqli_real_escape_string($con, $_POST['negara']));
    $jenis_kelamin = trim(mysqli_real_escape_string($con, $_POST['jenis_kelamin']));
    $jabatan = trim(mysqli_real_escape_string($con, $_POST['jabatan']));
    $id_pangkat = trim(mysqli_real_escape_string($con, $_POST['id_pangkat']));
    $seksi = trim(mysqli_real_escape_string($con, $_POST['seksi']));
    $no_hp = trim(mysqli_real_escape_string($con, $_POST['no_hp']));
    $istri = trim(mysqli_real_escape_string($con, $_POST['istri']));
    $anak = trim(mysqli_real_escape_string($con, $_POST['anak']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $id_eselon = trim(mysqli_real_escape_string($con, $_POST['id_eselon']));
    $id_sd = trim(mysqli_real_escape_string($con, $_POST['id_sd']));
    $id_smp = trim(mysqli_real_escape_string($con, $_POST['id_smp']));
    $id_sma = trim(mysqli_real_escape_string($con, $_POST['id_sma']));
    $id_pt1 = trim(mysqli_real_escape_string($con, $_POST['id_pt1']));
    $id_pt2 = trim(mysqli_real_escape_string($con, $_POST['id_pt2']));
    $id_pt3 = trim(mysqli_real_escape_string($con, $_POST['id_pt3']));
    $foto = $_FILES['foto']['name'];

        $ekstensi_diperbolehkan = array('png','jpg');
        $nama = $_FILES['foto']['name'];
        $x = explode('.', $nama);
        $ekstensi = strtolower (end($x));
        $ukuran = $_FILES['foto']['size'];
    
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                if($ukuran < 1044070) {
                    move_uploaded_file($_FILES['foto']['tmp_name'], '../assets/img/'.$nama);
                    $query =mysqli_query($con, "UPDATE tb_pegawai SET nip='$nip', nama_pegawai='$nama_pegawai', tgl_lahir='$tgl_lahir', status_nikah='$status_nikah', email='$email', negara='$negara', jenis_kelamin='$jenis_kelamin', jabatan='$jabatan', id_pangkat='$id_pangkat', seksi='$seksi', no_hp='$no_hp', alamat='$alamat', foto='$foto', istri='$istri', anak='$anak', id_eselon='$id_eselon', id_sd='$id_sd', id_smp='$id_smp', id_sma='$id_sma', id_pt1='$id_pt1', id_pt2='$id_pt2', id_pt3='$id_pt3' WHERE id_pegawai='$id'") or die (mysqli_error($con));               
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
?>