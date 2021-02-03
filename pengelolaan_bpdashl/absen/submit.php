<?php 
include_once('../_header.php');
?>
<div class="content-wrapper">

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?=base_url('dashboard')?>">Beranda</a></li>
          <li class="breadcrumb-item"><a href="data.php">Data Tunjangan Kinerja</a></li>
          <li class="breadcrumb-item active">Laporan Bulanan</li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

  <div class="col-md-12 garis">
    <div class="row " >
      <div class="col-sm-2"> 
        <!-- text input -->
        <!-- <div class="form-group">
          <img src="../dist/img/logo.png" style="width: 130px; margin-left: 70px;">
        </div> -->
      </div>

      <div class="col-sm-9">
        <!-- <div class="form-group">
          <h2 class="text-center" style="font-family: times new roman; font-size: 7mm; margin-left: 20px;" >KEMENTERIAN AGAMA REPUBLIK INDONESIA <br>KEMENTERIAN AGAMA KABUPATEN BARITO TIMUR<br>KANTOR URUSAN AGAMA KECEMATAN DUSUN TENGAH</h2>
          <p class="text-center">Jl. Ampah-Muara Teweh Km.3,5 Telp. (0522) 31475 Kode Pos 73652 Kel. Ampah Kota <br> Email : kuadusteng@yahoo.com / kuadusteng@gmail.com</p>
        </div> -->
      </div>
    </div>
    <hr class="line-top" />
  </div >
      <div class="container-fluid container-fullw bg-grey">
           <section class="content">
      <div class="container-fluid">
        <div class="col-12">
          <div class="card">
            
            <div class="card-header">
              <h5 class="panel-title">Masukan tanggal awal dan akhir laporan</h5>
            </div>
            <br>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                
                  <form role="form" method="post" action="hasil.php">
                  <div class="col-sm-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">
                                 Dari Tanggal:
                    </label>
                    <input type="date" class="form-control" name="fromdate" id="fromdate" value="" required='true'>
                  </div>
                  </div>
                  <br><br><br><br>
                  <div class="form-group">
                    <div class="col-sm-6">
                    <label for="exampleInputPassword1">
                                 Sampai Tanggal:
                    </label>
                    <input type="date" class="form-control" name="todate" id="todate" value="" required='true'>
                  </div>      
                </div>
                <br><br><br>
                <div class="col-sm-6">
                  <button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
                    Submit
                </div>
                
                </button>
                </form>

              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
      </div>