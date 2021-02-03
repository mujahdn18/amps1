<?php 
include_once('../_header.php');
?>
<?php ob_start();

require_once "../config/config.php";

?>
<body onLoad="window.print()">
<table style="width: 100%;">
    <tbody>
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
  <h3>__________________________________________________________________________________________________________________________________________________________________</h3>
  <div style="text-align: center; line-height: 1;">
    <br>
  </div>
        <h6 align="center" style="color:black; font-family: times new roman;" > <b>REKAPITULASI SURAT PERTANGGUNG JAWABAN</b> </h6>
          <table id="example2" class="table table-bordered table-hover">
            <thead style="font-size: 13px">
            <tr>
            <th>No</th>
                        <th>No. Surat</th>                        
                        <th>Tanggal Surat</th> 
                        <th>Pegawai</th>
                        <th>No SPT</th>
                        <th>Perihal</th>
                        <th>No SPD</th>
                        <th>PPK</th>
                        <th>Pejabat</th>
                        <th>MAK</th>
                        <th>Uang Harian</th> 
                        <th>Jangka Waktu</th> 
                        <th>Jumlah Uang Harian</th> 
                        <th>Uang Transportasi</th> 
                        <th>Uang Penginapan</th> 
                        <th>Jumlah Uang</th>  
                        <th>Terbilang</th>                       
                    </tr>
                </thead>
                <tbody>
                    <?php                    
                    $no = 1;   
                    $query = "SELECT * FROM tb_spj 
                            INNER JOIN tb_pegawai ON tb_spj.id_pegawai = tb_pegawai.id_pegawai
                            INNER JOIN tb_spt ON tb_spj.id_spt = tb_spt.id_spt
                            INNER JOIN tb_spd ON tb_spj.id_spd = tb_spd.id_spd
                            INNER JOIN tb_ppk ON tb_spj.id_ppk = tb_ppk.id_ppk
                            INNER JOIN tb_pejabat ON tb_spj.id_pejabat = tb_pejabat.id_pejabat
                            ";                                   
                    $sql_spj = mysqli_query($con, $query ) or die (mysqli_error($con));                    
                        while($data = mysqli_fetch_array($sql_spj)) { ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$data['no_surat_spj']?></td>
                                <td><?=tgl_indo($data['tgl_surat_spj'])?></td> 
                                <td><?=$data['nama_pegawai']?></td>
                                <td><?=$data['no_surat_spt']?></td>
                                <td><?=$data['perihal']?></td>
                                <td><?=$data['no_surat_spd']?></td>
                                <td><?=$data['nama_ppk']?></td>
                                <td><?=$data['nama_pejabat']?></td>
                                <td><?=$data['mak']?></td>
                                <td><?=rupiah($data['u_harian'])?></td>  
                                <td><?=$data['jangka_waktu']?></td> 
                                <td><?=rupiah($data['total_u_harian'])?></td> 
                                <td><?=rupiah($data['u_transportasi'])?></td>
                                <td><?=rupiah($data['u_penginapan'])?></td>
                                <td><?=rupiah($data['jumlah_uang'])?></td> 
                                <td><?=terbilang($data['jumlah_uang']).' Rupiah'?></td>
                            </tr>
              <?php 
               }?>
          </table>
          <div style="width: 400px; float: right;">
                    <center>
                    <br>
                    <br>
                    <br>
                    <p>Yang mengetahui, Kepala Balai
                    <br>
                    <br>
                    <br>
                    <br>Dr. M. Zainal Arifin, S.Hut. M.Si
                    <br>NIP. 19710927 199803 1 005
                  </p>
                  </center>
                </div>
              </div>

        </div>
      </div>
    </div>   
          






          </div>
        </div>
      </div>