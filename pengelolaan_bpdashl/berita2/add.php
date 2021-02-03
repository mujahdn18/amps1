<?php 
include_once('../_header2.php');
?>

    <div class="box">
        <h1>Berita</h1>
            <h4>
                <small>Tambah Berita</small>
                <div class="pull-right">
                    <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"> Kembali </i></a>
                </div>
            </h4>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3">
                    <form action="proses.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="judul_berita">Judul Berita</label>
                            <textarea name="judul_berita" id="judul_berita" class="form-control" required autofocus></textarea>
                        </div>
                        <div class="form-group">
                            <label for="tgl_berita">Tanggal</label>
                            <input type="date" name="tgl_berita" id="tgl_berita" class="form-control" required>
                        </div> 
                        <div class="form-group">
                            <label for="id_pegawai">Pembuat Berita</label>
                            <select name="id_pegawai" id="id_pegawai" class="form-control" required>
                                <option value="">- Pilih -</option>
                                <?php
                                $sql_pegawai = mysqli_query($con, "SELECT * FROM tb_pegawai ORDER BY nama_pegawai ASC") or die (mysqli_error($con)); 
                                while($data_pegawai = mysqli_fetch_array($sql_pegawai)) {
                                    echo '<option value="'.$data_pegawai['id_pegawai'].'">'.$data_pegawai['nama_pegawai'].'</option>';
                                } 
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="isi_berita">Isi Berita</label>
                            <textarea name="isi_berita" id="isi_berita" class="form-control" required ></textarea>
                        </div>   
                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" class="form-control" name="foto" id="foto" required>
                        </div>                       
                        <div class="form-group pull-right">
                            <input type="reset" name="reset" value="Reset" class="btn btn-default">
                            <input type="submit" name="add" value="Simpan" class="btn btn-success">
                        </div>
                    </form>
                </div>
            </div>
    </div>