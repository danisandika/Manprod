<?php ob_start(); ?>
    Ubah Karyawan
<?php
    $tittle = ob_get_clean();
    ob_flush();
?>

<?php ob_start(); ?>
<div class="card shadow">
    <div class="card-header">
      <div class="card-title">
        <h5 class="m-0 font-weight-bold text-primary">Edit Karyawan</h5>
      </div>
    </div>
    <div class="card-content">
        <div class="card-body">
            <form class="" role="form" action="<?php echo site_url('KelolaKaryawan/update') ?>" method="post">

                <div class="form-group row">
                    <div class="col-sm-11 col-md-11">
                        <input type="hidden" value="<?php echo $karyawan->id_kry; ?>" name="id_kry">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-11 col-md-11">
                        Nama Karyawan
                        <input id="nama_kry" type="text" class="form-control" name="nama_kry"  value="<?php echo $karyawan->nama_kry; ?>"/>
                    </div>
                    <div class="col-sm-1">
                        &nbsp;&nbsp;<label style="color: red">*</label>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-5 col-md-5">
                        Username
                        <input id="username" type="text" class="form-control col-lg-12" name="username" value="<?php echo $karyawan->username; ?>" required/>
                    </div>
                    <div class="col-sm-1">
                        &nbsp;&nbsp;<label style="color: red">*</label>
                    </div>
                    <div class="col-sm-5">
                        Password
                        <input id="pass" type="Password" class="form-control col-lg-12" name="pass" value="<?php echo $karyawan->pass; ?>" required/>
                    </div>
                    <div class="col-sm-1">
                        &nbsp;&nbsp;<label style="color: red">*</label>
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-sm-5 col-md-5">
                        Email
                        <input id="email_kry" type="Email" class="form-control col-lg-12" name="email_kry" value="<?php echo $karyawan->email_kry; ?>" required/>
                    </div>
                    <div class="col-sm-1">
                        &nbsp;&nbsp;<label style="color: red">*</label>
                    </div>

                    <div class="col-sm-5 col-md-5">
                        Jenis Kelamin
                        <input id="sex" type="text" class="form-control col-lg-12" name="sex" readonly value="<?php echo $karyawan->sex; ?>" required/>
                    </div>
                    <div class="col-sm-1">
                        &nbsp;&nbsp;<label style="color: red">*</label>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-5 col-md-5">
                        Divisi
                        <select class="form-control col-lg-12" name="role" required>
                        <option value="" disabled selected>--Pelatihan--</option>
                        <option value="Penerimaan">Divisi Penerima</option>
                        <option value="Pengiriman">Divisi Pengiriman</option>
                        <option value="Penyimpanan">Divisi Penyimpanan</option>
                        <option value="Konfirmasi">Divisi Konfirmasi</option>
                        </select>
                    </div>
                    <div class="col-sm-1">
                        &nbsp;&nbsp;<label style="color: red">*</label>
                    </div>

                    <div class="col-sm-5">
                        Status Karyawan
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