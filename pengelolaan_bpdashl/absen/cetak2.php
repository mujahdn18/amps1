<style type="text/css">
  @font-face {
    font-family: myFirstFont;
    src: url(fonts/ufonts.com_square721-bt-roman.ttf);
  }

  p, u, td{
    font-family: myFirstFont;
  }
</style>
<title>SLIP TUNJANGAN KINERJA</title>
<body onLoad="window.print()">
<?php
error_reporting(0);
session_start();
require_once "../config/config.php";?>
<?php
  $id = @$_GET['id'];                   
                    $no = 1; 
                    $query = "SELECT * FROM tb_absen
                            INNER JOIN tb_pegawai ON tb_absen.id_pegawai = tb_pegawai.id_pegawai
                            where id_absen = '$id'";                                 
                    $sql_absen = mysqli_query($con, $query) or die (mysqli_error($con));                    
                        while($data = mysqli_fetch_array($sql_absen)) { ?>
<table border="0" width="100%" align="leftt">
<tr>
<td width="63%">BPDASHL BARITO</td>
<td ></td>
<td width="13%">Tanggal</td>
<td >:</td>
<td width="20%"> <?=tgl_indo($data['tgl_absen'])?></td>
</tr>
<tr>
<td>Jl. Bhayangkara No.C08, Sungai Besar, Kec. Banjarbaru</td>
<td ></td>
<td >Kode TJ.Kinerja</td>
<td >:</td>
<td > <?=$data['kode_absen']?> </td>
</tr>
<tr>
<td>Selatan, Kota Banjar Baru, Kalimantan Selatan 70714</td>
<td ></td>
<td ></td>
<td ></td>
<td ></td>
</tr>
</table>
<br>
<table width="100%">
    <tr>
        <td style="width: 100%;">
          <div style="text-align: center;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 18px;"><strong>SLIP TUNJANGAN KINERJA<br><br></strong></span></div>
        </td>
      </tr>
</table>
<table border="1" width="100%">
<table width="100%" border="0" align="left">
<tr>
<td width="5%">Nama</td>
<td width="2%">:</td>
<td width="43%"><?=$data['nama_pegawai']?></td>
<td width="5%">Alamat</td>
<td width="2%">:</td>
<td width="43%"><?=$data['alamat']?></td>
</tr>
<tr>
<td width="5%">Jabatan</td>
<td width="2%">:</td>
<td width="43%"><?=$data['jabatan']?></td>
<td width="5%">Telp</td>
<td width="2%">:</td>
<td width="43%"><?=$data['no_hp']?></td>
</tr>
</table>
<table border="1" width="100%">
<table width="100%" border="0" align="left">
<tr>
<td width="10%" >NO</td>
<td width="20%">KETERANGAN</td>
<td align="center" width="20%">HARI</td>
<td align="center" width="20%">TUNJANGAN</td>
<td width="30%" align="right">JUMLAH</td>
</tr>
<tr>
<td>1</td>
<td>Masuk</td>
<td align="center"><?=$data['masuk']?></td>
<td align="center">15000</td>
<td align="right"><?=rupiah($data['jml_masuk'])?></td>
</tr>
<tr>
<td>2</td>
<td>Telat</td>
<td align="center"><?=$data['telat']?></td>
<td align="center">7000</td>
<td align="right"><?=rupiah($data['jml_telat'])?></td>
</tr>
<tr>
<td>3</td>
<td>Izin</td>
<td align="center"><?=$data['izin']?></td>
<td align="center">5000</td>
<td align="right"><?=rupiah($data['jml_izin'])?></td>
</tr>
<tr>
<td>4</td>
<td>Sakit</td>
<td align="center"><?=$data['sakit']?></td>
<td align="center">6000</td>
<td align="right"><?=rupiah($data['jml_sakit'])?></td>
</tr>
<tr>
<td>5</td>
<td>Lembur</td>
<td align="center"><?=$data['lembur']?></td>
<td align="center">10000</td>
<td align="right"><?=rupiah($data['jml_lembur'])?><hr></td>
</tr>
<tr>
<td></td>
<td><b>Total Jumlah</b><br><br></td>
<td></td>
<td></td>
<td align="right"><b><?=rupiah($data['total'])?></b><br><br></td>
</tr>
</table>
<table border="1" width="100%">
<table border="0" width="100%">
<tr>
<td width="10%" ></td>
<td width="20%"></td>
<td align="center" width="20%"></td>
<td align="center" width="20%"></td>
<td width="30%" align="right"><b>TOTAL DITERIMA : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=rupiah($data['total'])?></b><hr><br><br></td>
</tr>
</table>
<table border="0" width="100%" >
<tr>
<td width="50%" align="center">Penerima <br><br><br><br></td>
<td width="50%" align="center">Mengetahui, <?=tgl_indo(date('yy-m-d'))?><br><br><br><br></td>
</tr>

<tr>
<td align="center"><?=$data['nama_pegawai']?></td>
<td align="center">Dr. M. Zainal Arifin, S.Hut. M.Si</td>
</tr>
</table>
<?php
}
?>
</body>