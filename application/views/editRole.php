<?php ob_start(); ?>
    Edit Role
<?php
    $tittle = ob_get_clean();
    ob_flush();
?>

<?php ob_start(); ?>
<div class="card shadow">
    <div class="card-header">
      <div class="card-title">
        <h5 class="m-0 font-weight-bold text-primary">Edit Role</h5>
      </div>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form class="" role="form" action="<?php echo site_url('KelolaRole/update') ?>" method="post">
            <input type="hidden" value="<?php echo $role->id_role; ?>" name="id_role">
                <div class="form-group row">
                    <div class="col-sm-11 col-md-11">
                        Role&nbsp;<label style="color: red">*</label>
                        <input id="txtRole" type="text" class="form-control" name="nama_role" value="<?php echo $role->nama_role; ?>" <?php if($role->nama_role == 'Admin'){echo "readonly";} ?>/>
                    </div>
                    <div class="col-sm-1">
                        &nbsp;
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-5 col-md-11">
                        Deskripsi&nbsp;<label style="color: red">*</label>
                        <textarea name="deskripsi" rows="3" cols="8" class="form-control"><?php echo $role->deskripsi; ?></textarea>
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
