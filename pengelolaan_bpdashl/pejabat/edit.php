<?php 
include_once('../_header.php');
?>

    <div class="box">
        <h1>Pejabat</h1>
            <h4>
                <small>Edit Data Pejabat</small>
                <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"> Kembali </i></a>
                </div>
            </h4>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                <?php
                $id = @$_GET['id'];
                $sql_pejabat = mysqli_query($con, "SELECT * FROM tb_pejabat WHERE id_pejabat = '$id'") or die (mysqi_error($con));
                $data = mysqli_fetch_array($sql_pejabat);
                ?>  
                    <form action="proses.php" method="post">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?=$data['id_pejabat']?>">
                            <label for="nama_pejabat">Nama</label>
                            <input type="text" name="nama_pejabat" id="nama_pejabat" value="<?=$data['nama_pejabat']?>" class="form-control" required autofocus>
                        </div>                               
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" name="nip" id="nip" value="<?=$data['nip']?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" name="jabatan" id="jabatan" value="<?=$data['jabatan']?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="seksi_pejabat">Seksi</label>
                            <select name="seksi_pejabat" id="seksi_pejabat" class="form-control" required>
                                <option value=""><?=$data['seksi_pejabat']?></option>
                                <option value="Tata Usaha">Tata Usaha</option>
                                <option value="Seksi Program">Seksi Program</option>
                                <option value="Keuangan">Keuangan</option>
                                <option value="Seksi Evaluasi">Seksi Evaluasi</option>
                                <option value="Seksi RHL">Seksi RHL</option>
                            </select>
                        </div>       
                        <div class="form-group pull-right">
                            <input type="reset" name="reset" value="Reset" class="btn btn-default">
                            <input type="submit" name="edit" value="Simpan" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
    </div>