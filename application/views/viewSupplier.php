<?php ob_start(); ?>
    kelola Supplier
<?php
    $tittle = ob_get_clean();
    ob_flush();
?>

<?php ob_start(); ?>
<div class="card shadow mb-4">
    <div class="card-header">
      <div class="card-title">
        <h5 class="m-0 font-weight-bold text-primary">Kelola Supplier</h5>
      </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-8">
            <a href="<?php echo base_url('KelolaSupplier/tambahSupplier')?>" class="btn btn-primary">Tambah Supplier</a>
            </div>
        </div>
        <br>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Perusahaan</th>
                        <th>Contact Person</th>
						<th>Alamat</th>
                        <th>No Telp</th>
						<th>Email</th>
                        <th>Status</th>
                        <th width="300px">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no=1;
                        foreach($supplier as $item) { ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $item->nama_perusahaan; ?></td> 
                        <td><?php echo $item->nama_contact_person; ?></td>
						<td><?php echo $item->alamat; ?></td>
                        <td><?php echo $item->no_telp; ?></td>
						<td><?php echo $item->email; ?></td>
                        <td><?php if($item->status==1){echo "<span class='badge badge-info'>Aktif</span>";}else{echo "<span class='badge badge-danger'>Non Aktif</span>";} ?></td>
                        <td>
                        <a title="Ubah Supplier" href="<?php echo site_url('KelolaSupplier/editSupplier/'.$item->id_supplier); ?>"><span class="btn btn-xs btn-teal tooltips"><i
                                class="fa fa-eye"></i></span></a>

                        <?php if($item->status==1) { ?><a title="Hapus Supplier" onclick="deleteConfirm('<?php echo base_url('KelolaSupplier/hapus/'.$item->id_supplier) ?>')" href="#"><span class="btn btn-xs btn-teal tooltips"><i class="fa fa-trash"></i></span></a>

                        <?php }else{ ?> <a title="Aktifkan" onclick="aktifConfirm('<?php echo base_url('KelolaSupplier/aktif/'.$item->id_supplier) ?>')" href="#"><span class="btn btn-xs btn-teal tooltips"><i class="fa fa-check"></i></span></a> <?php } ?>

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