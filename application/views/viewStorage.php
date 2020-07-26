<?php ob_start(); ?>
    Storage
<?php
    $tittle = ob_get_clean();
    ob_flush();
?>

<?php ob_start(); ?>
<div class="card shadow mb-4">
  <div class="card-header">
      <div class="card-title">
        <h5 class="m-0 font-weight-bold text-primary">Tambah Storage</h5>
      </div>
    </div>
<div class="card-content">
<div class="card-body">
  <div class="row">
      <div class="col-sm-8">
      <a href="<?php echo base_url('KelolaStorage/tambahStorage')?>" class="btn btn-primary">Tambah Storage</a>
      </div>
  </div>
  <br/>
<div class="table-responsive">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
          <th>No</th>
          <th>Area</th>
          <th>Rak</th>
          <th>Tingkat</th>
          <th>Nomor Rak</th>
          <th>Status</th>
          <th style="width:100px;">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1;
      foreach($storage as $item) {?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $item->area ?></td>
        <td><?php echo $item->racking ?></td>
        <td><?php echo $item->tingkat ?></td>
        <td><?php echo $item->no_racking ?></td>
        <td>
          <?php if($item->status==1){ ?><span class="badge badge-warning">Terisi</span> <?php }else if($item->status==2){ ?>
              <span class="badge badge-danger">Full</span><?php }else{ ?><span class="badge badge-success">Kosong</span> <?php } ?>
        </td>
        <td><a title="Edit Storage"  href="<?php echo site_url('KelolaStorage/editStorage/'.$item->id_storage); ?>"><span class="btn btn-xs btn-teal tooltips"><i
                class="fa fa-edit"></i></span></a>
       </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
</div>
</div>
</div>
</div>
<?php
    $mainContent = ob_get_clean();
    include ('Masterpage.php');
    ob_flush();
?>
