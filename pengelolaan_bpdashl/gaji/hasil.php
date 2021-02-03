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
  <h3>_________________________________________________________________________________</h3> 
  <div style="text-align: center; line-height: 1;">
    <br>
  </div>
      
        <?php
          $fdate=$_POST['fromdate'];
          $tdate=$_POST['todate'];
        ?>
        <h6 align="center" style="color:black; font-family: times new roman;" > <b>LAPORAN DATA GAJI DARI TANGGAL <?php echo tgl_indo($fdate)?> S/D <?php echo tgl_indo($tdate)?></b> </h6>
          <table id="example2" class="table table-bordered table-hover">
            <thead style="font-size: 13px">
            <tr>
            <th>No</th>
                        <th>Tanggal Gaji</th> 
                        <th>Nama Pegawai <br> NIP <br> Jabatan <br> Pangkat/Gol.</th>
                        <th>Gaji Pokok <br> TJ. Suami/Istri <br> TJ. Anak <br> Jumlah </th>
                        <th>TJ. Eselon <br>  TJ. Beras <br>  TJ. Pajak <br>  Gaji Kotor</th>  
                        <th>Pot. Pajak <br>  Pot. IWP 10% <br>  Pot. Taperum <br>  Jumlah Potongan</th>  
                        <th>Gaji Berish</th>                  
                    </tr>
                </thead>
                <tbody>
                    <?php                    
                    $no = 1; 
                    $query = "SELECT * FROM tb_gaji
                    INNER JOIN tb_pegawai ON tb_gaji.id_pegawai = tb_pegawai.id_pegawai
                    INNER JOIN tb_eselon ON tb_pegawai.id_eselon = tb_eselon.id_eselon
                    INNER JOIN tb_pangkat ON tb_pegawai.id_pangkat = tb_pangkat.id_pangkat
                            where date(tgl_gaji) between '$fdate' and '$tdate'
                            ";                                 
                    $sql_absen = mysqli_query($con, $query) or die (mysqli_error($con));                    
                        while($data = mysqli_fetch_array($sql_absen)) { ?>
                            <tr>
                                <td><?=$no++?></td>                                
                                <td><?=tgl_indo($data['tgl_gaji'])?></td> 
                                <td><?=$data['nama_pegawai']?> <br> <?=$data['nip']?> <br> <?=$data['jabatan']?> <br> <?=$data['pangkat']?></td>
                                <td align=right;><?=rupiah($data['gapok'])?><br><?=rupiah($data['tj_istri'])?><br><?=rupiah($data['tj_anak'])?><br><?=rupiah($data['jml_1'])?></td>
                                <td align=right;><?=rupiah($data['tunjangan'])?> <br> <?=rupiah($data['tj_beras'])?> <br> <?=rupiah($data['tj_pajak'])?> <br> <?=rupiah($data['jml_kotor'])?></td>
                                <td align=right;><?=rupiah($data['pot_pajak'])?> <br>   <?=rupiah($data['pot_iwp'])?> <br> <?=rupiah($data['pot_taperum'])?> <br> <?=rupiah($data['jml_pot'])?></td>
                                <td align=right;><?=rupiah($data['total_gaji'])?></td>
                            </tr>
                    <?php
                    }                    
                    ?>

                    <?php 
                            $a = 0;
                            $sql = mysqli_query($con, "SELECT * FROM tb_gaji where date(tgl_gaji) between '$fdate' and '$tdate' ORDER BY id_gaji
                            ") or die (mysqli_error($con));                    
                            while($data = mysqli_fetch_array($sql)) { 
                              $a++;
                              $total[$a] = $data['total_gaji']; 
                            }
                              $test = array_sum($total); {?>
                              
                              <tr>
                                <td colspan=6 align="center"> TOTAL GAJI BERSIH </td>      
                                <td align=right;><?=rupiah($test)?></td> 
                            </tr>
                    <?php
                    }                    
                    ?>
               </tbody>
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