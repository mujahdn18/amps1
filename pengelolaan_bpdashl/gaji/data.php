<?php include_once('../_header.php'); ?>

    <div class="box">
        <h1>Gaji</h1>
        <h4>
            <small>Data Gaji</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh" ></i></a>
                <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"> Tambah Gaji </i></a>
            </div>
        </h4>
        <form method="post" name="proses">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="gaji">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal Gaji</th> 
                        <th>Nama Pegawai</th> 
                        <th>NIP</th> 
                        <th>Jabatan</th>
                        <th>Pangkat/Gol.</th>
                        <th>Gaji Pokok</th>  
                        <th>Gaji Kotor</th> 
                        <th>Jumlah Potongan</th>  
                        <th>Gaji Berish</th>                  
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php                    
                    $no = 1; 
                    $query = "SELECT * FROM tb_gaji
                            INNER JOIN tb_pegawai ON tb_gaji.id_pegawai = tb_pegawai.id_pegawai
                            INNER JOIN tb_eselon ON tb_pegawai.id_eselon = tb_eselon.id_eselon
                            INNER JOIN tb_pangkat ON tb_pegawai.id_pangkat = tb_pangkat.id_pangkat
                            ";                                 
                    $sql_gaji = mysqli_query($con, $query) or die (mysqli_error($con));                    
                        while($data = mysqli_fetch_array($sql_gaji)) { ?>
                            <tr>
                                <td><?=$no++?></td>                                
                                <td><?=tgl_indo($data['tgl_gaji'])?></td> 
                                <td><?=$data['nama_pegawai']?></td> 
                                <td><?=$data['nip']?></td>
                                <td><?=$data['jabatan']?></td>
                                <td><?=$data['pangkat']?></td>
                                <td><?=rupiah($data['gapok'])?></td>
                                <td><?=rupiah($data['jml_kotor'])?></td>
                                <td><?=rupiah($data['jml_pot'])?></td>
                                <td><?=rupiah($data['total_gaji'])?></td>                      
                                <td class="text-center">
                                    <a href="edit.php?id=<?=$data['id_gaji']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a href="del.php?id=<?=$data['id_gaji']?>" onclick="return confirm('Yakin ingin menghapus data?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
                                    <a href="cetak2.php?id=<?=$data['id_gaji']?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-print"></i></a>
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
                <a href="submit.php" class="btn btn-primary btn-sm" ><i class="glyphicon glyphicon-print"></i> Cetak Perbulan </a>
                 </div> 
                 <br><br>
        <div class="pull-right">
                <a href="cetak.php" class="btn btn-primary btn-sm" ><i class="glyphicon glyphicon-print"></i> Cetak Semua </a>
                 </div> 
    </div>  
    <script>
        $(document).ready(function(){
            $('#gaji').DataTable({
                columnDefs: [
                    {
                    "searchable" : false,
                    "orderable" : false,
                    "targets" : 10
                    }
                ],
                "order" : [0, "asc"]
            });
        });
        </script>