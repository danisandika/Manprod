<?php ob_start(); ?>
    Transaksi Penyimpanan
<?php
    $tittle = ob_get_clean();
    ob_flush();
?>

<?php ob_start(); ?>
<div class="card shadow mb-4">
    <div class="card-header">
      <div class="card-title">
        <h5 class="m-0 font-weight-bold text-primary">Add Transaksi to Penyimpanan</h5>
      </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-8">
            <a href="<?php echo base_url('KelolaTransaksiPenyimpanan/index')?>" class="btn btn-primary">Tambah </a>
            </div>
        </div>
        <br>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                  <th>No</th>
                  <th>Nama Barang</th>
                  <th>Jumlah</th>
                  <th>Jumlah Masuk</th>
                  <th>Jumlah Menunggu</th>
                  <th>Karyawan</th>
                  <th>Supplier</th>
                  <th>Tanggal Masuk</th>
                  <th>Status</th>
                  <th style="width:50px;">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no=1;
              foreach($transaksi as $item) {?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $item->nama_barang ?></td>
                <td><?php echo $item->qty ?></td>
                <td><?php echo $item->qty_masuk ?></td>
                <td><?php echo $item->qty_rusak ?></td>
                <td><?php echo $item->nama_karyawan ?></td>
                <td><?php echo $item->nama_supplier ?></td>
                <td><?php echo date_format(new datetime($item->tgl_diterima),"d F Y"); ?></td>
                <td>
                  <?php if($item->status==0){ ?><span class="badge badge-warning">Menunggu</span> <?php }?>
                </td>
                <td><a title="Simpan ke Storage"  href="<?php echo site_url('TransaksiPenyimpananToStorage/addTransaksiPenyimpanantoStorage/'.$item->id_barang.'/'.$item->id_trx); ?>"><span class="btn btn-xs btn-teal tooltips"><i
                        class="fa fa-edit"></i></span></a></td>
              </tr>
            <?php } ?>
            </tbody>
          </table>
        </div>
        </div>
    </div>
<?php
    $mainContent = ob_get_clean();
    include ('Masterpage.php');
    ob_flush();
?>
