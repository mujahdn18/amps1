<?php include_once('../_header.php'); ?>

    <div class="box">
        <h1>Surat Keluar</h1>
        <h4>
            <small> &nbsp; Data Surat Masuk</small>
            <div class="pull-left">
                <a href="data.php" class="btn btn-success btn-xs">Biasa </a>
                <a href="datapenting.php" class="btn btn-warning btn-xs">Penting </a>
                <a href="datarahasia.php" class="btn btn-danger btn-xs">Rahasia</a>
            </div>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh" ></i></a>
                <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"> Tambah Surat Keluar </i></a>
            </div>
        </h4>        
        <form method="post" name="proses">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="suratkeluar">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Surat</th>                        
                        <th>Tanggal Surat</th> 
                        <th>Menangani Surat</th> 
                        <th>Tujuan</th>
                        <th>Perihal</th> 
                        <th>File</th> 
                        <th>Sifat</th>                   
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php                    
                    $no = 1; 
                    $query = "SELECT * FROM tb_sk
                            INNER JOIN tb_pegawai ON tb_sk.id_pegawai = tb_pegawai.id_pegawai
                            WHERE sifat_surat = 'Rahasia'
                            ";                                 
                    $sql_sk = mysqli_query($con, $query) or die (mysqli_error($con));                    
                        while($data = mysqli_fetch_array($sql_sk)) { ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$data['no_surat_sk']?></td>
                                <td><?=tgl_indo($data['tgl_surat'])?></td> 
                                <td><?=$data['nama_pegawai']?></td> 
                                <td><?=$data['tujuan']?></td>
                                <td><?=$data['perihal']?></td>   
                                <td><a href="../assets/file_surat_keluar/<?=$data['filepdf']?>?id=<?=$data['id_sk']?>" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-download-alt"></i></a>
                                   <?=$data['filepdf']?></td>   
                                   <td><?=$data['sifat_surat']?></td>                 
                                <td class="text-center">
                                    <a href="edit.php?id=<?=$data['id_sk']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a href="del.php?id=<?=$data['id_sk']?>" onclick="return confirm('Yakin ingin menghapus data?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                                    <a href="cetak2.php?id=<?=$data['id_sk']?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-print"></i></a>
                                </td> 
                            </tr>
                    <?php
                    }                    
                    ?>
                </tbody>
            </table>
        </div>
        </form>
        <div class="pull-right">
                <a href="submit.php" class="btn btn-primary btn-sm" ><i class="glyphicon glyphicon-print"></i> Cetak Perbulan </a>
            </div>
            <br><br>
        <div class="pull-right">
                <a href="cetak.php" class="btn btn-primary btn-sm" ><i class="glyphicon glyphicon-print"></i> Cetak Semua  </a>
            </div>
            
    </div>  
    <script>
        $(document).ready(function(){
            $('#suratkeluar').DataTable({
                columnDefs: [
                    {
                    "searchable" : false,
                    "orderable" : false,
                    "targets" : 7
                    }
                ],
                "order" : [0, "asc"]
            });
        });
        </script>