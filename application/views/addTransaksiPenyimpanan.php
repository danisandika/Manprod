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
      <form action="<?php echo base_url('KelolaTransaksiPenyimpanan/saveTransaksi')?>" method="post">
        <div class="form-group row">
          <input id="txtId" type="hidden" name="id_barang" value="<?php echo $barang->id_barang?>" />
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
    <hr/>
      <div class="form-group row">
        <div class="col-sm-12 col-md-11">
          Supplier&nbsp;<label style="color: red">*</label>
          <select class="form-control" name="id_supplier" required>
            <option selected disabled>--- Pilih Supplier ---</option>
            <?php  foreach($supplier as $item) {?>
                <option value="<?php echo $item->id_supplier ?>" ><?php echo $item->nama_perusahaan ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="col-sm-1">

        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-5 col-md-5">
        Jumlah Masuk&nbsp;<label style="color: red">*</label>
        <input type="number" class="form-control" id="txtNama" name="qty" required>
      </div>
      <div class="col-sm-1">
      </div>
      <div class="col-sm-5 col-md-5">
        Tanggal Masuk&nbsp;<label style="color: red">*</label>
        <input type="date" class="form-control" id="dateMasuk" name="tgl_diterima" required/>
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
      <button type="reset" onClick="window.location.href='<?php echo base_url('kelolaPelatihan')?>'" class="btn btn-danger btn-user btn-block">Batal</button>
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
          <th>Nama Barang</th>
          <th>Jumlah</th>
          <th>Jumlah Masuk</th>
          <th>Jumlah Menunggu</th>
          <th>Karyawan</th>
          <th>Supplier</th>
          <th>Tanggal Masuk</th>
          <th>Status</th>
          <th style="width:50px;">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php $no=1;
      foreach($daftarTransaksi as $item) {?>
      <tr>
        <td><?php echo $no; ?></td>
        <td><?php echo $item->nama_barang ?></td>
        <td><?php echo $item->qty ?></td>
        <td><?php echo $item->qty_masuk ?></td>
        <td><?php echo $item->qty_rusak ?></td>
        <td><?php echo $item->nama_karyawan ?></td>
        <td><?php echo $item->nama_supplier ?></td>
        <td><?php echo date_format(new datetime($item->tgl_diterima),"d F Y"); ?></td>
        <td>
          <?php if($item->status==0){ ?><span class="badge badge-warning">Menunggu</span> <?php }?>
        </td>
        <td><a title="Simpan ke Storage"  href="<?php echo site_url('TransaksiPenyimpananToStorage/addTransaksiPenyimpanantoStorage/'.$item->id_barang."/".$item->id_trx); ?>"><span class="btn btn-xs btn-teal tooltips"><i
                class="fa fa-edit"></i></span></a></td>
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
        $(function () {
        $("#txtWaktu").keypress(function (e) {
            var keyCode = e.keyCode || e.which;

            $("#lblError").html("");

        //Regex for Valid Characters i.e. Alphabets.
        var regex = /^[0-9 ]+$/;

        //Validate TextBox value against the Regex.
        var isValid = regex.test(String.fromCharCode(keyCode));
        if (!isValid) {
            $("#lblError").html("Only Alphabets allowed.");
        }

        return isValid;
    });
    });
</script>
