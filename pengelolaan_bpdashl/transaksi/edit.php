<?php 
include_once('../_header.php');
?>

    <div class="box">
        <h1>Transaksi</h1>
            <h4>
                <small>Edit Data Transaksi</small>
                <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"> Kembali </i></a>
                </div>
            </h4>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                <?php
                $id = @$_GET['id'];
                $sql_transaksi = mysqli_query($con, "SELECT * FROM tb_transaksi WHERE id_transaksi = '$id'") or die (mysqi_error($con));
                $data = mysqli_fetch_array($sql_transaksi);
                ?>
                    <form action="proses.php" method="post">
                        <div class="form-group">
                            <label for="no_bukti">No Bukti</label>
                            <input type="hidden" name="id" value="<?=$data['id_transaksi']?>">
                            <input type="text" name="no_bukti" id="no_bukti" value="<?=$data['no_bukti']?>" class="form-control" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="jenis_transaksi">Jenis Transaksi</label>
                            <select name="jenis_transaksi" id="jenis_transaksi" class="form-control" required>
                                <option value=""><?=$data['jenis_transaksi']?></option>
                                <option value="Bayar UM">Bayar UM</option>
                                <option value="Kuitansi UM">Kuitansi UM</option>
                                <option value="Bayar Kuitansi">Bayar Kuitansi</option>
                            </select>
                        </div>  
                        <div class="form-group">
                            <label for="tgl_transaksi">Tanggal Transaksi</label>
                            <input type="date"  name="tgl_transaksi" id="tgl_transaksi" value="<?=$data['tgl_transaksi']?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="penerima">Penerima</label>
                            <input type="text" name="penerima" id="penerima" value="<?=$data['penerima']?>" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="keg">Kegiatan</label>
                            <textarea name="keg" id="keg" class="form-control" required ><?=$data['keg']?></textarea>
                        </div>         
                        <div class="form-group">
                            <label for="jumlah_uang">Jumlah Uang</label>
                            <input type="number" name="jumlah_uang" id="jumlah_uang" value="<?=$data['jumlah_uang']?>" class="form-control" required>
                        </div>             
                        <div class="form-group pull-right">
                            <input type="reset" name="reset" value="Reset" class="btn btn-default">
                            <input type="submit" name="edit" value="Simpan" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
    </div>