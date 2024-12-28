<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
     <h1 class="h2">Ruangan</h1>
</div>
      <?php
    $aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
    switch ($aksi) {
        case 'list':
        
?>

<div class="container">
        <div class="row">
            
            <div class ="col-2">
                <a href= "index.php?p=ruangan&aksi=input" class="btn btn-primary mb-3"> Input Ruangan </a>
            </div>
             <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Kode Ruangan</th>
                    <th>Nama Ruangan</th>
                    <th>Gedung</th>
                    <th>Lantai</th>
                    <th>Jenis Ruangan</th>
                    <th>Kapasitas</th>
                    <th>Keterangan</th>
                    
                    
                </tr>
                <?php
                    include 'koneksi.php';
                    $ambil= mysqli_query($db, "SELECT * FROM ruangan");
                    $no=1;
                    while($data=mysqli_fetch_array($ambil)){
                ?>

                <tr>
                    <td><?php echo $no ?></td>
                    <td><?= $data['kode_ruangan']?></td>
                    <td><?= $data['nama_ruangan']?></td>
                    <td><?= $data['gedung']?></td>
                    <td><?= $data['lantai']?></td>
                    <td><?= $data['jenis_ruangan']?></td>
                    <td><?= $data['kapasitas']?></td>
                    <td><?= $data['keterangan']?></td>
                    <td>
                        <a href="index.php?p=ruangan&aksi=edit&id=<?= $data['id'] ?>" class="btn btn-success">Edit</a>
                        <a href="proses_ruangan.php?proses=delete&id=<?= $data['id']?>" onclick="return confirm('Apa anda yakin menghapus data?')" class="btn btn-danger">Hapus</a>
                    </td>

                </tr>
                <?php 
                    $no++;
                    } 
                ?>

             </table>


        </div>
    </div>  

<?php
    break;  
    case 'input':
?>

<div class="container">
        <h1 class="mt-4 mb-4">Ruangan</h1>
        <form action="proses_ruangan.php?proses=insert" method="POST">
        <div class="row">
            <div class="col-6">
                <form>

                    <div class="row mb-3">
                        <label for="kode_ruangan" class="col-sm-2 col-form-label">Kode Ruangan</label>
                        <div class="col-sm-10">
                            <input type="text" name="kode_ruangan" id="kode_ruangan" class="form-control" required autofocus>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="nama_ruangan" class="col-sm-2 col-form-label">Nama Ruangan</label>
                        <div class="col-sm-10">
                            <input type="text" name="nama_ruangan" id="nama_ruangan" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="gedung" class="col-sm-2 col-form-label">Gedung</label>
                        <div class="col-sm-10">
                            <input type="text" name="gedung" id="gedung" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="lantai" class="col-sm-2 col-form-label">Lantai</label>
                        <div class="col-sm-10">
                            <input type="text" name="lantai" id="lantai" class="form-control">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="jenis_ruangan" class="col-sm-2 col-form-label">Jenis Ruangan</label>
                        <div class="col-sm-10">
                        <div class="row mb-3">
                        <div>
                        <div class="col-sm-10">
                            <input type="radio" name="jenis_ruangan" value="Praktikum" checked class="form-check-input">Praktikum <br>
                            <input type="radio" name="jenis_ruangan" value="Teori" class="form-check-input">Teori <br>
                        </div> 
                        
                    </div>
                    </div>

                    <div class="row mb-3">
                        <label for="kapasitas" class="col-sm-2 col-form-label">Kapasitas</label>
                        <div class="col-sm-10">
                            <input type="text" name="kapasitas" id="kapasitas" class="form-control">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10">
                        <textarea class="form-control" name="keterangan" rows="5"></textarea>
                        </div>
                    </div>

                    <!-- <div class="row mb-3">
                        <label for="nama ruangan" class="col-sm-2 col-form-label">Nama Ruanagn</label>
                        <div class="col-sm-10">
                        <div class="row mb-3">
                        
                        <div class="col-sm-10">
                            <input type="radio" name="jenjang_studi" value="D-2" checked class="form-check-input">D-2 <br>
                            <input type="radio" name="jenjang_studi" value="D-3" class="form-check-input">D-3 <br>
                            <input type="radio" name="jenjang_studi" value="D-4" class="form-check-input">D-4 <br>
                            <input type="radio" name="jenjang_studi" value="S1" class="form-check-input">S1 <br>
                    </div> 
                        
                    </div>-->


               
                  
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
    $ambil = mysqli_query($db, "SELECT * FROM ruangan WHERE id = '$id'");
    $data_ruangan = mysqli_fetch_array($ambil);
?>
<div class="container">
        <h1 class="mt-4 mb-4">Edit Ruangan</h1>
        <form action="proses_ruangan.php?proses=update" method="POST">

           <!-- Nama Prodi -->
           <div class="row mb-3">
                <label for="nama_ruangan" class="col-sm-2 col-form-label">Nama Ruangan</label>
                <div class="col-sm-10">
                    <input type="hidden" name="id" value="<?= htmlspecialchars($data_ruangan['id']); ?>">
                    <input type="text" name="nama_ruangan" id="nama_ruangan" class="form-control" value="<?= htmlspecialchars($data_ruangan['nama_ruangan']); ?>" required autofocus>
                </div>
            </div>

            <div class="row mb-3">
           <label for="gedung" class="col-sm-2 col-form-label">Gedung</label>
                <div class="col-sm-10">
                    <input type="text" name="gedung" id="gedung" class="form-control" value="<?= htmlspecialchars($data_ruangan['gedung']); ?>">
                </div>
            </div>


            <div class="row mb-3">
           <label for="gedung" class="col-sm-2 col-form-label">Lantai</label>
                <div class="col-sm-10">
                    <input type="text" name="lantai" id="lantai" class="form-control" value="<?= htmlspecialchars($data_ruangan['lantai']); ?>">
                </div>
            </div>


                    <div class="row mb-3">
                        <label for="jenis_ruangan" class="col-sm-2 col-form-label">Jenis Ruangan</label>
                        <div class="col-sm-10">
                            <input type="text" name="jenis_ruangan" id="jenis_ruangan" class="form-control" value="<?= htmlspecialchars($data_ruangan['jenis_ruangan']); ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="kapasitas" class="col-sm-2 col-form-label">Kapasitas</label>
                        <div class="col-sm-10">
                            <input type="text" name="kapasitas" id="kapasitas" class="form-control" value="<?= htmlspecialchars($data_ruangan['kapasitas']); ?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                        <div class="col-sm-10">
                            <input type="text" name="keterangan" id="keterangan" class="form-control" value="<?= htmlspecialchars($data_ruangan['keterangan']); ?>">
                        </div>
                    </div>

            <!-- Jenjang Studi -->
            <!-- <div class="row mb-3">
                <label for="jenjang_studi" class="col-sm-2 col-form-label">Jenjang Studi</label>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input type="radio" name="jenjang_studi" value="D-2" class="form-check-input" <?= ($data_prodi['jenjang_studi'] == 'D-2') ? 'checked' : ''; ?>>D-2 <br>
                        <input type="radio" name="jenjang_studi" value="D-3" class="form-check-input" <?= ($data_prodi['jenjang_studi'] == 'D-3') ? 'checked' : ''; ?>>D-3 <br>
                        <input type="radio" name="jenjang_studi" value="D-4" class="form-check-input" <?= ($data_prodi['jenjang_studi'] == 'D-4') ? 'checked' : ''; ?>>D-4 <br>
                        <input type="radio" name="jenjang_studi" value="S1" class="form-check-input" <?= ($data_prodi['jenjang_studi'] == 'S1') ? 'checked' : ''; ?>>S1 <br>
                    </div>
                </div>
            </div> -->

            <button type="submit" name="Proses" value="Proses" class="btn btn-primary">Update</button>

        </form>
    </div>


<?php
                break;
    
        }
    ?>