<?php ob_start(); ?>
   Transaksi Pengambilan
<?php
    $tittle = ob_get_clean();
    ob_flush();
?>

<?php ob_start(); ?>
<div class="card shadow mb-4">
    <div class="card-header">
      <div class="card-title">
        <h5 class="m-0 font-weight-bold text-primary">Transaksi Pengambilan</h5>
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
                    <th style="text-align:center;">Jumlah Barang di Storage</th>
                    <th>Keterangan</th>
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
                    <td style="text-align:center;"><?php echo $item->qty; ?></td>
                    <td><?php echo $item->keterangan; ?></td>
                    <td><?php echo date_format(new datetime($item->tgl_daftar),"d F Y"); ?></td>
                    <td><?php if($item->status==1){echo "<span class='badge badge-info'>Aktif</span>";}else{echo "<span class='badge badge-danger'>Non Aktif</span>";} ?></td>
                    <td>
                    <a title="Pengambilan"  href="<?php echo site_url('KelolaTransaksiPengambilan/viewStorage/'.$item->id_barang); ?>"><span class="btn btn-xs btn-teal tooltips"><i
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
