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
            <form class="" role="form" action="<?php echo site_url('TransaksiPenyimpanan/tambah') ?>" method="post">
                
                <div class="form-group row">
                    <div class="col-sm-11 col-md-5">
                        Nama Barang
                        <select name="id_barang" class="form-control col-lg-12" id="id_barang" required>
                                    <option value="" disabled selected> Pilih Barang </option>
                                        <?php
                                        $connect = mysqli_connect("localhost", "root", "","manprod_gudang");
                                        mysqli_select_db($connect,"manprod_gudang");
                                        $sql = mysqli_query($connect,"SELECT * FROM barang WHERE status = '1' ORDER BY id_barang ASC");
                                        if(mysqli_num_rows($sql) > 0){
                                        while($row = mysqli_fetch_array($sql)) { ?>
                                    <option value="<?php echo $row ['id_barang'] ?>"><?php echo $row ['nama_barang'] ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                   
                        </select>
                        
                    </div>
                    <div class="col-sm-1">
                        &nbsp;&nbsp;<label style="color: red">*</label>
                    </div>
                    <div class="col-sm-5">
                        Tempat penyimpanan
                        <select name="id_str" class="form-control col-lg-12" id="storage" required>
                                    <option value="" disabled selected> Pilih Storage </option>
                                        <?php
                                        $connect = mysqli_connect("localhost", "root", "","manprod_gudang");
                                        mysqli_select_db($connect,"manprod_gudang");
                                        $sql = mysqli_query($connect,"SELECT * FROM storage WHERE status = '1' ORDER BY id_str ASC");
                                        if(mysqli_num_rows($sql) > 0){
                                        while($row = mysqli_fetch_array($sql)) { ?>
                                    <option value="<?php echo $row ['id_str'] ?>"><?php echo $row ['nama_str'] ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                   
                        </select>
                        
                    </div>
                    <div class="col-sm-1">
                        &nbsp;&nbsp;<label style="color: red">*</label>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-11 col-md-11">
                        Kuantitas
                        <input id="txtKuantitas" class="form-control" name="qty" type="number" required />
                    </div>
                    <div class="col-sm-1">
                        &nbsp;&nbsp;<label style="color: red">*</label>
                    </div>
                </div>

				<div class="form-group row">
                    <div class="col-sm-11 col-md-11">
                        Keterangan
                        <input id="txtKeterangan" type="text" class="form-control" name="keterangan"/>
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