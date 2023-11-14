<?php 
if (!isset($_GET['aksi'])){
?>
    <div class="container-fluid px-4">
                <h1 class="mt-4">Data User</h1>                      
                <div class="card mb-4">
                    <div class="card-header">
                        <a type="button" class="btn btn-primary" href="index.php?page=user&aksi=tambah">Tambah User</a>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $user=mysqli_query($koneksi, "SELECT * FROM user");
                            $no = 1;
                            while ($data = mysqli_fetch_array($user)){
                            ?>
                                <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $data['username']; ?></td>
                                    <td><?php echo $data['password']; ?></td>
                                    <td><a href="index.php?page=user&aksi=edit&id=<?php echo $data['id_user'] ?>">Edit</a> | 
                                        <a href="index.php?page=user&aksi=hapus&id=<?php echo $data['id_user'] ?>">Hapus</a></td>
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
                <h1 class="mt-4">Data User</h1>                      
                <div class="card mb-4 col-md-8">
                    <div class="card-header">
                       <h5> Tambah User </h5>
                    </div>
                    <div class="card-body">
                        <form action=''  method="POST" enctype='multipart/form-data'>                        
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" name="a">
                                    <label>Nama User</label>                                
                                </div>                            
                                <div class="form-floating mb-3">
                                    <input class="form-control" type="text" name="b">
                                    <label>Password</label>
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
    mysqli_query($koneksi,"INSERT INTO user (username, password)           
                VALUES('$_POST[a]','$_POST[b]')");
                               
                echo "<script>window.alert('Sukses Menambahkan Data user .');
                        window.location='user'</script>";
}
}elseif ($_GET['aksi']=='edit'){
    $user = mysqli_query($koneksi, "SELECT * FROM user where id_user='$_GET[id]'");
    $data = mysqli_fetch_array($user);       
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
                                <input class="form-control" type="text" name="a" value="<?php echo $data['username']; ?>">
                                <label>Username</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" type="text" name="b" value="<?php echo $data['password']; ?>">
                                <label>Password</label>
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
                mysqli_query($koneksi,"UPDATE user SET username  = '$_POST[a]',
                                                        password   = '$_POST[b]' where id_user = '$_GET[id]'");           
                echo "<script>window.alert('Sukses Update Data user.');
                        window.location='user'</script>";
            }else{
                echo "<script>window.alert('Gagal Update Data user.');
                        window.location='index.php?page=user&aksi=tambah'</script>";
            }
        }else{
                mysqli_query($koneksi,"UPDATE user SET username    = '$_POST[a]',
                                                        password    = '$_POST[b]' where id_user = '$_GET[id]'");                               
                echo "<script>window.alert('Sukses Update Data user .');
                        window.location='user'</script>";
        }
}
}elseif ($_GET['aksi']=='hapus'){ 
	mysqli_query($koneksi, "DELETE FROM user where id_user='$_GET[id]'");
	echo "<script>window.alert('Data user Berhasil Di Hapus.');
                                window.location='user'</script>";
}
?>