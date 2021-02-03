<?php include_once('../_header.php'); ?>

    <div class="box">
        <h1>SPJ UP</h1>
        <h4>
            <small>Data SPJ Uang Persediaan</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh" ></i></a>
                <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"> Tambah SPJ UP </i></a>
            </div>
        </h4>       
        <form method="post" name="proses">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="spjup">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Kuitansi</th>                        
                        <th>No DRPP</th> 
                        <th>Seksi</th> 
                        <th>Kegiatan</th>                        
                        <th>Jumlah Uang</th> 
                        <th>Keterangan</th>                
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php                    
                    $no = 1;                                 
                    $sql_spjup = mysqli_query($con, "SELECT * FROM tb_spjup") or die (mysqli_error($con));                    
                        while($data = mysqli_fetch_array($sql_spjup)) { ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$data['no_kuitansi']?></td>
                                <td><?=$data['no_drpp']?></td> 
                                <td><?=$data['seksi']?></td> 
                                <td><?=$data['keg']?></td>
                                <td><?=$data['jumlah_uang']?></td>                                 
                                <td><?=$data['ket']?></td>                  
                                <td class="text-center">
                                    <a href="edit.php?id=<?=$data['id_spjup']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a href="del.php?id=<?=$data['id_spjup']?>" onclick="return confirm('Yakin ingin menghapus data?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                                    <a href="cetak2.php?id=<?=$data['id_spjup']?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-print"></i></a>
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
                <a href="cetak.php" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-print">  Cetak Semua </i></a>
            </div>
    </div>  
    <script>
        $(document).ready(function(){
            $('#spjup').DataTable({
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