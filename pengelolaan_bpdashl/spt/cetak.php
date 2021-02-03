<?php ob_start();

require_once "../config/config.php";

?>

<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8'>
<style>body{font-size: 16px;color: black;}</style>
<title>Title</title>
</head>
<body>
<table style="width: 100%;">
    <tbody>
    <?php
                $id = @$_GET['id'];
                $sql_spt = mysqli_query($con, "SELECT * FROM tb_spt WHERE id_spt = '$id'") or die (mysqi_error($con));
                $data = mysqli_fetch_array($sql_spt);
                ?>
      <tr>
        <td rowspan="3" style="width: 10%;">
          <div style="text-align: center;">
            <img style="width:80px" src="../assets/bpdas.png">
          </div>
        </td>
        <td style="width: 82.4441%;">
          <div style="text-align: center;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 16px;"><strong>KEMENTERIAN LINGKUNGAN HIDUP DAN KEHUTANAN</strong></span></div>
        </td>
      </tr>
      <tr>
        <td style="width: 82.4441%;">
          <div style="text-align: center;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 14px;">DIREKTORAT JENDERAL PENGENDALIAN DAERAH ALIRAN SUNGAI DAN HUTAN LINDUNG</span></div>
        </td>
      </tr>
      <tr>
        <td style="width: 82.4441%;">
          <div style="text-align: center;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 16px;"><strong>BALAI PENGELOLAAN DAERAH ALIRAN SUNGAI DAN HUTAN LINDUNG BARITO</strong></span></div>
        </td>
      </tr>
    </tbody>
  </table>
  <hr>
  <div style="text-align: center; line-height: 1;">
    <br>
  </div>
  <table style="width: 100%;">
    <tbody>
      <tr>
        <td style="width: 100.0000%;">
          <div style="text-align: center;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 18px;"><strong>SURAT TUGAS</strong></span></div>
        </td>
      </tr>
      <tr>
        <td style="width: 100.0000%;">
          <div style="text-align: center;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 15px;">Nomor :&nbsp; <?=$data['no_surat_spt']?></span></div>
        </td>
      </tr>
    </tbody>
  </table>
  <table style="width: 100%;">
    <tbody>
      <tr>
        <td rowspan="3" style="width: 11.704%; text-align: left; vertical-align: top;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 15px;">Dasar</span></td>
        <td style="width: 5.1635%; text-align: left; vertical-align: top;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 15px;">: 1.</span>&nbsp;</td>
        <td style="width: 83.1325%; text-align: left; vertical-align: top;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 15px;">Peraturan Menteri Lingkungan Hidup dan Kehutanan Nomor : P.18/MenLHK-II/2015 tentang Organisasi dan Tatakerja Kementerian Lingkungan Hidup dan Kehutanan.</span></td>
      </tr>
      <tr>
        <td style="width: 5.1635%; vertical-align: top;">&nbsp;&nbsp;<span style="font-family: Tahoma, Geneva, sans-serif; font-size: 15px;">2.</span></td>
        <td style="width: 83.1325%; vertical-align: top;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 15px;">Peraturan Menteri Kehutanan Nomor : P.10/menlhk/Setjen/OTL/2016 tentang Organisasi dan Tata Kerja Balai Pengelolaan DAS dan Hutan Lindung.</span></td>
      </tr>
      <tr>
        <td style="width: 5.1635%; vertical-align: top;">&nbsp;&nbsp;<span style="font-family: Tahoma, Geneva, sans-serif; font-size: 15px;">3.</span></td>
        <td style="width: 83.1325%; vertical-align: top;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 15px;">Pengesahan Daftar Isian Pelaksanaan Anggaran (DIPA) Balai Pengelolaan Daerah Aliran Sungai dan Hutan Lindung Barito Anggaran 2020 No : SP DIPA-029.04.2.427052/2020 Tanggal 24 November 2019.</span>
          <br>
        </td>
      </tr>
    </tbody>
  </table>
  <div style="text-align: center;">
    <br>
  </div>
  <p style="text-align: center;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 15px;"><strong>MEMERINTAHKAN,</strong></span></p>
  <table style="width: 100%;">
    <tbody>
      <tr>
        <td style="width: 11.5318%; vertical-align: top;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 15px;">Kepada</span>
          <br>
        </td>
        <td style="width: 5.3356%; vertical-align: top;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 15px;">:</span></td>
        <td style="width: 19.7935%; vertical-align: top;"><span style="font-size: 
        15px;">Nama&nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :</span></td>
        <td style="width: 63.5111%; vertical-align: top;">
            <span style="font-size: 
        15px;"><?php $sql_pegawai = mysqli_query($con, "SELECT * FROM tb_surat_pegawai INNER JOIN tb_pegawai ON tb_surat_pegawai.id_pegawai = tb_pegawai.id_pegawai WHERE id_spt = '$data[id_spt]'") or die (mysqli_error($con));
                    while ($data_spt = mysqli_fetch_array($sql_pegawai)) {
                        echo $data_spt['nama_pegawai']."<br>";
                    }?></span>
          <br>
        </td>
      </tr>
      <tr> 
        <td style="width: 11.5318%; vertical-align: top;">
          <br>
        </td>
        <td style="width: 5.3356%; vertical-align: top;">
          <br>
        </td>
        <td style="width: 19.7935%; vertical-align: top;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 14px;">NIP&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :</span></td>
        <td style="width: 63.5111%; vertical-align: top;"><span style="font-size: 
            15px;"><?=$sql_pegawai = mysqli_query($con, "SELECT * FROM tb_surat_pegawai INNER JOIN tb_pegawai ON tb_surat_pegawai.id_pegawai = tb_pegawai.id_pegawai WHERE id_spt = '$data[id_spt]'") or die (mysqli_error($con));
                    while ($data_spt = mysqli_fetch_array($sql_pegawai)) {
                        echo $data_spt['nip']."<br>";
                    }?></span>
          <br>
        </td>
      </tr>
      <!-- <tr>
        <td style="width: 11.5318%; vertical-align: top;">
          <br>
        </td>
        <td style="width: 5.3356%; vertical-align: top;">
          <br>
        </td>
        <td style="width: 20%; vertical-align: top;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 14px;">Pangkat/Gol. Ruang  :</span></td>
        <td style="width: 63.5111%; vertical-align: top;"><span style="font-size: 
            15px;">$sql_pangkat = mysqli_query($con, "SELECT a.pangkat from tb_pangkat a join tb_pegawai b join tb_surat_pegawai c on a.id_pangkat = b.id_pangkat where b.id_pegawai = '$data[id_pegawai]'") or die (mysqli_error($con));
                    $data_pangkat = mysqli_fetch_assoc($sql_pangkat); {
                       echo $data_pangkat['pangkat']."<br>";
                    }?></span>

            $pokok = mysqli_query($con, "SELECT a.gapok from tb_pangkat a join tb_pegawai b on a.id_pangkat = b.id_pangkat where b.id_pegawai = '$id_pegawai'");
    $row1 = mysqli_fetch_assoc($pokok);

    $potongan = trim(mysqli_real_escape_string($con, $_POST['potongan']));
     
    $total_gaji = ($row['total'] + $row1['gapok']) - $potongan; $data['pangkat']?> 
          <br>
        </td>
      </tr> -->
      <tr> 
        <td style="width: 11.5318%; vertical-align: top;">
          <br>
        </td>
        <td style="width: 5.3356%; vertical-align: top;">
          <br>
        </td>
        <td style="width: 19.7935%; vertical-align: top;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 14px;">Jabatan &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; :</span></td>
        <td style="width: 63.5111%; vertical-align: top;"><span style="font-size: 
            15px;"><?php $sql_pegawai = mysqli_query($con, "SELECT * FROM tb_surat_pegawai INNER JOIN tb_pegawai ON tb_surat_pegawai.id_pegawai = tb_pegawai.id_pegawai WHERE id_spt = '$data[id_spt]'") or die (mysqli_error($con));
                    while ($data_spt = mysqli_fetch_array($sql_pegawai)) {
                        echo $data_spt['jabatan']."<br>";
                    }?></span>
          <br>
        </td>
      </tr>
    </tbody>
  </table>
  <table style="width: 100%;">
    <tbody>
      <tr>
        <td style="width: 11.3597%; vertical-align: top;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 15px;">Untuk</span>
          <br>
        </td>
        <td style="width:2%; vertical-align: top;">:</td>
        <td style="width: 87%; vertical-align: top;"><?=$data['perihal']?></td>
      </tr>
    </tbody>
  </table>
  <p><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 15px;">Dengan Ketentuan :</span></p>
  <table style="width: 100%;">
    <tbody>
      <tr>
        <td class="fr-cell-handler " style="width: 3%; vertical-align: top;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 14px;">1.</span></td>
        <td style="width: 97%; vertical-align: top;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 14px;">Yang bersangkutan melaksanakan Surat Tugas selama <?=$data['jangka_waktu']?> hari mulai tanggal <?=tgl_indo($data['dari_tgl'])?> s/d <?=tgl_indo($data['sampai_tgl'])?>&nbsp;</span>
          <br>
        </td>
      </tr>
      <tr>
        <td style="width: 3%; vertical-align: top;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 14px;">2.</span></td>
        <td class="fr-cell-fixed " style="width: 97%; vertical-align: top;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 14px;">Selambat - lambatnya 7 (tujuh) hari setelah melaksanakan tugas, membuat laporan tertulis.</span>
          <br>
        </td>
      </tr>
    </tbody>
  </table>
  <br>
  <table style="width: 100%;">
    <tbody>
      <tr>
        <td style="width: 11.3597%; vertical-align: top;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 15px;">Biaya</span>
          <br>
        </td>
        <td style="width: 2%; vertical-align: top;">:</td>
        <td style="width: 87.9605%; vertical-align: top;">Pengesahan Daftar Isian Pelaksanaan Anggaran (DIPA) Balai Pengelolaan Daerah Aliran Sungai dan Hutan Lindung Barito Anggaran 2020 No : SP DIPA-029.04.2.427052/2020 Tanggal 24 November 2019.</td>
      </tr>
    </tbody>
  </table>
  <p><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 15px;">Demikian, untuk dilaksanakan dengan sebaik-baiknya.</span></p>
  <table style="width: 100%;">
    <tbody>
      <tr>
        <td style="width: 60.7573%;">
          <br>
        </td>
        <td style="width: 13%;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 14px;">Dikeluarkan di</span>
          <br>
        </td>
        <td style="width: 14%;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 14px;">: Banjarbaru</span>
          <br>
        </td>
      </tr>
      <tr>
        <td style="width: 60.7573%;">
          <br>
        </td>
        <td style="width: 13%;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 14px;">Pada Tanggal</span></td>
        <td style="width: 14%;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 14px;">: <?=tgl_indo($data['tgl_surat'])?></span></td>
      </tr>
      <tr>
        <td style="width: 60.7573%;"><span style="font-family: 
          Tahoma,Geneva, sans-serif;">
            <br>
          </span></td>
        <td style="width: 13%;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 14px;">Kepala Balai,</span></td>
        <td style="width: 14%;"><span style="font-family: 
          Tahoma,Geneva, sans-serif;">
            <br>
          </span></td>
      </tr>
      <tr>
        <td style="width: 60.7573%;"><span style="font-family: 
          Tahoma,Geneva, sans-serif;">
            <br>
          </span></td>
        <td style="width: 19.4492%;"><span style="font-family: 
          Tahoma,Geneva, sans-serif;">
            <br>
          </span></td>
        <td style="width: 19.6213%;"><span style="font-family: 
          Tahoma,Geneva, sans-serif;">
            <br>
          </span></td>
      </tr>
      <tr>
        <td style="width: 60.7573%;"><span style="font-family: 
          Tahoma,Geneva, sans-serif;">
            <br>
          </span></td>
        <td style="width: 19.4492%;"><span style="font-family: 
          Tahoma,Geneva, sans-serif;">
            <br>
          </span></td>
        <td style="width: 19.6213%;"><span style="font-family: 
          Tahoma,Geneva, sans-serif;">
            <br>
          </span></td>
      </tr>
      <tr>
        <td style="width: 60.7573%;"><span style="font-family: 
          Tahoma,Geneva, sans-serif;">
            <br>
          </span></td>
        <td style="width: 19.4492%;"><span style="font-family: 
          Tahoma,Geneva, sans-serif;">
            <br>
          </span></td>
        <td style="width: 19.6213%;"><span style="font-family: 
          Tahoma,Geneva, sans-serif;">
            <br>
          </span></td>
      </tr>
      <tr>
        <td style="width: 60.7573%;">
          <br>
        </td>
        <td colspan="2" style="width: 39.0706%;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 14px;">Dr. M. Zainal Arifin, S.Hut. M.Si</span></td>
      </tr>
      <tr>
        <td style="width: 60.7573%;">
          <br>
        </td>
        <td colspan="2" style="width: 39.0706%;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 14px;">NIP. 19710927 199803 1 005</span></td>
      </tr>
    </tbody>
  </table>
  <table style="width: 100%;">
    <tbody>
      <tr>
        <td style="width: 100%;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 15px;">Tembusan disampaikan kepada Yth.</span></td>
      </tr>
      <tr>
        <td style="width: 100%;"><span style="font-size: 
        15px;"><span style="font-family: 
          Tahoma,Geneva, sans-serif;">1. Sekretaris Direktorat Jenderal PDASHL</span></span></td>
      </tr>
      <tr>
        <td style="width: 100%;"><span style="font-size: 
        15px;"><span style="font-family: 
          Tahoma,Geneva, sans-serif;">2. Kuasa Pengguna Anggaran BPDASHL Barito</span></span></td>
      </tr>
      <tr>
        <td style="width: 100%;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 15px;">3. Yang Bersangkutan</span></td>
      </tr>
    </tbody>
  </table>
</body>
</html>
<?php 

$html = ob_get_clean(); 
use Dompdf\Dompdf; 
require_once '../dompdf/dompdf/autoload.inc.php'; 
$dompdf = new Dompdf(); 
$dompdf->loadHtml($html); 
$dompdf->setPaper('legal', 'potrait'); 
$dompdf->render(); 
$dompdf->stream(); 
?>