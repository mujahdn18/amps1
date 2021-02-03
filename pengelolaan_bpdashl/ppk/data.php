<?php include_once('../_header.php'); ?>

    <div class="box">
        <h1>PPK</h1>
        <h4>
            <small>Data Pejabat Pembuat Komitmen</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh" ></i></a>
                <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"> Tambah PPK </i></a>
            </div>
        </h4>      
        <form method="post" name="proses">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="ppk">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NAMA</th>                        
                        <th>NIP</th> 
                        <th>Seksi</th>                
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php                    
                    $no = 1;                                 
                    $sql_ppk = mysqli_query($con, "SELECT * FROM tb_ppk") or die (mysqli_error($con));                    
                        while($data = mysqli_fetch_array($sql_ppk)) { ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$data['nama_ppk']?></td>
                                <td><?=$data['nip']?></td> 
                                <td><?=$data['seksi_ppk']?></td>               
                                <td class="text-center">
                                    <a href="edit.php?id=<?=$data['id_ppk']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a href="del.php?id=<?=$data['id_ppk']?>" onclick="return confirm('Yakin ingin menghapus data?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                                    <a href="cetak2.php?id=<?=$data['id_ppk']?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-print"></i></a>
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
                <a href="cetak.php" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-print">  Cetak Data </i></a>
            </div> 
    </div>  
    <script>
        $(document).ready(function(){
            $('#ppk').DataTable({
                columnDefs: [
                    {
                    "searchable" : false,
                    "orderable" : false,
                    "targets" : 4
                    }
                ],
                "order" : [0, "asc"]
            });
        });
        </script>