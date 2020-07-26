<?php ob_start(); ?>
    Transaksi Pengambilan Barang
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
      <form action="<?php echo base_url('KelolaTransaksiPengambilan/saveTransaksi')?>" method="post">
        <span class="badge badge-info">Detail Barang di Storage</span>
        <div class="form-group row">
          <input id="txtId" type="hidden" name="id_barang" value="<?php echo $storage->id_barang?>" />
          <input id="txtId" type="hidden" name="id_storage" value="<?php echo $storage->id_storage?>" />
          <input id="txtId" type="hidden" name="qty_barang" value="<?php echo $barang->qty?>" />
          <div class="col-sm-5 col-md-5">
          Nama Barang<label style="color: red">*</label>
          <input type="text" class="form-control" id="txtNama" name="txtNamaBarang" value="<?php echo $storage->nama_barang?>" required readonly>
        </div>
        <div class="col-sm-1">
        </div>
        <div class="col-sm-5 col-md-5">
          Jumlah di Storage<label style="color: red">*</label>
          <input type="number" class="form-control" id="txtQty" name="txtJumlah" value="<?php echo $storage->jumlah?>" required readonly>
        </div>
        <div class="col-sm-1">
        </div>
      </div>
      <div class="form-group row">
      <div class="col-sm-5 col-md-5">
        Kemasan&nbsp;<label style="color: red">*</label>
        <input type="text" class="form-control" id="txtWaktu" name="txtKemasanBarang" value="<?php echo $barang->kemasan?>" required readonly>
      </div>
      <div class="col-sm-1">
      </div>
      <div class="col-sm-5 col-md-5">
      Tanggal Keluar&nbsp;<label style="color: red">*</label>
      <input type="text" class="form-control" id="txtNama" name="txtTanggalMasuk" value="<?php echo date_format(new datetime($storage->tgl_masuk),"d F Y")?>" required readonly>
    </div>
    <div class="col-sm-1">
    </div>
    </div>
    <hr/>
    <span class="badge badge-warning">Proses Transaksi</span>
      <div class="form-group row">
        <div class="col-sm-5 col-md-5">
        Jumlah Ambil&nbsp;<label style="color: red">*</label>
        <input type="number" class="form-control" id="txtQtyAmbil" name="txtJumlahAmbil" required>
      </div>
      <div class="col-sm-1">
      </div>
      <div class="col-sm-5 col-md-5">
        Tanggal Keluar&nbsp;<label style="color: red">*</label>
        <input type="date" class="form-control" id="dateMasuk" name="dtKeluar" required min="<?php echo date('Y-m-d'); ?>"/>
      </div>
      <div class="col-sm-1">
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-11 col-md-11">
      Customer Ambil
      <select class="form-control" name="kry_ambil">
        <option disabled selected>---  Pilih Customer Ambil  ---</option>
        <?php foreach($karyawan as $item) { ?>
            <option value="<?php echo $item->id_kry; ?>"><?php echo $item->nama_kry; ?> | <?php echo $item->role; ?></option>
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
<?php
    $mainContent = ob_get_clean();
    include ('Masterpage.php');
    ob_flush();
?>

<script type="text/javascript">
$(document).ready(function(){
  $('#txtQtyAmbil').on('keyup', function(){
    var qty = parseInt($('#txtQty').val());
    var qty_ambil = parseInt($('#txtQtyAmbil').val());

      if(qty_ambil > qty){
        Swal.fire(
         'Error',
         'Data barang Keluar harus lebih kecil dari Storage',
         'error'
       )
       document.getElementById("txtQtyAmbil").value = "0";
      }

  });
});
</script>
