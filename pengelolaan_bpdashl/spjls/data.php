<?php include_once('../_header.php'); ?>

    <div class="box">
        <h1>SPJ LS</h1>
        <h4>
            <small>Data SPJ Belanja Langsung</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh" ></i></a>
                <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"> Tambah SPJ LS </i></a>
            </div>
        </h4>     
        <form method="post" name="proses">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="spjls">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No SPT</th>                        
                        <th>No SPM</th> 
                        <th>Tanggal SPM</th> 
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
                    $query = "SELECT * FROM tb_spjls
                            INNER JOIN tb_spt ON tb_spjls.id_spt = tb_spt.id_spt
                            ";                                
                    $sql_spjls = mysqli_query($con, $query) or die (mysqli_error($con));                    
                        while($data = mysqli_fetch_array($sql_spjls)) { ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$data['no_surat_spt']?></td>
                                <td><?=$data['no_spm']?></td> 
                                <td><?=tgl_indo($data['tgl_spm'])?></td>
                                <td><?=$data['seksi']?></td> 
                                <td><?=$data['perihal']?></td>
                                <td><?=$data['jumlah_uang']?></td>                                 
                                <td><?=$data['ket']?></td>                  
                                <td class="text-center">
                                    <a href="edit.php?id=<?=$data['id_spjls']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a href="del.php?id=<?=$data['id_spjls']?>" onclick="return confirm('Yakin ingin menghapus data?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                                    <a href="cetak2.php?id=<?=$data['id_spjls']?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-print"></i></a>
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
            $('#spjls').DataTable({
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