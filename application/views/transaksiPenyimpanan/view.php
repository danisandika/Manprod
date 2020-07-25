<?php ob_start(); ?>
    transaksi Penyimpanan
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
        <div class="row">
            <div class="col-sm-8">
            <a href="<?php echo base_url('TransaksiPenyimpanan/tambahBarang')?>" class="btn btn-primary">Tambah Penyimpanan</a>
            </div>
        </div>
        <br>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px">
                    <thead>
                    <tr>
                        <th>ID Transaksi</th>
                        <th>Nama Barang</th>
                        <th>Tempat Penyimpanan</th>
                        <th>Karyawan</th>
						<th>Jumlah Barang</th>
                        <th>Tanggal Penyimpanan</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th width="300px">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no=1;
                        foreach($transaksi as $item) { ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $item->nama_barang; ?></td> 
                        <td>Area <?php echo $item->Area; ?> Lemari <?php echo $item->Lemari; ?></td>
                        <td><?php echo $item->nama_kry; ?></td>
						<td><?php echo $item->qty; ?></td>
                        <td><?php echo $item->tgl_aksi; ?></td>
                        <td><?php echo $item->keterangan; ?></td>
                        <td><?php if($item->status==1){echo "<span class='badge badge-info'>Aktif</span>";}else{echo "<span class='badge badge-danger'>Non Aktif</span>";} ?></td>
                        <td>
                        <a title="Ubah Barang" href="<?php echo site_url('KelolaBarang/editBarang/'.$item->id_barang); ?>"><span class="btn btn-xs btn-teal tooltips"><i
                                class="fa fa-eye"></i></span></a>

                        <?php if($item->status==1) { ?><a title="Hapus Barang" onclick="deleteConfirm('<?php echo base_url('KelolaBarang/hapus/'.$item->id_barang) ?>')" href="#"><span class="btn btn-xs btn-teal tooltips"><i class="fa fa-trash"></i></span></a>

                        <?php }else{ ?> <a title="Aktifkan" onclick="aktifConfirm('<?php echo base_url('KelolaBarang/aktif/'.$item->id_barang) ?>')" href="#"><span class="btn btn-xs btn-teal tooltips"><i class="fa fa-check"></i></span></a> <?php } ?>

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