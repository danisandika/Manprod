<?php ob_start(); ?>
    kelola Barang
<?php
    $tittle = ob_get_clean();
    ob_flush();
?>

<?php ob_start(); ?>
<div class="card shadow mb-4">
    <div class="card-header">
      <div class="card-title">
        <h5 class="m-0 font-weight-bold text-primary">Kelola Barang</h5>
      </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-8">
            <a href="<?php echo base_url('KelolaBarang/tambahBarang')?>" class="btn btn-primary">Tambah Barang</a>
            </div>
        </div>
        <br>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Jenis Barang</th>
						            <th>Jumlah Barang</th>
                        <th>Keterangan</th>
                        <th style="display:none;">Barcode</th>
						            <th>Last Check</th>
                        <th>Status Stok</th>
                        <th>Status</th>
                        <th>Barcode</th>
                        <th width="150px">Aksi</th>
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
						            <td><?php echo $item->qty; ?> / <?php echo $item->batas_stok; ?> </td>
                        <td><?php echo $item->keterangan; ?></td>
                        <td style="display:none;"><?php echo $item->barcode_string; ?></td>
						            <td><?php echo date_format(new datetime($item->tgl_daftar),"d F Y"); ?></td>
                        <td><?php if($item->qty  == 0) {echo "<span class='badge badge-danger'>Kosong</span>";}elseif($item->qty < $item->batas_stok){echo "<span class='badge badge-warning'>Isi Ulang</span>";}else{echo "<span class='badge badge-primary'>Aman</span>";} ?></td>
                        <td><?php if($item->status==1){echo "<span class='badge badge-info'>Aktif</span>";}else{echo "<span class='badge badge-danger'>Non Aktif</span>";} ?></td>
                        <td><img style="width: 100px;" src="<?php echo base_url().'assets/image_barcode/'.$item->barcode;?>"></td>
                        <td>
                        <a title="Ubah Barang" href="<?php echo site_url('KelolaBarang/editBarang/'.$item->id_barang); ?>"><span class="btn btn-xs btn-teal tooltips"><i
                                class="fa fa-eye"></i></span></a>

                        <?php if($item->status==1) { ?><a title="Hapus Barang" onclick="deleteConfirm('<?php echo base_url('KelolaBarang/hapus/'.$item->id_barang) ?>')" href="#"><span class="btn btn-xs btn-teal tooltips"><i class="fa fa-trash"></i></span></a>

                        <?php }else{ ?> <a title="Aktifkan" onclick="aktifConfirm('<?php echo base_url('KelolaBarang/aktif/'.$item->id_barang) ?>')" href="#"><span class="btn btn-xs btn-teal tooltips"><i class="fa fa-check"></i></span></a> <?php } ?>

                        <a title="Download Barcode" href="<?php echo base_url()?>assets/image_barcode/<?php echo $item->barcode_string.'.jpg' ?>" download="<?php echo $item->barcode_string ?>" ><span class="btn btn-xs btn-teal tooltips"><i class="fa fa-download"></i></span></a>
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
