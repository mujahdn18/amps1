<?php include_once('../_header2.php'); ?>

    <div class="box">
        <h1>Pegawai</h1>        
        <h4>
            <small>Data Pegawai</small>
        </h4>    
        <form method="post" name="proses">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="pegawai">
                <thead>
                    <tr>
                    <th>No</th>
                        <th>NIP</th>
                        <th>Nama Pegawai</th>
                        <th>Jenis Kelamin</th>
                        <th>Jabatan</th>
                        <th>Pangkat</th>
                        <th>Seksi</th>
                        <th>No Telepon</th>
                        <th>Alamat</th> 
                        <th>Foto</th>     
                    </tr>
                </thead>
                <tbody>
                    <?php                    
                    $no = 1; 
                    $query = "SELECT * FROM tb_pegawai
                            INNER JOIN tb_pangkat ON tb_pegawai.id_pangkat = tb_pangkat.id_pangkat
                            INNER JOIN tb_eselon ON tb_pegawai.id_eselon = tb_eselon.id_eselon
                            ";                                   
                    $sql_pegawai = mysqli_query($con, $query) or die (mysqli_error($con));                    
                        while($data = mysqli_fetch_array($sql_pegawai)) { ?>
                            <tr>
                            <td><?=$no++?></td>
                                <td><?=$data['nip']?></td>
                                <td><?=$data['nama_pegawai']?></td>
                                <td><?=$data['jenis_kelamin']?></td>
                                <td><?=$data['jabatan']?></td>
                                <td><?=$data['pangkat']?></td>
                                <td><?=$data['seksi']?></td>
                                <td><?=$data['no_hp']?></td>
                                <td><?=$data['alamat']?></td>
                                <td><img src="../assets/img/<?=$data['foto']?>" width="120px"></td>   
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
            $('#pegawai').DataTable({                
                columnDefs: [
                    {
                    "searchable" : false,
                    "orderable" : false,
                    "targets" : 
                    }
                ],
                "order" : [0, "asc"]
            });
        });
        </script>

