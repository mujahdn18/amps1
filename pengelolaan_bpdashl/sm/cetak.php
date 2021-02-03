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
  $sql_sm = mysqli_query($con, "SELECT * FROM tb_sm WHERE id_sm = '$id'") or die (mysqi_error($con));
  $data = mysqli_fetch_array($sql_sm);
?>
<table width="100%" border="1" align="left">
<tr>
<td width="45%" align="center">LEMBAR DISPOSISI <br></BR> BPDASHL BARITO</td>
<td width="20%" align="center">KEMENTERIAN LINGKUNGAN HIDUP DAN KEHUTANAN</td>
<td width="20%" colspan="2">&nbsp;No. Ag : <?=$data['no_agenda']?><br><br> &nbsp;Tanggal : <?=tgl_indo($data['tgl_agenda'])?></td>
</tr>
<td align="center">Sifat</td>
<td align="center">Drajat</td>
<td colspan="3">&nbsp;Batas Waktu Penyelesaiaan</td>
</tr>
</tr>
<td align="center">Biasa</td>
<td align="center">Biasa</td>
<td align="center">1</td>
<td align="center">Hari</td>
</tr>
<tr>
<td >&nbsp;Kelompok Asal Surat : <?=$data['asal_surat']?></td>
<td colspan="3">&nbsp;Kode : <?=$data['kode_surat']?></td>
</tr>
<tr>
<td >&nbsp;No. Surat : <?=$data['no_surat']?></td>
<td colspan="3">&nbsp;Tanggal : <?=tgl_indo($data['tgl_surat'])?></td>
</tr>
<tr>
<td colspan="4">&nbsp;Hal : <?=$data['perihal']?></td>
</tr>
<tr>
<td colspan="4">&nbsp;Lampiran : <?=$data['lampiran']?> berkas</td>
</tr>
<tr>
<td colspan="4">&nbsp;Asal Surat : <?=$data['asal_surat']?></td>
</tr>
<tr>
<td colspan="4">&nbsp;Sifat : <?=$data['sifat_surat']?></td>
</tr>
<tr>
<td align="center">DITUJUKAN KEPADA YTH.</td>
<td align="center" colspan="3">ISI DISPOSISI</td>
</tr>
<tr>
<td>&nbsp;<?=$data['tujuan']?><br><br><br><br><br><br><br><br></td>
<td colspan="3">&nbsp;Untuk Diselesaikan <br><br><br><br><br><br><br><br></td>
</tr>
<td>&nbsp;KOORDINATOR<br><br></td>
<td colspan="3">&nbsp;Lainnya<br><br></td>
<tr>
</tr>
<td colspan="4">&nbsp;CATATAN : <br>&nbsp;monitor dan file tersendiri<br><br><br><br>&nbsp;Tanggal : <?=tgl_indo(date('yy-m-d'))?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; BPDASHL BARITO</td>
<tr>
</table>
</body>