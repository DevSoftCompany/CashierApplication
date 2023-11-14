<?php 
if (!isset($_GET['aksi'])){
?>
    <div class="container-fluid px-4">
                <h1 class="mt-4">Data Menu Makanan</h1>                      
                <div class="card mb-4">
                    <div class="card-header">
                        <a type="button" class="btn btn-primary" href="index.php?page=menu&aksi=tambah">Tambah Menu</a>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID Menu</th>
                                    <th>Nama Menu</th>
                                    <th>Harga</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $menu=mysqli_query($koneksi, "SELECT * FROM menu");
                            $no = 1;
                            while ($data = mysqli_fetch_array($menu)){
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $data['id_menu']; ?></td>
                                    <td><?php echo $data['nama_menu']; ?></td>
                                    <td><?php echo $data['harga']; ?></td>
                                    <td><?php echo $data['kategori_id']; ?></td>
                                    <td><?php echo $data['status']; ?></td>
                                    <td><a href="index.php?page=menu&aksi=edit&id=<?php echo $data['id_menu'] ?>">Edit</a> |
                                        <a href="index.php?page=menu&aksi=hapus&id=<?php echo $data['id_menu'] ?>">Hapus</a></td>
                                </tr>
                            <?php
                            $no++;
                            }
                            ?>   
                            </tbody>
                        </table>
                    </div>
                </div>
    </div>    
<?php
}elseif ($_GET['aksi']=='tambah'){     
?>
<div class="container-fluid px-4">
                <h1 class="mt-4">Data Menu Makanan</h1>                      
                <div class="card mb-4 col-md-8">
                    <div class="card-header">
                       <h5> Tambah Menu </h5>
                    </div>
                    <div class="card-body">
                        <form action=''  method="POST" enctype='multipart/form-data'>                        
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" name="a">
                                    <label>ID Menu</label>                                
                                </div>                            
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" name="b">
                                    <label>Nama Menu</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" name="c">
                                    <label>Harga</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" name="d">
                                    <label>Kategori</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" name="e">
                                    <label>Status</label>
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-block" type="submit" name="simpan">Simpan</button>
                                </div>
                        </form>
                    </div>
                </div>
</div>

<?php
if (isset($_POST['simpan'])) {
    mysqli_query($koneksi, "INSERT INTO menu (id_menu, nama_menu, harga, kategori_id, status)           
                            VALUES('$_POST[a]','$_POST[b]','$_POST[c]','$_POST[d]','$_POST[e]')");

    echo "<script>window.alert('Sukses Menambahkan Data Menu Makanan');
                    window.location='menu'</script>";
}
}elseif ($_GET['aksi']=='edit'){
    $menu = mysqli_query($koneksi, "SELECT * FROM menu where id_menu='$_GET[id]'");
    $data = mysqli_fetch_array($menu);       
?>
<div class="container-fluid px-4">
                <h1 class="mt-4">Data Menu Makanan</h1>                      
                <div class="card mb-4 col-md-8">
                    <div class="card-header">
                       <h5> Update Menu </h5>
                    </div>
                    <div class="card-body">
                        <form action=''  method="POST" enctype='multipart/form-data'>      
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="a" value="<?php echo $data['id_menu']; ?>">
                                <label>ID Menu</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="b" value="<?php echo $data['nama_menu']; ?>">
                                <label>Nama Menu</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="c" value="<?php echo $data['harga']; ?>">
                                <label>Harga</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="d" value="<?php echo $data['kategori_id']; ?>">
                                <label>Kategori</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="e" value="<?php echo $data['status']; ?>">
                                <label>Status</label>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary btn-block" type="submit" name="update">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
</div>
<?php
 if (isset($_POST['update'])) {
    mysqli_query($koneksi, "UPDATE menu SET id_menu = '$_POST[a]',
                                            nama_menu = '$_POST[b]', 
                                            harga = '$_POST[c]', 
                                            kategori_id = '$_POST[d]', 
                                            status = '$_POST[e]' where id_kategori = '$_GET[id]'");
    echo "<script>window.alert('Sukses Update Data Menu.');
                    window.location='menu'</script>";
}
} elseif ($_GET['aksi'] == 'hapus') {
mysqli_query($koneksi, "DELETE FROM menu where id_menu='$_GET[id]'");
echo "<script>window.alert('Data Menu Berhasil Di Hapus.');
                            window.location='menu'</script>";
}
?>