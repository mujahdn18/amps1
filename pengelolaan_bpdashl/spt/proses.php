<?php
    require_once "../config/config.php";
    require "../assets/libs/vendor/autoload.php";

    use Ramsey\Uuid\Uuid;
    use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

if(isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $no_surat_spt = trim(mysqli_real_escape_string($con, $_POST['no_surat_spt']));
    $perihal = trim(mysqli_real_escape_string($con, $_POST['perihal']));
    $jangka_waktu = trim(mysqli_real_escape_string($con, $_POST['jangka_waktu']));
    $dari_tgl = trim(mysqli_real_escape_string($con, $_POST['dari_tgl']));
    $sampai_tgl = trim(mysqli_real_escape_string($con, $_POST['sampai_tgl']));
    $tgl_surat = trim(mysqli_real_escape_string($con, $_POST['tgl_surat']));

    $cek_no_surat = mysqli_query($con, "SELECT * FROM tb_spt WHERE no_surat_spt = '$no_surat_spt'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_no_surat) > 0) {
        echo "<script>alert('Nomor Surat sudah ada !');window.location='add.php'</script>";
    } else {
        mysqli_query($con, "INSERT INTO tb_spt (id_spt, no_surat_spt, perihal, jangka_waktu, dari_tgl, sampai_tgl, tgl_surat) 
                        VALUES ('$uuid', '$no_surat_spt', '$perihal', '$jangka_waktu', '$dari_tgl', '$sampai_tgl', '$tgl_surat')") or die (mysqli_error($con));
    
    $id_pegawai = $_POST['id_pegawai'];
    foreach ($id_pegawai as $pegawai) {
        mysqli_query($con, "INSERT INTO tb_surat_pegawai (id_spt, id_pegawai) VALUES ('$uuid', '$pegawai')") or die (mysqli_error($con));
    
    }
    echo "<script>window.location='data.php'</script>";
    }    
}else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $id_sp = $_POST['id_sp'];
    $no_surat_spt = trim(mysqli_real_escape_string($con, $_POST['no_surat_spt']));
    $perihal = trim(mysqli_real_escape_string($con, $_POST['perihal']));
    $jangka_waktu = trim(mysqli_real_escape_string($con, $_POST['jangka_waktu']));
    $dari_tgl = trim(mysqli_real_escape_string($con, $_POST['dari_tgl']));
    $sampai_tgl = trim(mysqli_real_escape_string($con, $_POST['sampai_tgl']));
    $tgl_surat = trim(mysqli_real_escape_string($con, $_POST['tgl_surat']));

    $cek_no_surat = mysqli_query($con, "SELECT * FROM tb_spt WHERE no_surat_spt = '$no_surat_spt'AND id_spt != '$id'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_no_surat) > 0) {
        echo "<script>alert('Nomor Surat sudah ada !');window.location='edit.php?id=$id';</script>";
    } else {
        mysqli_query($con, "UPDATE tb_spt SET no_surat_spt ='$no_surat_spt', perihal ='$perihal', jangka_waktu ='$jangka_waktu', dari_tgl ='$dari_tgl', sampai_tgl ='$sampai_tgl',tgl_surat ='$tgl_surat' WHERE id_spt ='$id'") or die (mysqli_error($con));
    
    $id_pegawai = $_POST['id_pegawai'];
    foreach ($id_pegawai as $pegawai) {
        mysqli_query($con, "UPDATE tb_surat_pegawai SET id_spt='$id', id_pegawai='$pegawai' WHERE id='$id_sp'") or die (mysqli_error($con));
    
    }
    echo "<script>window.location='data.php'</script>";
    } 

    // mysqli_query($con, "UPDATE tb_spt SET no_surat_spt ='$no_surat_spt', perihal ='$perihal', jangka_waktu ='$jangka_waktu', dari_tgl ='$dari_tgl', sampai_tgl ='$sampai_tgl',tgl_surat ='$tgl_surat' WHERE id_spt ='$id'") or die (mysqli_error($con));
    
    // $id_surat_pegawai = $_POST['id_surat_pegawai'];
    // $id_pegawai = $_POST['id_pegawai'];
    // foreach ($id_pegawai as $pegawai) {
    //     mysqli_query($con, "UPDATE tb_surat_pegawai SET id_pegawai ='$id_pegawai', id_spt ='$id' WHERE id='$id_surat_pegawai'") or die (mysqli_error($con));
    
    // }
    // echo "<script>window.location='data.php'</script>";
}
?>