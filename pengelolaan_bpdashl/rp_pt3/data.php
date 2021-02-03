<?php include_once('../_header.php'); ?>

    <div class="box">
        <h1>Riwayat Pendidikan Perguruan Tinggai III</h1>
        <h4>
            <small>Data Riwayat Pendidikan Perguruan Tinggai III</small>
            <div class="pull-right">
            <a href="../biodata/biodata.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"> Kembali </i></a>
                
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh" ></i></a>
                <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"> Tambah Riwayat </i></a>
            </div>
        </h4>        
        <form method="post" name="proses">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="rp_pt3">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Ijazah</th>  
                        <th>Nama</th>                        
                        <th>Tahun Masuk</th> 
                        <th>Tahun Lulus</th> 
                        <th>Nama Universitas</th>
                        <th>Kota</th>
                        <th>File Ijazah</th>                    
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php                    
                    $no = 1;                                
                    $sql_rppt3 = mysqli_query($con, "SELECT * FROM tb_rppt3") or die (mysqli_error($con));                    
                        while($data = mysqli_fetch_array($sql_rppt3)) { ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$data['noijazah_pt3']?></td> 
                                <td><?=$data['namaorg_pt3']?></td>
                                <td><?=$data['dthn_pt3']?></td>
                                <td><?=$data['sthn_pt3']?></td>      
                                <td><?=$data['nama_pt3']?></td> 
                                <td><?=$data['kota_pt3']?></td> 
                                <td><a href="../assets/fileijazah_pt3/<?=$data['fileijazah_pt3']?>?id=<?=$data['id_pt3']?>" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-download-alt"></i></a>
                                   <?=$data['fileijazah_pt3']?></td>                       
                                <td class="text-center">
                                    <a href="edit.php?id=<?=$data['id_pt3']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a href="del.php?id=<?=$data['id_pt3']?>" onclick="return confirm('Yakin ingin menghapus data?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>    
                                </td> 
                            </tr>
                    <?php
                    }                    
                    ?>
                </tbody>
            </table>
        </div>
        </form>
    <script>
        $(document).ready(function(){
            $('#rp_pt3').DataTable({
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