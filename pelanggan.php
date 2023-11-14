<?php 
if (!isset($_GET['aksi'])){
?>
    <div class="container-fluid px-4">
                <h1 class="mt-4">Data Pelanggan</h1>                      
                <div class="card mb-4">
                    <div class="card-header">
                        <a type="button" class="btn btn-primary" href="index.php?page=pelanggan&aksi=tambah">Tambah Pelanggan</a>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pelanggan</th>
                                    <th>No Telepon</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $pelanggan=mysqli_query($koneksi, "SELECT * FROM pelanggan");
                            $no = 1;
                            while ($data = mysqli_fetch_array($pelanggan)){
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $data['nama_pelanggan']; ?></td>
                                    <td><?php echo $data['no_hp']; ?></td>
                                    <td><a href="index.php?page=pelanggan&aksi=edit&id=<?php echo $data['id_pelanggan'] ?>">Edit</a> | 
                                        <a href="index.php?page=pelanggan&aksi=hapus&id=<?php echo $data['id_pelanggan'] ?>">Hapus</a></td>
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
                <h1 class="mt-4">Data pelanggan</h1>                      
                <div class="card mb-4 col-md-8">
                    <div class="card-header">
                       <h5> Tambah pelanggan </h5>
                    </div>
                    <div class="card-body">
                        <form action=''  method="POST" enctype='multipart/form-data'>                        
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" name="a">
                                    <label>Nama Pelanggan</label>                                
                                </div>                            
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" name="b">
                                    <label>No Telepon</label>
                                </div>
                                <div class="d-grid">
                                    <button class="btn btn-primary btn-block" type="submit" name="simpan">Simpan</button>
                                </div>
                        </form>
                    </div>
                </div>
</div>

<?php
if (isset($_POST['simpan'])){
    mysqli_query($koneksi,"INSERT INTO pelanggan (nama_pelanggan, no_hp)           
                VALUES('$_POST[a]','$_POST[b]')");
                               
                echo "<script>window.alert('Sukses Menambahkan Data pelanggan .');
                        window.location='pelanggan'</script>";
}
}elseif ($_GET['aksi']=='edit'){
    $pelanggan = mysqli_query($koneksi, "SELECT * FROM pelanggan where id_pelanggan='$_GET[id]'");
    $data = mysqli_fetch_array($pelanggan);       
?>
<div class="container-fluid px-4">
                <h1 class="mt-4">Data Siswa</h1>                      
                <div class="card mb-4 col-md-8">
                    <div class="card-header">
                       <h5> Update Siswa </h5>
                    </div>
                    <div class="card-body">
                        <form action=''  method="POST" enctype='multipart/form-data'>      
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="a" value="<?php echo $data['nama_pelanggan']; ?>">
                                <label>Nama Pelanggan</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="b" value="<?php echo $data['no_hp']; ?>">
                                <label>No Telepon</label>
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-primary btn-block" type="submit" name="update">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
</div>
<?php
if (isset($_POST['update'])){
    $dir_foto = 'foto/';
    $filename = basename($_FILES['e']['name']);
    $uploadfile = $dir_foto . $filename;
        if ($filename != ''){
            if (move_uploaded_file($_FILES['e']['tmp_name'], $uploadfile)) {            
                mysqli_query($koneksi,"UPDATE pelanggan SET nama_pelanggan  = '$_POST[a]',
                                                        no_hp   = '$_POST[b]' where id_pelanggan = '$_GET[id]'");           
                echo "<script>window.alert('Sukses Update Data pelanggan.');
                        window.location='pelanggan'</script>";
            }else{
                echo "<script>window.alert('Gagal Update Data pelanggan.');
                        window.location='index.php?page=pelanggan&aksi=tambah'</script>";
            }
        }else{
                mysqli_query($koneksi,"UPDATE pelanggan SET nama_pelanggan    = '$_POST[a]',
                                                        no_hp    = '$_POST[b]' where id_pelanggan = '$_GET[id]'");                               
                echo "<script>window.alert('Sukses Update Data pelanggan .');
                        window.location='pelanggan'</script>";
        }
}
}elseif ($_GET['aksi']=='hapus'){ 
	mysqli_query($koneksi, "DELETE FROM pelanggan where id_pelanggan='$_GET[id]'");
	echo "<script>window.alert('Data pelanggan Berhasil Di Hapus.');
                                window.location='pelanggan'</script>";
}
?>