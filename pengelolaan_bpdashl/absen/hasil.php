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
        <h6 align="center" style="color:black; font-family: times new roman;" > <b>LAPORAN DATA TUNJANGAN KINERJA DARI TANGGAL <?php echo tgl_indo($fdate)?> S/D <?php echo tgl_indo($tdate)?></b> </h6>
          <table id="example2" class="table table-bordered table-hover">
            <thead style="font-size: 13px">
            <tr>
                        <th>No</th>
                        <th>Kode</th>                        
                        <th>Tanggal</th> 
                        <th>Pegawai</th> 
                        <th>Masuk</th>
                        <th>Telat</th>
                        <th>Izin</th>
                        <th>Sakit</th> 
                        <th>Lembur</th>  
                        <th>Tunjangan Kinerja</th>                  
                    </tr>
                </thead>
                <tbody>
                    <?php                    
                    $no = 1; 
                    $query = "SELECT * FROM tb_absen
                            INNER JOIN tb_pegawai ON tb_absen.id_pegawai = tb_pegawai.id_pegawai
                            where date(tgl_absen) between '$fdate' and '$tdate'
                            ";                          
                    $sql_absen = mysqli_query($con, $query) or die (mysqli_error($con));                    
                        while($data = mysqli_fetch_array($sql_absen)) { ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$data['kode_absen']?></td>
                                <td><?=tgl_indo($data['tgl_absen'])?></td> 
                                <td><?=$data['nama_pegawai']?></td> 
                                <td><?=$data['masuk']?></td>
                                <td><?=$data['telat']?></td>
                                <td><?=$data['izin']?></td>
                                <td><?=$data['sakit']?></td>  
                                <td><?=$data['lembur']?></td>      
                                <td align=right;><?=rupiah($data['total'])?></td> 
                            </tr>
                    <?php
                    }                    
                    ?>

                            <?php 
                            $a = 0;
                            $sql = mysqli_query($con, "SELECT * FROM tb_absen where date(tgl_absen) between '$fdate' and '$tdate' ORDER BY id_absen 
                            "
                            ) or die (mysqli_error($con));                    
                            while($data = mysqli_fetch_array($sql)) { 
                              $a++;
                              $total[$a] = $data['total']; 
                            }
                              $test = array_sum($total); {?>
                              
                              <tr>
                                <td colspan=9 align="center"> TOTAL TUNJANGAN KINERJA </td>      
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