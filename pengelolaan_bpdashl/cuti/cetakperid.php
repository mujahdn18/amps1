<style type="text/css">
  @font-face {
    font-family: myFirstFont;
    src: url(fonts/ufonts.com_square721-bt-roman.ttf);
  }

  p, u, td{
    font-family: myFirstFont;
  }
</style>
<title>Surat Masuk</title>
<body onLoad="window.print()">
<?php
error_reporting(0);
session_start();
require_once "../config/config.php";?>
<?php
  $id = @$_GET['id'];
  $query = "SELECT * FROM tb_cuti
            INNER JOIN tb_pegawai ON tb_cuti.id_pegawai = tb_pegawai.id_pegawai
            WHERE id_cuti = '$id'
            ";
  $sql_cuti = mysqli_query($con, $query) or die (mysqi_error($con));
  $data = mysqli_fetch_array($sql_cuti);
?>
<table width="100%" border="0" >
<tr>
<td width="100%" align="right">Banjarbaru, <?=tgl_indo($data['tgl_cuti'])?> <br><br><br></td>
</tr>
<tr>
<td>Perihal : <?=$data['perihal']?> <br><br></td>
</tr>
<tr>
<td>Kepada Yth, <br>
Kepala Balai BPDASHL Barito <br>
Di tempat <br>
Dengan Hormat, <br>
Yang bertanda tangan dibawah ini : <br><br></td>
</tr>
</table>
<table border="0" width="100%">
<tr>
<td width="10%">Nama</td>
<td width="3%">:</td>
<td width="87%"><?=$data['nama_pegawai']?> </td>
</tr>
<tr>
<td width="10%">NIP</td>
<td width="3%">:</td>
<td width="87%"><?=$data['nip']?> </td>
</tr>
<tr>
<td width="10%">Jabatan <br><br></td>
<td width="3%">: <br><br></td>
<td width="87%"><?=$data['jabatan']?> <br><br></td>
</tr>
</table>
<table width="100%" border="0" >
<tr>
<td width="100%">Bermaksud mengajukan cuti selama <?=$data['jangka_hari']?> hari kerja, terhitung mulai tanggal
<?=tgl_indo($data['dari_tgl'])?> hingga <?=tgl_indo($data['sampai_tgl'])?> dikarenakan <?=$data['keterangan']?>. <br><br></td>
</tr>
<tr>
<td width="100%">Demikian surat permohonan cuti ini saya ajukan, atas perhatiannya serta kebijaksanaan Bapak, 
saya ucapkan terimakasih. <br><br><br><br><br></td>
</tr>
</table>
<table border="0" width="40%" align="right">
<tr>
<td align="center">Hormat Saya, <br><br><br><br><br></td>
</tr>
<tr>
<td align="center">( <?=$data['nama_pegawai']?> )<br><br></td>
</tr>
</table>
</body>