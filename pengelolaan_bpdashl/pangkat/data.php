<?php include_once('../_header.php'); ?>

    <div class="box">
        <h1>Pangkat/Golongan</h1>
        <h4>
            <small>Data Pangkat/Golongan</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh" ></i></a>
                <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"> Tambah Data </i></a>
            </div>
        </h4>        
        <form method="post" name="proses">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="pangkat">
                <thead>
                    <tr>
                        <th>No</th>                       
                        <th>Pangkat</th> 
                        <th>Gaji Pokok</th>                                           
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php                    
                    $no = 1;                                
                    $sql_pangkat = mysqli_query($con, "SELECT * FROM tb_pangkat ORDER BY gapok DESC") or die (mysqli_error($con));                    
                        while($data = mysqli_fetch_array($sql_pangkat)) { ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$data['pangkat']?></td>
                                <td><?=rupiah($data['gapok'])?></td>                    
                                <td class="text-center">
                                    <a href="edit.php?id=<?=$data['id_pangkat']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a href="del.php?id=<?=$data['id_pangkat']?>" onclick="return confirm('Yakin ingin menghapus data?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                                </td> 
                            </tr>
                    <?php
                    }                    
                    ?>
                </tbody>
            </table>
        </div>
        </form>
    </div>  
    <script>
        $(document).ready(function(){
            $('#pangkat').DataTable({
                columnDefs: [
                    {
                    "searchable" : false,
                    "orderable" : false,
                    "targets" : 3
                    }
                ],
                "order" : [0, "asc"]
            });
        });
        </script>