<?php ob_start(); ?>
    Transaksi Penyimpanan Barang
<?php
    $tittle = ob_get_clean();
    ob_flush();
?>

<?php ob_start(); ?>
<div class="card shadow">
  <div class="card-header">
      <div class="card-title">
        <h5 class="m-0 font-weight-bold text-primary">Tambah Transaksi</h5>
      </div>
    </div>
  <div class="card-content">
    <div class="card-body">
      <form action="<?php echo base_url('TransaksiPenyimpananToStorage/saveDataToStorage')?>" method="post">
        <span class="badge badge-info">Detail Barang</span>
        <div class="form-group row">
          <input id="txtId" type="hidden" name="txtIdBarang" value="<?php echo $barang->id_barang?>" />
          <input id="txtId" type="hidden" name="txtIdTransaksi" value="<?php echo $transaksi->id_trx?>" />
          <div class="col-sm-5 col-md-5">
          Nama Barang<label style="color: red">*</label>
          <input type="text" class="form-control" id="txtNama" name="txtNamaBarang" value="<?php echo $barang->nama_barang?>" required readonly>
        </div>
        <div class="col-sm-1">
        </div>
        <div class="col-sm-5 col-md-5">
          Jumlah Total<label style="color: red">*</label>
          <input type="number" class="form-control" id="txtWaktu" name="txtTotalBarang" value="<?php echo $barang->qty?>" required readonly>
        </div>
        <div class="col-sm-1">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-5 col-md-5">
        Jenis Barang&nbsp;<label style="color: red">*</label>
        <input type="text" class="form-control" id="txtNama" name="txtJenisBarang" value="<?php echo $barang->jenis_barang?>" required readonly>
      </div>
      <div class="col-sm-1">
      </div>
      <div class="col-sm-5 col-md-5">
        Kemasan&nbsp;<label style="color: red">*</label>
        <input type="text" class="form-control" id="txtWaktu" name="txtKemasanBarang" value="<?php echo $barang->kemasan?>" required readonly>
      </div>
      <div class="col-sm-1">
      </div>
    </div>
    <br/>
    <hr/>
    <span class="badge badge-warning">Barang Belum Masuk Penyimpanan</span>

    <div class="form-group row">
      <div class="col-sm-12 col-md-11">
        Jumlah Barang yang belum Masuk&nbsp;<label style="color: red">*</label>
        <input type="number" class="form-control" id="txtQty" name="qty" value="<?php echo $transaksi->qty_rusak; ?>" readonly required>
      </div>
      <div class="col-sm-1">
      </div>
    </div>

    <div class="form-group row">
      <div class="col-sm-5 col-md-5">
      Jumlah Barang Masuk ke Storage&nbsp;<label style="color: red">*</label>
      <input type="number" class="form-control" id="txtQtyMasuk" name="qty_masuk" required value="<?php echo $transaksi->qty_rusak; ?>" readonly>
    </div>
    <div class="col-sm-1">
    </div>
    <div class="col-sm-5 col-md-5">
      Status Storage&nbsp;<label style="color: red">*</label>
      <select class="form-control" name="status_storage" required>
        <option disabled selected> --- Pilih Status Penyimpanan </option>
        <option value="1">Terisi</option>
        <option value="2">Full</option>
      </select>
    </div>
    <div class="col-sm-1">
    </div>
  </div>
      <div class="form-group row">
        <div class="col-sm-12 col-md-11">
          Lokasi Penyimpanan Kosong / Barang Sama&nbsp;<label style="color: red">*</label>
          <select class="form-control" name="id_storage" required>
            <option selected disabled>--- Pilih Tempat Penyimpanan ---</option>
            <?php  foreach($storagenotfull as $item) {?>
              <?php if($item->status == 0) {?>
                <option value="<?php echo $item->id_storage ?>"><?php echo "Area : ".$item->area." | Rak : ".$item->racking." | Tingkat : ".$item->tingkat." | Nomor : ".$item->no_racking." | Kosong"?></option>
              <?php }else{ ?>
                <option value="<?php echo $item->id_storage ?>"><?php echo "Area : ".$item->area." | Rak : ".$item->racking." | Tingkat : ".$item->tingkat." | Nomor : ".$item->no_racking." | Isi : ".$item->jumlah?></option>
              <?php } ?>
            <?php } ?>
          </select>
        </div>
        <div class="col-sm-1">

        </div>
      </div>

    <div class="form-group row">
      <div class="col-sm-11 col-md-11">
      Deskripsi
      <textarea class="form-control" cols="3" rows="3" name="deskripsi"></textarea>
    </div>
    <div class="col-sm-1">
    </div>
  </div>
      <br>
      <button type="submit" class="btn btn-primary btn-user btn-block">Simpan</button>
      <hr />
      <button type="reset" onClick="window.history.go(-1); return false;" class="btn btn-danger btn-user btn-block">Batal</button>
    </form>
  </div>
</div>
</div>
<!-- /.container-fluid -->
<br>  <br>
<div class="card shadow mb-4">
<div class="card">
<div class="card-body">
<div class="table-responsive">
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
          <th>No</th>
          <th>Area</th>
          <th>Rak</th>
          <th>Tingkat</th>
          <th>Nomor Rak</th>
          <th>Jumlah</th>
          <th>Tanggal Masuk</th>
          <th>Status</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1;
      foreach($storageByBarang as $item) {?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $item->area ?></td>
        <td><?php echo $item->racking ?></td>
        <td><?php echo $item->tingkat ?></td>
        <td><?php echo $item->no_racking ?></td>
        <td><?php echo $item->jumlah ?></td>
        <td><?php echo date_format(new datetime($item->tgl_masuk),"d F Y"); ?></td>
        <td>
          <?php if($item->status==1){ ?><span class="badge badge-warning">Terisi</span> <?php }else if($item->status==2){ ?>
              <span class="badge badge-danger">Full</span><?php } ?>
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

<script type="text/javascript">
$(document).ready(function(){
  $('#txtQtyMasuk').on('keyup', function(){
    var qty = parseInt($('#txtQty').val());
    var qty_masuk = parseInt($('#txtQtyMasuk').val());

      if(qty_masuk > qty){
        Swal.fire(
         'Error',
         'Data barang masuk harus lebih kecil dari Data Transaksi Barang',
         'error'
       )
       document.getElementById("txtQtyMasuk").value = "0";
      }

  });
});
</script>
