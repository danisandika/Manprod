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
        <h5 class="m-0 font-weight-bold text-primary">Transaksi Penyimpanan</h5>
      </div>
    </div>
    <div class="card-body">

        <br>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Jenis Barang</th>
                    <th>Jumlah Barang di Rak</th>
                    <th>Keterangan</th>
                    <th style="display:none;">Barcode</th>
                    <th>Tanggal Daftar</th>
                    <th>Status</th>
                    <th width="100px">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $no=1;
                    foreach($barang as $item) { ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $item->nama_barang; ?></td>
                    <td><?php echo $item->jenis_barang; ?></td>
                    <td><?php echo $item->qty; ?></td>
                    <td><?php echo $item->keterangan; ?></td>
                    <td style="display:none;"><?php echo $item->barcode_string; ?></td>
                    <td><?php echo date_format(new datetime($item->tgl_daftar),"d F Y"); ?></td>
                    <td><?php if($item->status==1){echo "<span class='badge badge-info'>Aktif</span>";}else{echo "<span class='badge badge-danger'>Non Aktif</span>";} ?></td>
                    <td>
                    <a title="Tambah ke Penyimpanan"  href="<?php echo site_url('KelolaTransaksiPenyimpanan/tambahTransaksi/'.$item->id_barang); ?>"><span class="btn btn-xs btn-teal tooltips"><i
                            class="fa fa-edit"></i></span></a>
                    </td>
                </tr>
                <?php
                $no++;
                } ?>
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
