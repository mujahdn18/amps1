<?php include_once('../_header.php'); ?>

    <div class="box">
        <h1>Mata Air</h1>
        <h4>
            <small>Data Mata Air</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh" ></i></a>
                <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"> Tambah Mata Air </i></a>
            </div>
        </h4>      
        <form method="post" name="proses">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="mataair">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Mata Air</th>                        
                        <th>PH Air</th> 
                        <th>Desa</th> 
                        <th>Kecamatan</th>
                        <th>Kabupaten</th>
                        <th>Provinsi</th>
                        <th>Jarak</th>                 
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php                    
                    $no = 1;                                 
                    $sql_mata_air = mysqli_query($con, "SELECT * FROM tb_mata_air") or die (mysqli_error($con));                    
                        while($data = mysqli_fetch_array($sql_mata_air)) { ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$data['nama_mata_air']?></td>
                                <td><?=$data['ph_air']?></td> 
                                <td><?=$data['desa']?></td> 
                                <td><?=$data['kecamatan']?></td>
                                <td><?=$data['kabupaten']?></td>
                                <td><?=$data['provinsi']?></td>
                                <td><?=$data['jarak']?></td>                     
                                <td class="text-center">
                                    <a href="edit.php?id=<?=$data['id_mata_air']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a href="del.php?id=<?=$data['id_mata_air']?>" onclick="return confirm('Yakin ingin menghapus data?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                                    <a href="cetak2.php?id=<?=$data['id_mata_air']?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-print"></i></a>
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
            $('#mataair').DataTable({
                columnDefs: [
                    {
                    "searchable" : false,
                    "orderable" : false,
                    "targets" : 8
                    }
                ],
                "order" : [0, "asc"]
            });
        });
        </script>