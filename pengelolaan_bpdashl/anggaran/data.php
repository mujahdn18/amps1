<?php include_once('../_header.php'); ?>

    <div class="box">
        <h1>Anggaran</h1>
        <h4>
            <small>Data Anggaran</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh" ></i></a>
                <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"> Tambah Anggaran </i></a>
            </div>
        </h4>      
        <form method="post" name="proses">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="anggaran">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Anggaran</th>                        
                        <th>Jumlah Uang PL</th> 
                        <th>Jumlah Uang Non PL</th> 
                        <th>PPK</th>                
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php                    
                    $no = 1; 
                    $query = "SELECT * FROM tb_anggaran
                            INNER JOIN tb_ppk ON tb_anggaran.id_ppk = tb_ppk.id_ppk
                            ";                                
                    $sql_anggaran = mysqli_query($con, $query) or die (mysqli_error($con));                    
                        while($data = mysqli_fetch_array($sql_anggaran)) { ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$data['no_anggaran']?></td>
                                <td><?=$data['jumlah_uangpl']?></td> 
                                <td><?=$data['jumlah_uangnonpl']?></td>
                                <td><?=$data['nama_ppk']?></td>                
                                <td class="text-center">
                                    <a href="edit.php?id=<?=$data['id_anggaran']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a href="del.php?id=<?=$data['id_anggaran']?>" onclick="return confirm('Yakin ingin menghapus data?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                                    <a href="cetak2.php?id=<?=$data['id_anggaran']?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-print"></i></a>
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
            $('#anggaran').DataTable({
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