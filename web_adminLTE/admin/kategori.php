<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Kategori</h1>
</div>
<?php 
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
    case 'list':
?>
<div class="container">
        <div class="row">
            
            <div class ="col-2">
                <a href= "index.php?p=kategori&aksi=input" class="btn btn-primary mb-3"><i class="bi bi-file-plus"></i> Input Kategori </a>
            </div>
             <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                    
                </tr>
                <?php
                    include 'koneksi.php';
                    $ambil= mysqli_query($db, "SELECT * FROM kategori");
                    $no=1;
                    while($data=mysqli_fetch_array($ambil)){
                ?>

                <tr>
                    <td><?php echo $no ?></td>
                    <td><?= $data['nama_kategori']?></td>
                    <td><?= $data['keterangan']?></td>
                    <td>
                        <a href="index.php?p=kategori&aksi=edit&id=<?= $data['id'] ?>" class="btn btn-success"><i class="bi bi-pen-fill"></i> Edit</a>
                        <a href="proses_kategori.php?proses=delete&id=<?= $data['id'] ?>" onclick="return confirm('Apa anda yakin menghapus data?')" class="btn btn-danger"><i class="bi bi-trash"></i> Hapus</a>
                    </td>

                </tr>
                <?php 
                    $no++;
                    } 
                ?>

             </table>
<?php
        break;
    
    case 'input' :
?>
<div class="container">
    
        <form action="proses_kategori.php?proses=insert" method="POST">
        <div class="row">
            <div class="col-6">
                <form>

                <!-- NAma Prodi -->
                    <div class="row mb-3">
                        <label for="nama_kategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" required autofocus>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10">
                            <textarea type="text" name="keterangan" id="keterangan" class="form-control" required autofocus>
                            </textarea>
                        </div>
                    </div>

                    <!-- Jenjang Studi -->
                    <!-- <div class="row mb-3">
                        <label for="jenjang_studi" class="col-sm-2 col-form-label">Jenjang Studi</label>
                        <div class="col-sm-10">
                        <div class="row mb-3">
                        
                        <div class="col-sm-10">
                            <input type="radio" name="jenjang_studi" value="D-2" checked class="form-check-input">D-2 <br>
                            <input type="radio" name="jenjang_studi" value="D-3" class="form-check-input">D-3 <br>
                            <input type="radio" name="jenjang_studi" value="D-4" class="form-check-input">D-4 <br>
                            <input type="radio" name="jenjang_studi" value="S1" class="form-check-input">S1 <br>
                    </div> -->
                        
                    </div>


               
                  
                    <button type="submit" name="Proses" value="Proses" class="btn btn-primary">Proses</button>
                </form>

                
            </div>

        </div>
    </div>

<?php
        break;

    case 'edit':
        include 'koneksi.php';
    // Mengambil data prodi berdasarkan ID yang dikirimkan melalui URL
    $id = $_GET['id']; // Mengambil ID dari URL
    $ambil = mysqli_query($db, "SELECT * FROM kategori WHERE id = '$id'");
    $data_kategori = mysqli_fetch_array($ambil);
?>
<div class="container">
        
        <form action="proses_kategori.php?proses=update&id=<?php echo $data_kategori['id']?>" method="POST">

           <!-- Nama Prodi -->
           <div class="row mb-3">
                <label for="nama_kategori" class="col-sm-2 col-form-label">Nama kategori</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" value="<?= htmlspecialchars($data_kategori['nama_kategori']); ?>" required autofocus>
                </div>
            </div>

            <div class="row mb-3">
                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                <div class="col-sm-10">
                    <textarea type="text" name="keterangan" id="keterangan" class="form-control" required autofocus><?= htmlspecialchars($data_kategori['keterangan']); ?>
                    </textarea>
                </div>
            </div>


            <button type="submit" name="Proses" value="Proses" class="btn btn-primary">Proses</button>

        </form>
    </div>
<?php
    break;

}
?>
