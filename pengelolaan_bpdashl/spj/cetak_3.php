<style type="text/css">
  @font-face {
    font-family: myFirstFont;
    src: url(fonts/ufonts.com_square721-bt-roman.ttf);
  }

  p, u, td{
    font-family: myFirstFont;
  }
</style>
<title>Surat SPJ</title>
<body onLoad="window.print()">
<?php
error_reporting(0);
session_start();
require_once "../config/config.php";?>
<?php
    $id = @$_GET['id'];
    $query = "SELECT * FROM tb_spj 
                            INNER JOIN tb_pegawai ON tb_spj.id_pegawai = tb_pegawai.id_pegawai
                            INNER JOIN tb_spt ON tb_spj.id_spt = tb_spt.id_spt
                            INNER JOIN tb_spd ON tb_spj.id_spd = tb_spd.id_spd
                            INNER JOIN tb_ppk ON tb_spj.id_ppk = tb_ppk.id_ppk
                            INNER JOIN tb_pejabat ON tb_spj.id_pejabat = tb_pejabat.id_pejabat
                            WHERE id_spj = '$id'";
    $sql_spj = mysqli_query($con, $query) or die (mysqi_error($con));
    $data = mysqli_fetch_array($sql_spj); 
?>
<table width="100%">
    <tr>
        <td style="width: 100%;">
          <div style="text-align: center;"><span style="font-family: Tahoma, Geneva, sans-serif; font-size: 18px;"><strong> RINCIAN BIAYA PERJALANAN DINAS <br><br></strong></span></div>
        </td>
      </tr>
</table>
<table width="100%" border="0" align="left">
<tr>
<td width="25%">Lampiran SPD Nomor</td>
<td width="2%">:</td>
<td width="73%"> <?php $sql_spd = mysqli_query($con, "SELECT * FROM tb_spj INNER JOIN tb_spd ON tb_spj.id_spd = tb_spd.id_spd WHERE id_spj = '$data[id_spj]'") or die (mysqli_error($con));
                    while ($data_spd = mysqli_fetch_array($sql_spd)) {
                        echo $data_spd['no_surat_spd'];
                    }?> </td>
</tr>
<tr>
<td width="25%">Tanggal</td>
<td width="2%">:</td>
<td width="73%"> <?php $sql_spd = mysqli_query($con, "SELECT * FROM tb_spj INNER JOIN tb_spd ON tb_spj.id_spd = tb_spd.id_spd WHERE id_spj = '$data[id_spj]'") or die (mysqli_error($con));
                    while ($data_spd = mysqli_fetch_array($sql_spd)) {
                        echo tgl_indo($data_spd['tgl_surat_spd']);
                    }?></td>
</tr>
</table>
<br>
<table border="1" width="100%">
<tr>
<td width="5%" align="center">NO</td>
<td width="70%" align="center">PERINCIAN BIAYA</td>
<td width="15%" align="center">JUMLAH(RP)</td>
<td width="10%" align="center">KET</td>
</tr>
<tr>
<td width="5%" align="center">1.</td>
<td width="70%">Uang Harian</td>
<td width="15%" align="right"><?=rupiah($data['total_u_harian'])?></td>
<td width="10%"></td>
</tr>
<tr>
<td width="5%" align="center"></td>
<td width="70%">- Uang harian perjalanan dinas selama (<?=$data['jangka_waktu']?> hari) / perhari <?=rupiah($data['u_harian'])?><br><br></td>
<td width="15%"><br><br></td>
<td width="10%"></td>
</tr>
<tr>
<td width="5%" align="center">2.<br><br></td>
<td width="70%">Transportasi <br><br></td>
<td width="15%" align="right"><?=rupiah($data['u_transportasi'])?><br><br></td>
<td width="10%"></td>
</tr>
<tr>
<td width="5%" align="center">3.<br><br></td>
<td width="70%">Penginapan <br><br></td>
<td width="15%" align="right"><?=rupiah($data['u_penginapan'])?><br><br></td>
<td width="10%"></td>
</tr>
<tr>
<td colspan=2 align="center"><br>JUMLAH Poin(1+2+3)<br><br></td>
<td width="15%" align="right"><br><?=rupiah($data['jumlah_uang'])?><br><br></td>
<td width="10%"></td>
</tr>
<tr>
<td colspan=4><br>TERBILANG : ### <?php echo terbilang("$data[jumlah_uang]").' Rupiah'; ?> ### <br><br> </td>
</tr>
</table>
<table border="0" width="40%" align="left">
<td><br>Telah dibayar sejumlah, </td>
<tr>
<td width="40%"><?=rupiah($data['jumlah_uang'])?></td>
</tr>
<tr>
<td >Bendahara Pengeluaran, <br><br><br><br></td>
</tr>
<tr>
<td >Nuning Elmayani, S.Hut </td>
</tr>
<tr>
<td >NIP . 19860316 201012 2 010 <br><br></td>
</tr>
</table>
<table border="0" width="40%" align="right">
<tr>
<td>Banjarbaru, <?php echo tgl_indo("$data[tgl_surat_spj]"); ?></td>
</tr>
<tr>
<td>Telah menerima jumlah uang sebesar, </td>
</tr>
<tr>
<td><?=rupiah($data['jumlah_uang'])?></td>
</tr>
<tr>
<td>Yang menerima,<br><br><br><br></td>
</tr>
<tr>
<td align="left"><?php $sql_pegawai = mysqli_query($con, "SELECT * FROM tb_spj INNER JOIN tb_pegawai ON tb_spj.id_pegawai = tb_pegawai.id_pegawai WHERE id_spj = '$data[id_spj]'") or die (mysqli_error($con));
                    while ($data_pegawai = mysqli_fetch_array($sql_pegawai)) {
                        echo $data_pegawai['nama_pegawai'];
                    }?></td>
</tr>
<tr>
<td align="left">NIP. <?php $sql_pegawai = mysqli_query($con, "SELECT * FROM tb_spj INNER JOIN tb_pegawai ON tb_spj.id_pegawai = tb_pegawai.id_pegawai WHERE id_spj = '$data[id_spj]'") or die (mysqli_error($con));
                    while ($data_pegawai = mysqli_fetch_array($sql_pegawai)) {
                        echo $data_pegawai['nip'];
                    }?> <br><br></td>
</tr>
</table>
<table border="1" width="100%">
<table border="0" width="100%">
<tr>
<td colspan=3 align="center"><br>PERHITUNGAN SPD RAMPUNG<br><br></td>
</tr>
<tr>
<td width="28%">Ditetapkan sejumlah</td>
<td width="2%">:</td>
<td width="70%"><?=rupiah($data['jumlah_uang'])?></td>
</tr>
<tr>
<td width="28%">Yang telah dibayar semula</td>
<td width="2%">:</td>
<td width="70%"><?=rupiah($data['jumlah_uang'])?></td>
</tr>
<tr>
<td width="28%">Sisa Kurang/Lebih</td>
<td width="2%">:</td>
<td width="70%">Rp.</td>
</tr>
</table>
<br><br><br>
<table align="right" width="40%">
<tr>
<td >Pejabat Pembuat Komitmen </td>
</tr>
<tr>
<td >Seksi <?php $sql_ppk = mysqli_query($con, "SELECT * FROM tb_spj INNER JOIN tb_ppk ON tb_spj.id_ppk = tb_ppk.id_ppk WHERE id_spj = '$data[id_spj]'") or die (mysqli_error($con));
                    while ($data_ppk = mysqli_fetch_array($sql_ppk)) {
                        echo $data_ppk['seksi_ppk'];
                    }?> DASHL,<br><br><br><br></td>
</tr>
<tr>
<td ><?php $sql_ppk = mysqli_query($con, "SELECT * FROM tb_spj INNER JOIN tb_ppk ON tb_spj.id_ppk = tb_ppk.id_ppk WHERE id_spj = '$data[id_spj]'") or die (mysqli_error($con));
                    while ($data_ppk = mysqli_fetch_array($sql_ppk)) {
                        echo $data_ppk['nama_ppk'];
                    }?></td>
</tr>
<tr>
<td >NIP. <?php $sql_ppk = mysqli_query($con, "SELECT * FROM tb_spj INNER JOIN tb_ppk ON tb_spj.id_ppk = tb_ppk.id_ppk WHERE id_spj = '$data[id_spj]'") or die (mysqli_error($con));
                    while ($data_ppk = mysqli_fetch_array($sql_ppk)) {
                        echo $data_ppk['nip'];
                    }?></td>
</tr></table>
</body>