<?php include_once('../_header.php'); ?>

    <div class="box">
        <h1>SPT</h1>
        <h4>
            <small>Data Surat Perintah Tugas</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh" ></i></a>
                <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"> Tambah SPT </i></a>
            </div>
        </h4>
        <div style="margin-bottom: 20px;">
            <form class="form-inline" action="" method="post">
                <div class="form-group">
                    <input type="text" name="pencarian" class="form-control" placeholder="Pencarian">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
                </div>
            </form>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="spt">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No. Surat</th>
                        <th>Tanggal Surat</th>
                        <th>Pegawai</th>
                        <th>Perihal</th>
                        <th>Jangka Waktu</th>
                        <th>Dari Tanggal</th>
                        <th>Sampai Tanggal</th>
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $batas = 5;
                    $hal = @$_GET['hal'];
                    if(empty($hal)) {
                        $posisi = 0;
                        $hal = 1;
                    }else {
                        $posisi = ($hal - 1) * $batas;
                    }
                    $no = 1;
                    if($_SERVER['REQUEST_METHOD'] == "POST") {
                        $pencarian = trim(mysqli_real_escape_string($con, $_POST['pencarian']));
                        if($pencarian != '') {
                            $sql = "SELECT * FROM tb_spt WHERE no_surat_spt LIKE '%$pencarian%'";
                            $query = $sql;
                            $queryJml = $sql;
                        }else {
                            $query = "SELECT * FROM tb_spt LIMIT $posisi, $batas";
                            $queryJml = "SELECT * FROM tb_spt";
                            $no = $posisi + 1;
                        }
                    } else {
                        $query = "SELECT * FROM tb_spt LIMIT $posisi, $batas";
                        $queryJml = "SELECT * FROM tb_spt";
                        $no = $posisi + 1;
                    }                   
                    $sql_spt = mysqli_query($con, $query) or die (mysqli_error($con));
                    if(mysqli_num_rows($sql_spt) > 0) {
                        while($data = mysqli_fetch_array($sql_spt)) { ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$data['no_surat_spt']?></td>
                                <td><?=tgl_indo($data['tgl_surat'])?></td>
                                <td>
                                    <?php
                                    $sql_pegawai = mysqli_query($con, "SELECT * FROM tb_surat_pegawai INNER JOIN tb_pegawai ON tb_surat_pegawai.id_pegawai = tb_pegawai.id_pegawai WHERE id_spt = '$data[id_spt]'") or die (mysqli_error($con));
                                    while ($data_spt = mysqli_fetch_array($sql_pegawai)) {
                                        echo $data_spt['nama_pegawai']."<br>";
                                    }
                                    ?>
                                </td>
                                <td><?=$data['perihal']?></td>
                                <td class="text-center"><?=$data['jangka_waktu']?></td>
                                <td><?=tgl_indo($data['dari_tgl'])?></td>
                                <td><?=tgl_indo($data['sampai_tgl'])?></td>
                                <td class="text-center">
                                    <a href="edit.php?id=<?=$data['id_spt']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a href="del.php?id=<?=$data['id_spt']?>" onclick="return confirm('Yakin ingin menghapus data?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                                    <a href="cetak.php?id=<?=$data['id_spt']?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-print"></i></a>                
                                </td> 
                            </tr>
                        <?php
                        }
                    } else {
                        echo "<tr><td colspan=\"9\" align=\"center\">Data tidak ditemukan</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php 
        if (@$_POST['pencarian'] == '') { ?>
            <div style="float:left;">
                <?php 
                $jml = mysqli_num_rows(mysqli_query($con, $queryJml));
                echo "Jumlah Data : <b>$jml</b>";
                ?>            
            </div>
            <div style="float:right;">
                <ul class="pagination pagination-sm" style="margin:0">
                    <?php 
                    $jml_hal = ceil($jml / $batas);
                    for ($i=1; $i <= $jml_hal; $i++) {
                        if($i != $hal) {  
                            echo "<li><a href=\"?hal=$i\">$i</a></li>";                          
                        }else {
                            echo "<li class=\"active\"><a>$i</a></li>";
                        }
                    }
                    ?>
                </ul>
            </div>
            <?php    
        } else {
            echo "<div style=\"float:left;\">";
            $jml = mysqli_num_rows(mysqli_query($con, $queryJml));
            echo "Data Hasil Pencarian : <b>$jml</b>";
            echo "</div>";
        } 
        ?>
    </div>  
    <br><br><br>
    <div class="pull-right">
                <a href="submit.php" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-print"></i> Cetak Perbulan</a>
            </div>
            <br><br>
        <div class="pull-right">
                <a href="cetak2.php" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-print"></i> Cetak Semua </a>
            </div>