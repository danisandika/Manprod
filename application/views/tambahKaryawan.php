<?php ob_start(); ?>
    Tambah Karyawan
<?php
    $tittle = ob_get_clean();
    ob_flush();
?>

<?php ob_start(); ?>
<div class="card shadow">
    <div class="card-header">
      <div class="card-title">
        <h5 class="m-0 font-weight-bold text-primary">Tambah Karyawan</h5>
      </div>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form class="" role="form" action="<?php echo site_url('KelolaKaryawan/tambah') ?>" method="post">

                <div class="form-group row">
                    <div class="col-sm-11 col-md-11">
                        Nama Karyawan&nbsp;<label style="color: red">*</label>
                        <input id="txtnamakry" type="text" class="form-control" name="nama_kry"/>
                    </div>
                    <div class="col-sm-1">
                        &nbsp;
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-5 col-md-5">
                        Username&nbsp;<label style="color: red">*</label>
                        <input id="txtUsername" type="text" class="form-control col-lg-12" name="username" required/>
                    </div>
                    <div class="col-sm-1">
                        &nbsp;
                    </div>
                    <div class="col-sm-5 col-md-5">
                        Email&nbsp;<label style="color: red">*</label>
                        <input id="txtEmail" type="Email" class="form-control col-lg-12" name="email_kry" required/>
                    </div>
                    <div class="col-sm-1">
                        &nbsp;
                    </div>

                </div>


                <div class="form-group row">

                    <div class="col-sm-5 col-md-5">
                        Jenis Kelamin&nbsp;<label style="color: red">*</label>
                        <select class="form-control col-lg-12" name="sex" required>
                        <option value="" disabled selected>--Pilih Jenis Kelamin--</option>
                        <option value="laki laki">Laki - Laki </option>
                        <option value="perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-sm-1">
                        &nbsp;
                    </div>
                    <div class="col-sm-5 col-md-5">
                        Role&nbsp;<label style="color: red">*</label>
                        <select name="id_role" class="form-control col-lg-12" id="id_role" required>
                                    <option value="" disabled selected> Pilih Role </option>
                                        <?php foreach($karyawan->result() as $row):?>
                                        <option value="<?php echo $row->id_role;?>"><?php echo $row->nama_role;?></option>
                                        <?php endforeach;?>

                        </select>
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
