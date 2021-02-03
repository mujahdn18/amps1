<?php
    require_once "../config/config.php";
    require "../assets/libs/vendor/autoload.php";

if(isset($_POST['add'])) {  
    $id = $_POST['id'];
    $tgl_gaji = trim(mysqli_real_escape_string($con, $_POST['tgl_gaji']));
    $id_pegawai = trim(mysqli_real_escape_string($con, $_POST['id_pegawai']));

    $pokok = mysqli_query($con, "SELECT a.gapok from tb_pangkat a join tb_pegawai b on a.id_pangkat = b.id_pangkat where b.id_pegawai = '$id_pegawai'");
    $row = mysqli_fetch_assoc($pokok);

    $istri = mysqli_query($con, "SELECT istri from tb_pegawai where id_pegawai = '$id_pegawai'");
    $row1 = mysqli_fetch_assoc($istri);
    $tj_istri = ($row['gapok'] * 0.10) * $row1['istri'];

    $anak = mysqli_query($con, "SELECT anak from tb_pegawai where id_pegawai = '$id_pegawai'");
    $row2 = mysqli_fetch_assoc($anak);
    $tj_anak = ($row['gapok'] * 0.04) * $row2['anak'];

    $jml1 = $row['gapok'] + $tj_istri + $tj_anak;

    $eselon = mysqli_query($con, "SELECT a.tunjangan from tb_eselon a join tb_pegawai b on a.id_eselon = b.id_eselon where b.id_pegawai = '$id_pegawai'");
    $row3 = mysqli_fetch_assoc($eselon);

    $tj_beras = $row['gapok'] * 0.08;
    $tj_pajak = $row['gapok'] * 0.01;

    $jml_kotor = $jml1 + $row3['tunjangan'] + $tj_beras + $tj_pajak;

    $pot_pajak = $row['gapok'] * 0.01;
    $pot_iwp = $row['gapok'] * 0.10;
    $pot_taperum = 10000;

    $jml_pot = $pot_pajak + $pot_iwp + $pot_taperum;
    
    $total_gaji = $jml_kotor - $jml_pot; 
    
    $cek_tgl_gaji = mysqli_query($con, "SELECT * FROM tb_gaji WHERE tgl_gaji = '$tgl_gaji'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_tgl_gaji) > 0) {
        echo "<script>alert('Tanggal Gaji/Data sudah ada !');window.location='add.php'</script>";
    } else {
        mysqli_query($con, "INSERT INTO tb_gaji (id_gaji, tgl_gaji, id_pegawai, tj_istri, tj_anak, jml_1, tj_beras, tj_pajak, jml_kotor, pot_pajak, pot_iwp, pot_taperum, jml_pot, total_gaji) 
        VALUES ('$id', '$tgl_gaji', '$id_pegawai', '$tj_istri', '$tj_anak', '$jml1', '$tj_beras', '$tj_pajak', '$jml_kotor', '$pot_pajak', '$pot_iwp', '$pot_taperum', '$jml_pot', '$total_gaji')") or die (mysqli_error($con));
        echo "<script>window.location='data.php'</script>";  
    } 
}else if(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $tgl_gaji = trim(mysqli_real_escape_string($con, $_POST['tgl_gaji']));
    $id_pegawai = trim(mysqli_real_escape_string($con, $_POST['id_pegawai']));

    $pokok = mysqli_query($con, "SELECT a.gapok from tb_pangkat a join tb_pegawai b on a.id_pangkat = b.id_pangkat where b.id_pegawai = '$id_pegawai'");
    $row = mysqli_fetch_assoc($pokok);

    $istri = mysqli_query($con, "SELECT istri from tb_pegawai where id_pegawai = '$id_pegawai'");
    $row1 = mysqli_fetch_assoc($istri);
    $tj_istri = ($row['gapok'] * 0.10) * $row1['istri'];

    $anak = mysqli_query($con, "SELECT anak from tb_pegawai where id_pegawai = '$id_pegawai'");
    $row2 = mysqli_fetch_assoc($anak);
    $tj_anak = ($row['gapok'] * 0.04) * $row2['anak'];

    $jml1 = $row['gapok'] + $tj_istri + $tj_anak;

    $eselon = mysqli_query($con, "SELECT a.tunjangan from tb_eselon a join tb_pegawai b on a.id_eselon = b.id_eselon where b.id_pegawai = '$id_pegawai'");
    $row3 = mysqli_fetch_assoc($eselon);

    $tj_beras = $row['gapok'] * 0.08;
    $tj_pajak = $row['gapok'] * 0.01;

    $jml_kotor = $jml1 + $row3['tunjangan'] + $tj_beras + $tj_pajak;

    $pot_pajak = $row['gapok'] * 0.01;
    $pot_iwp = $row['gapok'] * 0.10;
    $pot_taperum = 10000;

    $jml_pot = $pot_pajak + $pot_iwp + $pot_taperum;
    
    $total_gaji = $jml_kotor - $jml_pot;       
      
    $cek_tgl_gaji = mysqli_query($con, "SELECT * FROM tb_gaji WHERE tgl_gaji = '$tgl_gaji' AND id_gaji != '$id'") or die (mysqli_error($con));
    if (mysqli_num_rows($cek_tgl_gaji) > 0) {
        echo "<script>alert('Tanggal Gaji/Data sudah ada !');window.location='edit.php?id=$id';</script>";
    } else {
        mysqli_query($con, "UPDATE tb_gaji SET tgl_gaji='$tgl_gaji', id_pegawai='$id_pegawai', tj_istri='$tj_istri', tj_anak='$tj_anak', jml_1='$jml1', tj_beras='$tj_beras', tj_pajak='$tj_pajak', jml_kotor='$jml_kotor', pot_pajak='$pot_pajak', pot_iwp='$pot_iwp', pot_taperum='$pot_taperum', jml_pot='$jml_pot', total_gaji='$total_gaji' WHERE id_gaji='$id'") or die (mysqli_error($con));
        echo "<script>window.location='data.php'</script>";   
    }   
}
?>