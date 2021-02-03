<?php include_once('../_header2.php'); ?>

    <div class="box">
        <h1>Surat Cuti</h1>
        <h4>
            <small>Data Surat Cuti</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh" ></i></a>
                <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"> Tambah Surat Cuti </i></a>
            </div>
        </h4>        
        <form method="post" name="proses">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="suratcuti">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Cuti</th>                        
                        <th>Perihal</th> 
                        <th>Nama Pegawai</th> 
                        <th>Jangka Hari</th>  
                        <th>Dari Tanggal</th>
                        <th>Sampai Tanggal</th>   
                        <th>Keterangan</th>                
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php                    
                    $no = 1; 
                    $query = "SELECT * FROM tb_cuti
                            INNER JOIN tb_pegawai ON tb_cuti.id_pegawai = tb_pegawai.id_pegawai
                            ";                                 
                    $sql_cuti = mysqli_query($con, $query) or die (mysqli_error($con));                    
                        while($data = mysqli_fetch_array($sql_cuti)) { ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=tgl_indo($data['tgl_cuti'])?></td>
                                <td><?=$data['perihal']?></td>  
                                <td><?=$data['nama_pegawai']?></td>   
                                <td class="text-center"><?=$data['jangka_hari']?></td>     
                                <td><?=tgl_indo($data['dari_tgl'])?></td> 
                                <td><?=tgl_indo($data['sampai_tgl'])?></td>      
                                <td><?=$data['keterangan']?></td>                  
                                <td class="text-center">
                                    <a href="edit.php?id=<?=$data['id_cuti']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a href="del.php?id=<?=$data['id_cuti']?>" onclick="return confirm('Yakin ingin menghapus data?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>    
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
            $('#suratcuti').DataTable({
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