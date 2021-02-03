<?php
    include_once('../_header.php');
?>

<div class="box">
    <h1>Pimpinan</h1>
    <h4>
    <small>Tambah Data Pimpinan</small>
    <div class="pull-right">
        <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left">Kembali</i></a>
    </div>
    </h4>  
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
        <?php
        $id=@$_GET['id'];
        $sql_pimpinan=mysqli_query($con, "SELECT * FROM tb_pimpinan WHERE id_pimpinan = '$id'") or die(mysqli_error($con));
        $data=mysqli_fetch_array($sql_pimpinan)
        ?>
            <form action="proses.php" method="post">
                <div class="form-group">
                    <input type="hidden" name="id" id="id" value="<?=$data['id_pimpinan']?>">
                    <label for="nama_pimpinan">Nama Pimpinan</label>
                    <input type="text" name="nama_pimpinan" id="nama_pimpinan" value="<?=$data['nama_pimpinan']?>" class="form-control" required autofocus>
                </div>
                <div class="form-group">
                    <label for="nip_pimpinan">NIP Pimpinan</label>
                    <input type="text" name="nip_pimpinan" id="nip_pimpinan" value="<?=$data['nip_pimpinan']?>" class="form-control" required >
                </div>
                <div class="form-group">
                    <label for="id_pangkat">Pangkat</label>
                    <select name="id_pangkat" id="id_pangkat" class="form-control" required>
                        <option value="">- PILIH -</option>
                        <?php
                        $sql_pangkat=mysqli_query($con, "SELECT * FROM tb_pangkat ORDER BY pangkat ASC") or die(mysqli_error($con));
                        while($data_pangkat=mysqli_fetch_array($sql_pangkat)){
                            echo '<option value="'.$data_pangkat['id_pangkat'].'">'.$data_pangkat['pangkat'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="alamat_pimpinan">Alamat Pimpinan</label>
                    <textarea name="alamat_pimpinan" id="alamat_pimpinan" class="form-control" required><?=$data['alamat_pimpinan']?></textarea>
                </div>
                <div class="form-gorup pull-right">
                    <input type="submit" name="edit" value="Simpan" class="btn btn-success btn-xs">
                </div>
            </form>        
        </div>    
    </div>  
</div>