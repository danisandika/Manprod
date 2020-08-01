<?php ob_start(); ?>
   History Penyimpanan
<?php
    $tittle = ob_get_clean();
    ob_flush();
?>

<?php ob_start(); ?>
<div class="card shadow mb-4">
    <div class="card-header">
      <div class="card-title">
        <h5 class="m-0 font-weight-bold text-primary"><a href="<?php echo site_url('HistoryBarangKeluar/index') ?>">History Barang Tersimpan</a></h5>
      </div>
    </div>
    <div class="card-body">
    <input type="checkbox" id="cbxperiode" name="cbxperiode" onclick="period();" > Lihat berdasarkan periode</input>
    
    <form action="<?php echo site_url('HistoryBarangMasuk/viewPeriode') ?>" method="post">
        <div class="form-group row" id="periode" style="display:none">
            <div class="col-sm-8 col-md-3">
                <input type="date" class="form-control" id="fromdate" name="fromdate" required/> &nbsp; 
            </div>
            <div class="col-sm-8 col-md-3">
                <input type="date" class="form-control" id="untildate" name="untildate" required/>
            </div>
            <div class="col-sm-3 col-md-1">
                <button type="submit" class="btn btn-primary btn-user btn-block">Cari</button>
            </div>
        </div>
    </form>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size: 13px">
                <thead>
                <tr>
                    <th>No</th>
                    <th>ID Penyimpanan</th>
                    <th>Nama Barang</th>
                    <th>Supplier</th>
                    <th>Jumlah Disimpan</th>
                    <th>Tanggal Disimpan</th>
                    <th>Status</th>
                    <th width="100px">Detil</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $no=1;
                    foreach($history_simpan as $item) { ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?php echo $item->id_trx; ?></td>
                    <td><?php echo $item->nama_barang; ?></td>
                    <td><?php echo $item->nama_perusahaan; ?></td>
                    <td><?php echo $item->qty_masuk; ?></td>
                    <td><?php echo date_format(new datetime($item->tgl_diterima),"d F Y"); ?> by : <?php echo $item->nama_karyawan; ?></td>
                    <td><?php if($item->status==1){echo "<span class='badge badge-info'>Tersimpan</span>";}else{echo "<span class='badge badge-danger'>Non Aktif</span>";} ?></td>
                    <td>
                    <a title="Tambah ke Penyimpanan"  href="<?php echo site_url('KelolaTransaksiPenyimpanan/tambahTransaksi/'.$item->id_barang); ?>"><span class="btn btn-xs btn-teal tooltips"><i
                            class="fa fa-edit"></i></span></a>
                    </td>
                </tr>
                <?php
                $no++;
                } ?>
                </tbody>
            </table>
        </div>
        </div>

        <script>
    function period(){
        $(document).ready(function () {
            $('#cbxperiode').change(function () {
                if (!this.checked) 
                //  ^
                    $('#periode').hide();
                else 
                    $('#periode').show();
            });
        });
    }
        
    </script>
<?php
    $mainContent = ob_get_clean();
    include ('Masterpage.php');
    ob_flush();
?>