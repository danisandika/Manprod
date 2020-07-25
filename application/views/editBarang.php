<?php ob_start(); ?>
    Edit Barang
<?php
    $tittle = ob_get_clean();
    ob_flush();
?>

<?php ob_start(); ?>
<div class="card shadow">
    <div class="card-header">
      <div class="card-title">
        <h5 class="m-0 font-weight-bold text-primary">Edit Barang</h5>
      </div>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form class="" role="form" action="<?php echo site_url('KelolaBarang/update') ?>" method="post">
            <input type="hidden" value="<?php echo $barang->id_barang; ?>" name="id_barang">
                <div class="form-group row">
                    <div class="col-sm-11 col-md-11">
                        Nama Barang
                        <input id="txtNamabarang" type="text" class="form-control" name="nama_barang" value="<?php echo $barang->nama_barang; ?>"/>
                    </div>
                    <div class="col-sm-1">
                        &nbsp;&nbsp;<label style="color: red">*</label>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-5 col-md-5">
                        Jenis Barang
                        <input id="txtJenisBarang" type="text" class="form-control col-lg-12" name="jenis_barang" value="<?php echo $barang->jenis_barang; ?>" required/>
                    </div>
                    <div class="col-sm-5 col-md-5">
                        Jumlah Barang
                        <input id="txtJumlahBarang" type="number" class="form-control col-lg-12" name="qty" value="<?php echo $barang->qty; ?>" required/>
                    </div>
                    <div class="col-sm-1">
                        &nbsp;&nbsp;<label style="color: red">*</label>
                    </div>
                </div>
				
				<div class="form-group row">
                    <div class="col-sm-11 col-md-11">
                        Keterangan
                        <input id="txtKeterangan" type="text" class="form-control" name="keterangan" value="<?php echo $barang->keterangan; ?>" required/>
                    </div>
                    <div class="col-sm-1">
                        &nbsp;&nbsp;<label style="color: red">*</label>
                    </div>
                </div>
				
				<div class="form-group row">
                    <div class="col-sm-11 col-md-11">
                        Tanggal Daftar
                        <input id="txtTanggal" type="date" class="form-control" name="tgl_daftar" value="<?php echo $barang->tgl_daftar; ?>" required/>
                    </div>
                    <div class="col-sm-1">
                        &nbsp;&nbsp;<label style="color: red">*</label>
                    </div>
                </div>


                    <div class="col-sm-5 col-md-5">

                        Status Penyimpanan
                        <select class="form-control col-lg-12" name="status" required>
                        <?php if($storage->status == 1) {?>
                            <option value="1">Aktif</option>
                            <option value="0">Tidak Aktif</option>
                        <?php }else{ ?>
                            <option value="0">Tidak Aktif</option>
                            <option value="1">Aktif</option>    
                        <?php }?>
                        </select>

                    </div>
                    <div class="col-sm-1">
                        &nbsp;&nbsp;<label style="color: red">*</label>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary btn-user btn-block">Simpan</button>
                <hr />
                <button type="reset" onClick = "history.go(-1)" class="btn btn-danger btn-user btn-block">Batal</button>
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
        $(function () {
        $("#txtHp").keypress(function (e) {
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