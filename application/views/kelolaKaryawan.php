<?php ob_start(); ?>
    kelola Karyawan
<?php
    $tittle = ob_get_clean();
    ob_flush();
?>

<?php ob_start(); ?>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header">
      <div class="card-title">
        <h5 class="m-0 font-weight-bold text-primary">Kelola Karyawan</h5>
      </div>
    </div>
            <div class="card-body">
              <div class="row">
                <div class="col-sm-8">
                <a href="<?php echo base_url('KelolaKaryawan/tKaryawan')?>" class="btn btn-primary">Tambah Karyawan</a>
              </div>
              </div>
              <br>
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Karyawan</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Jenis Kelamin</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th width="300px">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                     $no=1;
                     foreach($karyawan as $item) { ?>
                    <tr>
                      <td><?php echo $no; ?></td>
                      <td><?php echo $item->nama_kry; ?></td> 
                      <td><?php echo $item->username; ?></td>
                      <td><?php echo $item->pass; ?></td>
                      <td><?php echo $item->email_kry; ?></td>
                      <td><?php echo $item->sex; ?></td>
                      <td><?php echo $item->nama_role; ?></td>
                      <td><?php if($item->status==1){echo "<span class='badge badge-info'>Aktif</span>";}else{echo "<span class='badge badge-danger'>Non Aktif</span>";} ?></td>
                      <td>
                        <a title="Ubah Karyawan" href="<?php echo site_url('KelolaKaryawan/eKaryawan/'.$item->id_kry); ?>"><span class="btn btn-xs btn-teal tooltips"><i
                              class="fa fa-eye"></i></span></a>

                      <?php if($item->status==1) { ?><a title="Hapus Pengguna" onclick="deleteConfirm('<?php echo base_url('KelolaKaryawan/hapus/'.$item->id_kry) ?>')" href="#"><span class="btn btn-xs btn-teal tooltips"><i class="fa fa-trash"></i></span></a>

                      <?php }else{ ?> <a title="Aktifkan" onclick="aktifConfirm('<?php echo base_url('KelolaKaryawan/aktif/'.$item->id_kry) ?>')" href="#"><span class="btn btn-xs btn-teal tooltips"><i class="fa fa-check"></i></span></a> <?php } ?>

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
