<?php ob_start(); ?>
    kelola Role
<?php
    $tittle = ob_get_clean();
    ob_flush();
?>

<?php ob_start(); ?>
<div class="card shadow mb-4">
    <div class="card-header">
      <div class="card-title">
        <h5 class="m-0 font-weight-bold text-primary">Kelola Role</h5>
      </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-8">
            <a href="<?php echo base_url('KelolaRole/tambahRole')?>" class="btn btn-primary">Tambah Role</a>
            </div>
        </div>
        <br>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Role</th>
                        <th>Deskripsi</th>
                        <th width="300px">Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $no=1;
                        foreach($role as $item) { ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $item->nama_role; ?></td>
                        <td><?php echo $item->deskripsi; ?></td>

                        <td>
                        <a title="Ubah Role" href="<?php echo site_url('KelolaRole/editRole/'.$item->id_role); ?>"><span class="btn btn-xs btn-teal tooltips"><i
                                class="fa fa-eye"></i></span></a>

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
