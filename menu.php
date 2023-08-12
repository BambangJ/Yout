<?php include 'sidebar.php'; ?>
<!-- isinya -->
<h1 class="h3 mb-0">
    Data Menu
    <button class="btn btn-primary btn-sm border-0 float-right" type="button" data-toggle="modal"
        data-target="#Tambahmenu">Tambah menu</button>
</h1>
<hr>
<table class="table table-striped table-sm table-bordered dt-responsive nowrap" id="table" width="100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Menu</th>
            <th>Nama Menu</th>
            <th>Harga Modal</th>
            <th>Harga Jual</th>
            <th>Tgl Input</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php 
    $no = 1;
    $data_barang = mysqli_query($conn,"SELECT * FROM menu ORDER BY idmenu ASC");
    while($d = mysqli_fetch_array($data_barang)){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $d['kode_menu']; ?></td>
            <td><?php echo $d['nama_menu']; ?></td>
            <td>Rp.<?php echo ribuan($d['harga_modal']); ?></td>
            <td>Rp.<?php echo ribuan($d['harga_jual']); ?></td>
            <td><?php echo $d['tgl_input']; ?></td>
            <td>
                <button type="button" class="btn btn-primary btn-xs mr-1" data-toggle="modal"
                    data-target="#Editmenu<?php echo $d['idmenu']; ?>">
                    <i class="fas fa-pencil-alt fa-xs mr-1"></i>Edit
                </button>
                <a class="btn btn-danger btn-xs" href="?hapus=<?php echo $d['idmenu']; ?>">
                    <i class="fas fa-trash-alt fa-xs mr-1"></i>Hapus</a>
            </td>
        </tr>
        <!-- Modal Tambah Menu -->
        <div class="modal fade" id="Editmenu<?php echo $d['idmenu']; ?>" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content border-0">
                    <form method="post">
                        <div class="modal-header bg-purple">
                            <h5 class="modal-title text-white">Edit Menu</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="samll">Kode Menu :</label>
                                <input type="hidden" name="idmenu" value="<?php echo $d['idmenu']; ?>">
                                <input type="text" name="Edit_kode_menu" value="<?php echo $d['kode_menu']; ?>"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="samll">Nama Menu :</label>
                                <input type="text" name="Edit_nama_menu" value="<?php echo $d['nama_menu']; ?>"
                                    class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="samll">Harga Modal :</label>
                                <input type="number" placeholder="0" name="Edit_Harga_Modal"
                                    value="<?php echo $d['harga_modal']; ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label class="samll">Harga Jual :</label>
                                <input type="number" placeholder="0" name="Edit_Harga_Jual"
                                    value="<?php echo $d['harga_jual']; ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary" name="SimpanEdit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- end Modal M  enu -->
        <?php } ?>
    </tbody>
</table>
<?php 
if(isset($_POST['Tambahmenu']))
{
    $kodemenu = htmlspecialchars($_POST['Tambah_kode_menu']);
    $namamenu = htmlspecialchars($_POST['Tambah_nama_menu']);
    $harga_modal = htmlspecialchars($_POST['Tambah_Harga_Modal']);
    $harga_jual = htmlspecialchars($_POST['Tambah_Harga_Jual']);

    $cekkode = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM menu WHERE kode_menu='$kodemenu'"));
    if($cekkode > 0) {
        echo '<script>alert("Maaf! kode menu sudah ada");history.go(-1);</script>';
    } else {
    $Inputmenu = mysqli_query($conn,"INSERT INTO menu (kode_menu,nama_menu,harga_modal,harga_jual)
     values ('$kodemenu','$namamenu','$harga_modal','$harga_jual')");
    if ($Inputmenu){
        echo '<script>history.go(-1);</script>';
    } else {
        echo '<script>alert("Gagal Menambahkan Data");history.go(-1);</script>';
    }
}
};
if(isset($_POST['SimpanEdit'])){
    $idmenu1 = htmlspecialchars($_POST['idmenu']);
    $kodemenu1 = htmlspecialchars($_POST['Edit_kode_menu']);
    $namamenu1 = htmlspecialchars($_POST['Edit_nama_menu']);
    $harga_modal1 = htmlspecialchars($_POST['Edit_Harga_Modal']);
    $harga_jual1 = htmlspecialchars($_POST['Edit_Harga_Jual']);

    $Carimenu = mysqli_query($conn,"SELECT * FROM menu WHERE kode_menu='$kodemenu1' and idmenu!='$idmenu1'");
    $HasilData = mysqli_num_rows($Carimenu);

    if($HasilData > 0){
        echo '<script>alert("Maaf! kode menu sudah ada");history.go(-1);</script>';
    } else{
        $cekDataUpdate =  mysqli_query($conn, "UPDATE menu SET kode_menu='$kodemenu1',
        nama_menu='$namamenu1',harga_modal='$harga_modal1',harga_jual='$harga_jual1'
         WHERE idmenu='$idmenu1'") or die(mysqli_connect_error());
        if($cekDataUpdate){
            echo '<script>history.go(-1);</script>';
        } else {
            echo '<script>alert("Gagal Edit Data menu");history.go(-1);</script>';
        }
    }
}; 
	if(!empty($_GET['hapus'])){
		$idmenu1 = $_GET['hapus'];
		$hapus_data = mysqli_query($conn, "DELETE FROM menu WHERE idmenu='$idmenu1'");
        if($hapus_data){
            echo '<script>history.go(-1);</script>';
        } else {
            echo '<script>alert("Gagal Hapus Data menu");history.go(-1);</script>';
        }
	};
    ?>
<!-- Modal Tambah menu -->
<div class="modal fade" id="Tambahmenu" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content border-0">
            <form method="post">
                <div class="modal-header bg-purple">
                    <h5 class="modal-title text-white">Tambah Menu</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="samll">Kode Menu :</label>
                        <input type="text" name="Tambah_kode_menu" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="samll">Nama Menu :</label>
                        <input type="text" name="Tambah_nama_menu" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="samll">Harga Modal :</label>
                        <input type="number" placeholder="0" name="Tambah_Harga_Modal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label class="samll">Harga Jual :</label>
                        <input type="number" placeholder="0" name="Tambah_Harga_Jual" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" name="Tambahmenu" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- end Modal Menu -->

<!-- end isinya -->
<?php include 'footer.php'; ?>