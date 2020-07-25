<?php ob_start(); ?>
    kelola Penyimpanan
<?php
    $tittle = ob_get_clean();
    ob_flush();
?>

<?php ob_start(); ?>
<div class="card shadow mb-4">
    <div class="card-header">
      <div class="card-title">
        <h5 class="m-0 font-weight-bold text-primary">Kelola Penyimpanan</h5>
      </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-8">
            <a href="<?php echo base_url('KelolaStorage/p_addStorage')?>" class="btn btn-primary">Tambah Penyimpanan</a>
            </div>
        </div>
        <br>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px">
                    <thead>
                    <tr> 
                        <th>No</th>
                        <th>Nama Letak Penyimpanan</th>
                        <th>Posisi</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th width="300px">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no=1;
                        foreach($storage as $item) { ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $item->Area; ?></td>
                        <td><?php echo $item->Lemari; ?></td>
                        <td><?php echo $item->keterangan; ?></td>
                        <td><?php if($item->status==1){echo "<span class='badge badge-info'>Aktif</span>";}else{echo "<span class='badge badge-danger'>Non Aktif</span>";} ?></td>
                        <td>
                        <a title="Ubah Penyimpanan" href="<?php echo site_url('KelolaStorage/p_editStorage/'.$item->id_str); ?>"><span class="btn btn-xs btn-teal tooltips"><i
                                class="fa fa-eye"></i></span></a>

                        <?php if($item->status==1) { ?><a title="Hapus Penyimpanan" onclick="deleteConfirm('<?php echo base_url('KelolaStorage/hapus/'.$item->id_str) ?>')" href="#"><span class="btn btn-xs btn-teal tooltips"><i class="fa fa-trash"></i></span></a>

                        <?php }else{ ?> <a title="Aktifkan" onclick="aktifConfirm('<?php echo base_url('KelolaStorage/aktif/'.$item->id_str) ?>')" href="#"><span class="btn btn-xs btn-teal tooltips"><i class="fa fa-check"></i></span></a> <?php } ?>

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
