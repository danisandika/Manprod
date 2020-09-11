<?php ob_start(); ?>
    Tambah Barang
<?php
    $tittle = ob_get_clean();
    ob_flush();
?>

<?php ob_start(); ?>
<div class="card shadow">
    <div class="card-header">
      <div class="card-title">
        <h5 class="m-0 font-weight-bold text-primary">Tambah Barang</h5>
      </div>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form class="" role="form" action="<?php echo site_url('KelolaBarang/tambah') ?>" method="post">
                <div class="form-group row">
                    <div class="col-sm-11 col-md-11">
                        Nama Barang&nbsp;<label style="color: red">*</label>
                        <input id="txtNamaBarang" type="text" class="form-control" name="nama_barang" required />
                    </div>
                    <div class="col-sm-1">
                        &nbsp;
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-5 col-md-5">
                        Jenis Barang&nbsp;<label style="color: red">*</label>
                        <input id="txtJenisBarang" type="text" class="form-control col-lg-12" name="jenis_barang" required />
                    </div>
                    <div class="col-sm-1">
                        &nbsp;
                    </div>
                    <div class="col-sm-5 col-md-5">
                        Batas Stok&nbsp;<label style="color: red">*</label>
                        <input id="txtJenisBarang" type="number" class="form-control col-lg-12" name="batas_stok" required/>
                    </div>
                    <div class="col-sm-1">
                        &nbsp;
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-5 col-md-5">
                        Satuan&nbsp;<label style="color: red">*</label>
                        <input id="txtSatuan" type="text" class="form-control col-lg-12" name="satuan" required/>
                    </div>
                    <div class="col-sm-1">
                        &nbsp;
                    </div>
                    <div class="col-sm-5">
                        Kemasan&nbsp;<label style="color: red">*</label>
                        <input id="txtKemasan" type="text" class="form-control col-lg-12" name="kemasan" required/>
                    </div>
                    <div class="col-sm-1">
                        &nbsp;
                    </div>
                </div>

				          <div class="form-group row">
                    <div class="col-sm-11 col-md-11">
                        Keterangan
                        <textarea id="txtKeterangan" rows="3" cols="12" class="form-control" name="keterangan"></textarea>
                    </div>
                    <div class="col-sm-1">
                        &nbsp;
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
