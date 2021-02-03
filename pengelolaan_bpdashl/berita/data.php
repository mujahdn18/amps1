<?php include_once('../_header.php'); ?>

    <div class="box">
        <h1>Berita</h1>        
        <h4>
            <small>Data Berita</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh" ></i></a>
                <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"> Tambah Berita </i></a>
            </div>
        </h4>    
        <form method="post" name="proses">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="berita">
                <thead>
                    <tr>
                    <th>No</th>
                        <th>Judul Berita</th>
                        <th>Tanggal</th>
                        <th>Pembuat Berita</th>
                        <th>Isi Berita</th>
                        <th>Foto</th>                      
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php                    
                    $no = 1; 
                    $query = "SELECT * FROM tb_berita
                            INNER JOIN tb_pegawai ON tb_berita.id_pegawai = tb_pegawai.id_pegawai
                            ";                                   
                    $sql_berita = mysqli_query($con, $query) or die (mysqli_error($con));                    
                        while($data = mysqli_fetch_array($sql_berita)) { ?>
                            <tr>
                            <td><?=$no++?></td>
                                <td><?=$data['judul_berita']?></td>
                                <td><?=tgl_indo($data['tgl_berita'])?></td>
                                <td><?=$data['nama_pegawai']?></td>
                                <td><?=$data['isi_berita']?></td> 
                                <td><img src="../assets/img_berita/<?=$data['foto_berita']?>" width="120px"></td>                               
                                <td class="text-center">
                                <a href="edit.php?id=<?=$data['id_berita']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="del.php?id=<?=$data['id_berita']?>" onclick="return confirm('Yakin ingin menghapus data?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
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
            $('#berita').DataTable({                
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

