<?php include_once('../_header2.php'); ?>

    <div class="box">
        <h1>Surat Keluar</h1>
        <h4>
            <small> &nbsp; Data Surat Masuk</small>
        </h4>        
        <form method="post" name="proses">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="suratkeluar">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No Surat</th>                        
                        <th>Tanggal Surat</th> 
                        <th>Menangani Surat</th> 
                        <th>Tujuan</th>
                        <th>Perihal</th> 
                        <th>File</th>                  
                    </tr>
                </thead>
                <tbody>
                    <?php                    
                    $no = 1; 
                    $query = "SELECT * FROM tb_sk
                            INNER JOIN tb_pegawai ON tb_sk.id_pegawai = tb_pegawai.id_pegawai
                            ";                                 
                    $sql_sk = mysqli_query($con, $query) or die (mysqli_error($con));                    
                        while($data = mysqli_fetch_array($sql_sk)) { ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$data['no_surat_sk']?></td>
                                <td><?=tgl_indo($data['tgl_surat'])?></td> 
                                <td><?=$data['nama_pegawai']?></td> 
                                <td><?=$data['tujuan']?></td>
                                <td><?=$data['perihal']?></td>   
                                <td><a href="../assets/file_surat_keluar/<?=$data['filepdf']?>?id=<?=$data['id_sk']?>" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-download-alt"></i></a>
                                   <?=$data['filepdf']?></td>   
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
            $('#suratkeluar').DataTable({
                columnDefs: [
                    {
                    "searchable" : false,
                    "orderable" : false,
                    "targets" : 6
                    }
                ],
                "order" : [0, "asc"]
            });
        });
        </script>