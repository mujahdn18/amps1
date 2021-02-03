<?php include_once('../_header.php'); ?>

    <div class="box">
        <h1>Tunjangan Kinerja</h1>
        <h4>
            <small>Data Tunjangan Kinerja</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh" ></i></a>
                <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"> Tambah Data </i></a>
            </div>
        </h4>   
        <form method="post" name="proses">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="absen">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>                        
                        <th>Tanggal</th> 
                        <th>Pegawai</th>  
                        <th>Tunjangan Kinerja</th>                  
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php                    
                    $no = 1; 
                    $query = "SELECT * FROM tb_absen
                            INNER JOIN tb_pegawai ON tb_absen.id_pegawai = tb_pegawai.id_pegawai
                            ";                                 
                    $sql_absen = mysqli_query($con, $query) or die (mysqli_error($con));                    
                        while($data = mysqli_fetch_array($sql_absen)) { ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$data['kode_absen']?></td>
                                <td><?=tgl_indo($data['tgl_absen'])?></td> 
                                <td><?=$data['nama_pegawai']?></td>      
                                <td><?=rupiah($data['total'])?></td>                      
                                <td class="text-center">
                                    <a href="edit.php?id=<?=$data['id_absen']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a href="del.php?id=<?=$data['id_absen']?>" onclick="return confirm('Yakin ingin menghapus data?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                                    <a href="cetak2.php?id=<?=$data['id_absen']?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-print"></i></a>
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
            <a href="submit.php" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-print">  Cetak Perbulan </i></a>
        </div> 
        <br><br>
        <div class="pull-right">
            <a href="cetak.php" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-print">  Cetak Semua </i></a>
        </div> 
    </div>  
    <script>
        $(document).ready(function(){
            $('#absen').DataTable({
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