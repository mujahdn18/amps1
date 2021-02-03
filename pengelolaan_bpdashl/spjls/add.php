<?php 
include_once('../_header.php');
?>

    <div class="box">
        <h1>SPJ LS</h1>
            <h4>
                <small>Tambah Data SPJ Belanja Langsung</small>
                <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"> Kembali </i></a>
                </div>
            </h4>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <form action="proses.php" method="post">
                    <div class="form-group">
                            <label for="id_spt">No SPT</label>
                            <select name="id_spt" id="id_spt" class="form-control" required autofocus>
                                <option value="">- Pilih -</option>
                                <?php
                                $sql_spt = mysqli_query($con, "SELECT * FROM tb_spt ORDER BY no_surat_spt ASC") or die (mysqli_error($con)); 
                                while($data_spt = mysqli_fetch_array($sql_spt)) {
                                    echo '<option value="'.$data_spt['id_spt'].'">'.$data_spt['no_surat_spt'].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="no_spm">No SPM</label>
                            <input type="text" name="no_spm" id="no_spm" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="tgl_spm">Tanggal SPM</label>
                            <input type="date" name="tgl_spm" id="tgl_spm" class="form-control" required>
                        </div>  
                        <div class="form-group">
                            <label for="seksi">Seksi</label>
                            <select name="seksi" id="seksi" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <option value="Tata Usaha">Tata Usaha</option>
                                <option value="Seksi Program">Seksi Program</option>
                                <option value="Keuangan">Keuangan</option>
                                <option value="Seksi Evaluasi">Seksi Evaluasi</option>
                                <option value="Seksi RHL">Seksi RHL</option>
                            </select>
                        </div>       
                        <div class="form-group">
                            <label for="jumlah_uang">Jumlah Uang</label>
                            <input type="number" name="jumlah_uang" id="jumlah_uang" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="ket">Kekurangan</label>
                            <textarea name="ket" id="ket" class="form-control" required ></textarea>
                        </div>             
                        <div class="form-group pull-right">
                            <input type="reset" name="reset" value="Reset" class="btn btn-default">
                            <input type="submit" name="add" value="Simpan" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
    </div>