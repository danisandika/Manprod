<?php ob_start(); ?>
  Ubah Password
<?php
    $tittle = ob_get_clean();
    ob_flush();
?>

<?php ob_start(); ?>

<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Ubah Password</h6>
  </div>
  <div class="card-body">
    <form class="" action="<?php echo base_url('KelolaKaryawan/updatePassword') ?>" method="post">
      <div class="navbar-nav">
          <div class="col-lg-12">
              <label class="col-form-label">Email Pengguna</label>
              <input id="txtEmail" class="form-control col-lg-10" name="txtemail" value="<?php echo $karyawan->email_kry; ?>" readonly></input>
              <input id="txtEmail" class="form-control col-lg-10" name="id" value="<?php echo $karyawan->id_kry; ?>" type="hidden"></input>
          </div>
          <div class="col-lg-12">
            <label class="col-form-label">Password Lama</label>&nbsp;<label class="registrationFormAlert" id="divPasswordValidationResult" style="color:red;"></label>
            <input id="txtPassword" class="form-control col-lg-10" name="txtPassword" onChange="checkPassword();" type="password"></input>
            <input id="txtPasswordLama" type="hidden" class="form-control col-lg-10" value="<?php echo $karyawan->pass; ?>"></input>
          </div>
          <div class="col-lg-12">
            <label class="col-form-label">Password Baru&nbsp;<label id="strengthMessage" style="color:red;"></label></label>
            <input id="txtPasswordBaru" class="form-control col-lg-10" name="txtPasswordBaru" type="password" disabled></input>
          </div>
          <div class="col-lg-12">
            <label class="col-form-label">Retype Password Baru</label>&nbsp;<label class="registrationFormAlert" id="divvalresult" style="color:red;"></label>
            <input id="txtrePassword" class="form-control col-lg-10" name="txtrePassword" onChange="checkPassword2();" type="password" disabled></input>
          </div>
          <br/>
          <div class="col-md-12">
            <button class="btn btn-primary" type="submit" id="btnsimpan" disabled>Simpan</button>
            <button class="btn btn-danger" type="reset" onclick="history.go(-1);">Batal</button>
          </div>
      </div>
    </form>
  </div>
</div>
<!-- /.container-fluid -->
<?php
    $mainContent = ob_get_clean();
    include ('Masterpage.php');
    ob_flush();
?>

<script type="text/javascript">
function checkPassword() {
    var password = $("#txtPassword").val();
    var old_pass = $("#txtPasswordLama").val();

    if (old_pass != password ){
      $('#txtPasswordBaru').prop('disabled', true);
      $('#txtrePassword').prop('disabled', true);
      $("#divPasswordValidationResult").html("Password salah");
    }
      else{
      $("#divPasswordValidationResult").html("");
      $('#txtPasswordBaru').prop('disabled', false);
      $('#txtrePassword').prop('disabled', false);
    }
}

function checkPassword2() {
    var newpassword = $("#txtPasswordBaru").val();
    var repassword = $("#txtrePassword").val();

    if (newpassword != repassword ){
      $("#divvalresult").html("Password tidak sama");
      $('#btnsimpan').prop('disabled', true);
    }
      else{
      $("#divvalresult").html("");
      $('#btnsimpan').prop('disabled', false);
    }
}

$(document).ready(function () {
   $("#txtPassword").keyup(checkPassword);
   $("#txtrePassword").keyup(checkPassword2);
});

$(document).ready(function () {
    $('#txtPasswordBaru').keyup(function () {
        $('#strengthMessage').html(checkStrength($('#txtPasswordBaru').val()))
    })
    function checkStrength(password) {
        var strength = 0
        if (password.length < 6) {
            $('#strengthMessage').removeClass()
            $('#strengthMessage').addClass('Short')
            $('#txtrePassword').prop('disabled',true)
            return 'Terlalu Pendek'
        }
        if (password.length > 7) strength += 1
        // If password contains both lower and uppercase characters, increase strength value.
        if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
        // If it has numbers and characters, increase strength value.
        if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
        // If it has one special character, increase strength value.
        if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
        // If it has two special characters, increase strength value.
        if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
        // Calculated strength value, we can return messages
        // If value is less than 2
        if (strength < 2) {
            $('#strengthMessage').removeClass()
            $('#strengthMessage').addClass('Weak')
            $('#txtrePassword').prop('disabled',true)
            return 'Lemah'
        } else if (strength == 2) {
            $('#strengthMessage').removeClass()
            $('#strengthMessage').addClass('Good')
            $('#txtrePassword').prop('disabled',false)
            return 'Bagus'
        } else {
            $('#strengthMessage').removeClass()
            $('#strengthMessage').addClass('Strong')
            $('#txtrePassword').prop('disabled',false)
            return 'Kuat'
        }
    }
});


</script>
