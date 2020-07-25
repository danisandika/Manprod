<?php ob_start(); ?>
    Tambah Penyimpanan
<?php
    $tittle = ob_get_clean();
    ob_flush();
?>

<?php ob_start(); ?>
<div class="card shadow">
    <div class="card-header">
      <div class="card-title">
        <h5 class="m-0 font-weight-bold text-primary">Tambah Penyimpanan</h5>
      </div>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form class="" role="form" action="<?php echo site_url('KelolaStorage/tambah') ?>" method="post">
                
                <div class="form-group row">
                    <div class="col-sm-11 col-md-11">
                        Nama Penyimpanan
                        <input id="txtnamaStr" type="text" class="form-control" name="nama_str" value="Area "/>
                    </div>
                    <div class="col-sm-1">
                        &nbsp;&nbsp;<label style="color: red">*</label>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-5 col-md-5">
                        Lemari
                        <input id="txtPosisi" type="number" class="form-control col-lg-12" name="posisi" required/>
                    </div>
                    <div class="col-sm-5 col-md-5">
                        Lantai
                        <input id="txtLantai" type="number" class="form-control col-lg-12" name="Lantai" required/>
                    </div>
                    <div class="col-sm-1">
                        &nbsp;&nbsp;<label style="color: red">*</label>
                    </div>
                    <div class="col-sm-5">
                        Keterangan
                        <input id="txtNama" type="textarea" class="form-control col-lg-12" name="keterangan" required/>
                    </div>
                    <div class="col-sm-1">
                        &nbsp;&nbsp;<label style="color: red">*</label>
                    </div>
                </div>


                    <div class="col-sm-5 col-md-5">

                        Status Penyimpanan
                        <select class="form-control col-lg-12" name="status" required>
                        <option value="" disabled selected>--Pilih Status--</option>
                        <option value="1">Aktif</option>
                        <option value="0">Tidak Aktif</option>
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