<?php ob_start(); ?>
    Tambah Role
<?php
    $tittle = ob_get_clean();
    ob_flush();
?>

<?php ob_start(); ?>
<div class="card shadow">
    <div class="card-header">
      <div class="card-title">
        <h5 class="m-0 font-weight-bold text-primary">Tambah Role</h5>
      </div>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form class="" role="form" action="<?php echo site_url('KelolaRole/tambah') ?>" method="post">
                
                <div class="form-group row">
                    <div class="col-sm-11 col-md-5">
                        Role
                        <input id="txtRole" type="text" class="form-control" name="nama_role"/>
                    </div>
                    <div class="col-sm-1">
                        &nbsp;&nbsp;<label style="color: red">*</label>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-5 col-md-11">
                        Deskripsi
                        <input id="txtDeskripsi" type="text" class="form-control col-lg-12" name="deskripsi" required/>
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