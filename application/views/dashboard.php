<?php ob_start(); ?>
    Dashboard
<?php
    $tittle = ob_get_clean();
    ob_flush();
?>

<?php ob_start(); ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>
<div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Jumlah Barang</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $barang_all; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-briefcase fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Barang Masuk</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $barang_in; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-arrow-circle-down fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Barang Keluar</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $barang_out; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-arrow-circle-up fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Barang Transit</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $barang_wait; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-pause-circle fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card shadow mb-12">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tentang Aplikasi</h6>
                </div>
                <div class="card-body">
                  <div class="text-center">
                    <img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="<?php echo base_url() ?>/assets/img/undraw_posting_photo.svg" alt="">
                  </div>
                    <p>Aplikasi ini digunakan untuk Penyimpanan Gudang dan Memudahkan Administrator Gudang untuk mengelola Gudangnya</p>
                  </div>
          </div>
  <?php
      $mainContent = ob_get_clean();
      include ('Masterpage.php');
      ob_flush();
  ?>
