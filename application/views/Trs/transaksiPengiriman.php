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
        <h5 class="m-0 font-weight-bold text-primary">Transaksi Pengiriman</h5>
      </div>
    </div>
    <div class="card-body">
        
        <br>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>ID Transaksi</th>
                        <th>Nama Barang</th>
						<th>Nama Gudang</th>
                        <th>Keterangan</th>
						<th>Tanggal Konfirmasi</th>
                        <th width="300px">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no=1;
                        foreach($transaksi as $item) { ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $item->id_trx; ?></td> 
                        <td><?php echo $item->nama_barang; ?></td>
						<td>Area <?php echo $item->Area; ?> Lemari <?php echo $item->Lemari; ?></td>
                        <td><?php echo $item->keterangan; ?></td>
						<td><?php echo $item->tgl_aksi; ?></td>
                        <td>
                        <a title="Transaksi diambil" onclick="ambilConfirm('<?php echo base_url('KelolaTransaksiKirim/statusKirim/'.$item->id_trx) ?>')" href="#"><span class="btn btn-xs btn-teal tooltips"><i class="fa fa-check"></i></span></a>

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