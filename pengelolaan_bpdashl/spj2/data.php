<?php include_once('../_header2.php'); ?>

    <div class="box">
        <h1>SPJ</h1>
        <h4>
            <small>Data Surat Pertanggung Jawaban</small>
            <div class="pull-right">
                <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh" ></i></a>
                <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"> Tambah SPJ </i></a>
            </div>
        </h4>        
        <form method="post" name="proses">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="spj">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>No. Surat</th>                        
                        <th>Tanggal Surat</th> 
                        <th>Pegawai</th>
                        <th>No SPT</th>
                        <th>Perihal</th>
                        <th>No SPD</th>
                        <th>Jumlah Uang</th>                         
                        <th><i class="glyphicon glyphicon-cog"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php                    
                    $no = 1;   
                    $query = "SELECT * FROM tb_spj 
                            INNER JOIN tb_pegawai ON tb_spj.id_pegawai = tb_pegawai.id_pegawai
                            INNER JOIN tb_spt ON tb_spj.id_spt = tb_spt.id_spt
                            INNER JOIN tb_spd ON tb_spj.id_spd = tb_spd.id_spd
                            INNER JOIN tb_ppk ON tb_spj.id_ppk = tb_ppk.id_ppk
                            INNER JOIN tb_pejabat ON tb_spj.id_pejabat = tb_pejabat.id_pejabat
                            ";                                   
                    $sql_spj = mysqli_query($con, $query ) or die (mysqli_error($con));                    
                        while($data = mysqli_fetch_array($sql_spj)) { ?>
                            <tr>
                                <td><?=$no++?></td>
                                <td><?=$data['no_surat_spj']?></td>
                                <td><?=tgl_indo($data['tgl_surat_spj'])?></td> 
                                <td><?=$data['nama_pegawai']?></td>
                                <td><?=$data['no_surat_spt']?></td>
                                <td><?=$data['perihal']?></td>
                                <td><?=$data['no_surat_spd']?></td>
                                <td><?=rupiah($data['jumlah_uang'])?></td>                            
                                <td class="text-center">
                                    <a href="edit.php?id=<?=$data['id_spj']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a href="del.php?id=<?=$data['id_spj']?>" onclick="return confirm('Yakin ingin menghapus data?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
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
            $('#spj').DataTable({
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