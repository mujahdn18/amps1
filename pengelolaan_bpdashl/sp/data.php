<?php include_once('../_header.php'); ?>

    <div class="box">
        <h1>Surat Peringatan</h1>
        <h4>
            <small>Data Surat Peringatan</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh" ></i></a>
                <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"> Tambah Surat Peringatan </i></a>
            </div>
        </h4>        
        <form method="post" name="proses">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="sp">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Surat</th> 
                        <th>Nama Pegawai</th>   
                        <th>Keterangan</th>
                        <th>Tanggal Surat</th>                
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php                    
                    $no = 1; 
                    $query = "SELECT * FROM tb_sp
                            INNER JOIN tb_pegawai ON tb_sp.id_pegawai = tb_pegawai.id_pegawai
                            ";                                 
                    $sql_sp = mysqli_query($con, $query) or die (mysqli_error($con));                    
                        while($data = mysqli_fetch_array($sql_sp)) { ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$data['no_sp']?></td>
                                <td><?=$data['nama_pegawai']?></td>      
                                <td><?=$data['keterangan']?></td> 
                                <td><?=tgl_indo($data['tgl_sp'])?></td>                 
                                <td class="text-center">
                                    <a href="edit.php?id=<?=$data['id_sp']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a href="del.php?id=<?=$data['id_sp']?>" onclick="return confirm('Yakin ingin menghapus data?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>    
                                    <a href="cetakperid.php?id=<?=$data['id_sp']?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-print"></i></a>                
                               
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
                <a href="submit.php" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-print"></i> Cetak Perbulan</a>
            </div>
            <br><br>
        <div class="pull-right">
                <a href="cetaksemua.php" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-print"></i> Cetak Semua </a>
            </div>
    <script>
        $(document).ready(function(){
            $('#sp').DataTable({
                columnDefs: [
                    {
                    "searchable" : false,
                    "orderable" : false,
                    "targets" : 5
                    }
                ],
                "order" : [0, "asc"]
            });
        });
        </script>