<?php
if (!isset($_GET['aksi'])) {
?>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Kategori</h1>
        <div class="card mb-4">
            <div class="card-header">
                <a type="button" class="btn btn-primary" href="index.php?page=kategori&aksi=tambah">Tambah Kategori</a>
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Kategori</th>
                            <th>Nama Kategori</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $kategori = mysqli_query($koneksi, "SELECT * FROM kategori");
                        $no = 1;
                        while ($data = mysqli_fetch_array($kategori)) {
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $data['id_kategori']; ?></td>
                                <td><?php echo $data['nama_kategori']; ?></td>
                                <td><a href="index.php?page=kategori&aksi=edit&id=<?php echo $data['id_kategori'] ?>">Edit</a> |
                                    <a href="index.php?page=kategori&aksi=hapus&id=<?php echo $data['id_kategori'] ?>">Hapus</a></td>
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
} elseif ($_GET['aksi'] == 'tambah') {
?>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Kategori</h1>
        <div class="card mb-4 col-md-8">
            <div class="card-header">
                <h5> Tambah Kategori </h5>
            </div>
            <div class="card-body">
                <form action='' method="POST">
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" name="a">
                        <label>ID Kategori</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" name="b">
                        <label>Nama Kategori</label>
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
        mysqli_query($koneksi, "INSERT INTO kategori (id_kategori, nama_kategori)           
                                VALUES('$_POST[a]','$_POST[b]')");

        echo "<script>window.alert('Sukses Menambahkan Data Kategori.');
                        window.location='kategori'</script>";
    }
} elseif ($_GET['aksi'] == 'edit') {
    $kategori = mysqli_query($koneksi, "SELECT * FROM kategori where id_kategori='$_GET[id]'");
    $data = mysqli_fetch_array($kategori);
    ?>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Data Kategori</h1>
        <div class="card mb-4 col-md-8">
            <div class="card-header">
                <h5> Update Kategori </h5>
            </div>
            <div class="card-body">
                <form action='' method="POST">
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" name="a" value="<?php echo $data['id_kategori']; ?>">
                        <label>ID Kategori</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" type="text" name="b" value="<?php echo $data['nama_kategori']; ?>">
                        <label>Nama Kategori</label>
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
        mysqli_query($koneksi, "UPDATE kategori SET id_kategori = '$_POST[a]',
                                                nama_kategori = '$_POST[b]' where id_kategori = '$_GET[id]'");
        echo "<script>window.alert('Sukses Update Data Kategori.');
                        window.location='kategori'</script>";
    }
} elseif ($_GET['aksi'] == 'hapus') {
    mysqli_query($koneksi, "DELETE FROM kategori where id_kategori='$_GET[id]'");
    echo "<script>window.alert('Data Kategori Berhasil Di Hapus.');
                                window.location='kategori'</script>";
}
?>
