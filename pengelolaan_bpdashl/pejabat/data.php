<?php include_once('../_header.php'); ?>

    <div class="box">
        <h1>Pejabat</h1>
        <h4>
            <small>Data Pejabat</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh" ></i></a>
                <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"> Tambah Pejabat </i></a>
            </div>
        </h4>      
        <form method="post" name="proses">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="pejabat">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NAMA</th>                        
                        <th>NIP</th>
                        <th>Jabatan</th> 
                        <th>Seksi</th>                
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php                    
                    $no = 1;                                 
                    $sql_pejabat = mysqli_query($con, "SELECT * FROM tb_pejabat") or die (mysqli_error($con));                    
                        while($data = mysqli_fetch_array($sql_pejabat)) { ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$data['nama_pejabat']?></td>
                                <td><?=$data['nip']?></td> 
                                <td><?=$data['jabatan']?></td>
                                <td><?=$data['seksi_pejabat']?></td>               
                                <td class="text-center">
                                    <a href="edit.php?id=<?=$data['id_pejabat']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a href="del.php?id=<?=$data['id_pejabat']?>" onclick="return confirm('Yakin ingin menghapus data?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                                    <a href="cetak2.php?id=<?=$data['id_pejabat']?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-print"></i></a>
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
            $('#pejabat').DataTable({
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