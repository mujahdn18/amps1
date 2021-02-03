<?php
include_once('../_header.php');
?>

<div class="box">
    <h1>Pimpinan</h1>
    <h4>
        <small>Data Pimpinan</small>
        <div class="pull-right">
            <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus">Tambah Data</i></a>
        </div>
    </h4>
</div>
<form action="" method="post">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="pimpinan">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>Pangkat</th>
                    <th>Alamat</th>
                    <th class="text-center">
                        <i class="glyphicon glyphicon-cog"></i>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no=1;
                $query="SELECT * FROM tb_pimpinan
                        INNER JOIN tb_pangkat ON tb_pimpinan.id_pangkat=tb_pangkat.id_pangkat";
                $sql_pimpinan=mysqli_query($con, $query) or die(mysqli_error($con));
                while($data=mysqli_fetch_array($sql_pimpinan)){?>
                    <tr>
                        <td><?=$no++?></td>
                        <td><?=$data['nama_pimpinan']?></td>
                        <td><?=$data['nip_pimpinan']?></td>
                        <td><?=$data['pangkat']?></td>
                        <td><?=$data['alamat_pimpinan']?></td>
                        <td class="text-center">
                            <a href="edit.php?id=<?=$data['id_pimpinan']?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>
                            <a href="del.php?id=<?=$data['id_pimpinan']?>" onclick="return confirm('Yakin menghapus data?')" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></a>
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
            <a href="cetak2.php" targets="blank" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-print">Cetak Data</i></a>
        </div>
<script>
    $(document).ready(function(){
        $('#pimpinan').DataTable({
            columnDefs : [
                {
                    "searchable" : false,
                    "orderable" : false,
                    "targets" : 5
                }
            ],
            "order" : [0, "asc"]
        });
    });
</script>