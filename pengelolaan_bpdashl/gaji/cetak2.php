<style type="text/css">
  @font-face {
    font-family: myFirstFont;
    src: url(fonts/ufonts.com_square721-bt-roman.ttf);
  }

  p, u, td{
    font-family: myFirstFont;
  }
</style>
<title>SLIP GAJI</title>
<body onLoad="window.print()">
<?php
error_reporting(0);
session_start();
require_once "../config/config.php";?>
<?php
  $id = @$_GET['id'];                   
                    $no = 1; 
                    $query = "SELECT * FROM tb_gaji
                            INNER JOIN tb_pegawai ON tb_gaji.id_pegawai = tb_pegawai.id_pegawai
                            INNER JOIN tb_eselon ON tb_pegawai.id_eselon = tb_eselon.id_eselon
                            INNER JOIN tb_pangkat ON tb_pegawai.id_pangkat = tb_pangkat.id_pangkat
                            where id_gaji = '$id'";                                 
                    $sql_gaji = mysqli_query($con, $query) or die (mysqli_error($con));                    
                        while($data = mysqli_fetch_array($sql_gaji)) { ?>
<table border="0" width="100%" align="leftt">
<tr>
<td width="63%">BPDASHL BARITO</td>
<td ></td>
<td width="13%">Tanggal</td>
<td >:</td>
<td width="20%"> <?=tgl_indo($data['tgl_gaji'])?></td>
</tr>
<tr>
<td>Jl. Bhayangkara No.C08, Sungai Besar, Kec. Banjarbaru</td>
<td ></td>
<td ></td>
<td ></td>
<td ></td>
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
          <div style="text-align: center;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 18px;"><strong>SLIP GAJI<br><br></strong></span></div>
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
<td width="40%">KETERANGAN</td>
<td width="50%" align="right">JUMLAH</td>
</tr>
<tr>
<td>1</td>
<td>Gaji Pokok</td>
<td align="right"><?=rupiah($data['gapok'])?></td>
</tr>
<tr>
<td>2</td>
<td>Tunjangan Suami/Istri</td>
<td align="right"><?=rupiah($data['tj_istri'])?></td>
</tr>
<tr>
<td>3</td>
<td>Tunjangan Anak</td>
<td align="right"><?=rupiah($data['tj_anak'])?> <hr></td>
</tr>
<tr>
<td></td>
<td><b>Jumlah</b><br><br></td>
<td align="right"><b><?=rupiah($data['jml_1'])?><br><br></b></td>
</tr>
<tr>
<td>4</td>
<td>Tunjangan Eselon</td>
<td align="right"><?=rupiah($data['tunjangan'])?></td>
</tr>
<tr>
<td>5</td>
<td>Tunjangan Beras</td>
<td align="right"><?=rupiah($data['tj_beras'])?></td>
</tr>
<tr>
<td>6</td>
<td>Tunjangan Pajak</td>
<td align="right"><?=rupiah($data['tj_pajak'])?><hr></td>
</tr>
<tr>
<td></td>
<td><b>Gaji Kotor</b><br><br></td>
<td align="right"><b><?=rupiah($data['jml_kotor'])?><br><br></b></td>
</tr>
<tr>
<td>7</td>
<td>Potongan Pajak</td>
<td align="right"><?=rupiah($data['pot_pajak'])?></td>
</tr>
<tr>
<td>8</td>
<td>Potongan IWP 10%</td>
<td align="right"><?=rupiah($data['pot_iwp'])?></td>
</tr>
<tr>
<td>9</td>
<td>Potongan Taperum</td>
<td align="right"><?=rupiah($data['pot_taperum'])?><hr></td>
</tr>
<tr>
<td></td>
<td><b>Jumlah Potongan</b><br></td>
<td align="right"><b><?=rupiah($data['jml_pot'])?></b><br></td>
</tr>
</table>
<table border="1" width="100%">
<table border="0" width="100%">
<tr>
<td width="10%"></td>
<td width="40%"></td>
<td width="50%" align="right"><b>TOTAL DITERIMA : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=rupiah($data['total_gaji'])?></b><hr></td>
</tr>
</table>
<table border="0" width="100%" >
<tr>
<td width="50%" align="center">Penerima <br><br><br></td>
<td width="50%" align="center">Mengetahui, <?=tgl_indo(date('yy-m-d'))?><br><br><br></td>
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