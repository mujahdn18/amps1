<style type="text/css">
  @font-face {
    font-family: myFirstFont;
    src: url(fonts/ufonts.com_square721-bt-roman.ttf);
  }

  p, u, td{
    font-family: myFirstFont;
  }
</style>
<title>Biodata Pegawai</title>
<body onLoad="window.print()">
<?php
error_reporting(0);
session_start();
require_once "../config/config.php";?>
<?php
  $id = @$_GET['id'];                   
                    $no = 1; 
                    $query = "SELECT * FROM tb_pegawai
                            INNER JOIN tb_pangkat ON tb_pegawai.id_pangkat = tb_pangkat.id_pangkat
                            INNER JOIN tb_eselon ON tb_pegawai.id_eselon = tb_eselon.id_eselon
                            INNER JOIN tb_rpsd ON tb_pegawai.id_sd = tb_rpsd.id_sd
                            INNER JOIN tb_rpsmp ON tb_pegawai.id_smp = tb_rpsmp.id_smp
                            INNER JOIN tb_rpsma ON tb_pegawai.id_sma = tb_rpsma.id_sma
                            INNER JOIN tb_rppt1 ON tb_pegawai.id_pt1 = tb_rppt1.id_pt1
                            INNER JOIN tb_rppt2 ON tb_pegawai.id_pt2 = tb_rppt2.id_pt2
                            INNER JOIN tb_rppt3 ON tb_pegawai.id_pt3 = tb_rppt3.id_pt3
                            where id_pegawai = '$id'";                                 
                    $sql_pegawai = mysqli_query($con, $query) or die (mysqli_error($con));                    
                        while($data = mysqli_fetch_array($sql_pegawai)) { ?>
<table border="0" width="100%">
<tr>
<td align="center"><h2><b>DAFTAR RIWAYAT HIDUP</b></h2></td>
</tr>
<tr>
</table>
<table border="1" width="100%">
<table border="0" width="100%">
<td align="center"><h3><b><?=$data['nama_pegawai']?></b></h3></td>
</tr>
<tr>
<td align="center"><h4><b>NIP. <?=$data['nip']?></b></h4></td>
</tr>
</table>
<table border="1" width="100%">
<table width="100%" border="0" align="left">
<tr>
<td width="5%">Telp <br><br></td>
<td width="2%">: <br><br></td>
<td width="43%"><?=$data['no_hp']?><br><br></td>
<td width="5%">Email <br><br></td>
<td width="2%">: <br><br></td>
<td width="43%"><?=$data['email']?><br><br></td>
</tr>
</table>
<table border="1" width="70%">
<table border="0" width="25%" align="right">
<tr>
  <td><img style="width:200px" src="../assets/img/<?=$data['foto']?>"></td>
</tr>
<table border="0" width="70%">
<tr>
<td><b>INFORMASI PRIBADI</b><br><br></td>
</tr>
</table>
<table border="1" width="70%">
<table border="0" width="70%">
<tr>
<td width="15%">Tanggal Lahir</td>
<td width="5%">:</td>
<td width="50%"><?=tgl_indo($data['tgl_lahir'])?><br></td>
</tr>
<tr>
<td width="15%">Jenis Kelmain</td>
<td width="5%">:</td>
<td width="50%"><?=$data['jenis_kelamin']?><br></td>
</tr>
<tr>
<td>Alamat</td>
<td>:</td>
<td><?=$data['alamat']?><br></td>
</tr>
<tr>
<td>Negara</td>
<td>:</td>
<td><?=$data['negara']?><br></td>
</tr>
<tr>
<td>Status <br><br><br></td>
<td>: <br><br><br></td>
<td><?=$data['status_nikah']?><br><br><br></td>
</tr>
</table>
<table border="1" width="70%">
<table border="0" width="70%">
<tr>
<td><b>RIWAYAT PENDIDIKAN</b><br><br></td>
</tr>
</table>
<table border="1" width="100%">
<table border="0" width="100%">
<tr>
<td width="6%" align="center"><b><?=$data['dthn_sd']?></b><br><br></td>
<td width="3%" align="center"><b>-</b><br><br></td>
<td width="6%" align="center"><b><?=$data['sthn_sd']?></b><br><br></td>
<td width="3%" align="center"><b>:</b><br><br></td>
<td> <?=$data['nama_sd']?> ( <?=$data['kota_sd']?> )<br><br></td>
</tr>
<tr>
<td width="6%" align="center"><b><?=$data['dthn_smp']?></b><br><br></td>
<td width="3%" align="center"><b>-</b><br><br></td>
<td width="6%" align="center"><b><?=$data['sthn_smp']?></b><br><br></td>
<td width="3%" align="center"><b>:</b><br><br></td>
<td> <?=$data['nama_smp']?> ( <?=$data['kota_smp']?> )<br><br></td>
</tr>
<tr>
<td width="6%" align="center"><b><?=$data['dthn_sma']?></b><br><br></td>
<td width="3%" align="center"><b>-</b><br><br></td>
<td width="6%" align="center"><b><?=$data['sthn_sma']?></b><br><br></td>
<td width="3%" align="center"><b>:</b><br><br></td>
<td> <?=$data['nama_sma']?> ( <?=$data['kota_sma']?> )<br><br></td>
</tr>
<tr>
<td width="6%" align="center"><b><?=$data['dthn_pt1']?></b><br><br></td>
<td width="3%" align="center"><b>-</b><br><br></td>
<td width="6%" align="center"><b><?=$data['sthn_pt1']?></b><br><br></td>
<td width="3%" align="center"><b>:</b><br><br></td>
<td> S1 / <?=$data['nama_pt1']?> ( <?=$data['kota_pt1']?> )<br><br></td>
</tr>
<tr>
<td width="6%" align="center"><b><?=$data['dthn_pt2']?></b><br><br></td>
<td width="3%" align="center"><b>-</b><br><br></td>
<td width="6%" align="center"><b><?=$data['sthn_pt2']?></b><br><br></td>
<td width="3%" align="center"><b>:</b><br><br></td>
<td> S2 / <?=$data['nama_pt2']?> ( <?=$data['kota_pt2']?> )<br><br></td>
</tr>
<tr>
<td width="6%" align="center"><b><?=$data['dthn_pt3']?></b><br><br></td>
<td width="3%" align="center"><b>-</b><br><br></td>
<td width="6%" align="center"><b><?=$data['sthn_pt3']?></b><br><br></td>
<td width="3%" align="center"><b>:</b><br><br></td>
<td> S3 / <?=$data['nama_pt3']?> ( <?=$data['kota_pt3']?> )<br><br></td>
</tr>
</table>
<table border="1" width="100%">
<?php
}
?>
</body>