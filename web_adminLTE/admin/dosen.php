<?php
include 'koneksi.php';
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';

switch ($aksi) {
    case 'list':
?>

        <div class="row">
            <h2>Dosen</h2>

            <div class="col-2">
                <a href="index.php?p=dosen&aksi=input" class="btn btn-primary mb-3"><i class="bi bi-file-plus"></i>Tambah Dosen</a>
            </div>

            <table class="table table-border">
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama Dosen</th>
                    <th>Email</th>
                    <th>Prodi ID</th>
                    <th>No Telepon</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>

                <?php
                $ambil = mysqli_query($db, "SELECT * FROM prodii INNER JOIN dosen ON prodii.id = dosen.prodi_id");
                $no = 1;
                while ($data = mysqli_fetch_array($ambil)) {
                ?>

                    <tr>
                        <td><?php echo $no ?></td>

                        <td><?= $data['nip'] ?></td>
                        <td><?= $data['nama_dosen'] ?></td>
                        <td><?= $data['email'] ?></td>
                        <td><?= $data['nama_prodi'] ?></td>
                        <td><?= $data['notelp'] ?></td>
                        <td><?= $data['alamat'] ?></td>
                        <td>
                            <a href="index.php?p=dosen&aksi=edit&id=<?= $data['id'] ?>" class="btn btn-success">Edit</a>
                            <a href="proses_dosen.php?proses=delete&id=<?= $data['id'] ?>" class="btn btn-warning" onclick="return confirm('Yakin akan menghapus data?')">Hapus</a>
                        </td>
                    </tr>
                <?php
                    $no++;
                }
                ?>
            </table>
        </div>

    <?php
        break;

    case 'input':
    ?>
        <div class="row">
            <div class="col-6">
                <h2>Masukkan data Dosen</h2>
                <div class="col-6">
                    <a href="index.php?p=dosen" class="btn btn-primary mb-3">Data Dosen</a>

                </div>
                <table>
                    <form action="proses_dosen.php?proses=insert" method="POST">

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="nip">
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_dosen">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="email">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Program Studi</label>
                            <div class="col-sm-10">
                                <select name="prodi_id" class="form- select">
                                    <option value="">--PILIH PRODI--</option>
                                    <?php
                                    $prodi = mysqli_query($db, "SELECT * FROM prodii");
                                    while ($data_prodi = mysqli_fetch_array($prodi)) {
                                        echo "<option value=" . $data_prodi['id'] . ">" . $data_prodi['nama_prodi'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nomor Telepon</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="notelp">
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea name="alamat" cols="50" rows="4"></textarea>
                            </div>
                        </div>

                        <button type="submit" name="proses" class="btn btn-danger">Proses</button> &nbsp
                        <button type="submit" name="proses" class="btn btn-primary"> Reset</button>
                    </form>
                </table>
            </div>
        </div>
    <?php

        break;
    case 'edit':
        include('koneksi.php');

        // Ambil data dosen berdasarkan id
        $ambil = mysqli_query($db, "SELECT * FROM dosen WHERE id='$_GET[id]'");
        $data_dosen = mysqli_fetch_array($ambil);
    ?>

        <div class="row">
            <div class="col-7">
                <h2>Edit Data Dosen</h2>
                <div class="col-2">
                    <a href="index.php?p=dosen" class="btn btn-primary mb-3">Data Dosen</a>
                </div>
                <table>
                    <form action="proses_dosen.php?proses=update" method="POST">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">NIP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nip" value="<?= $data_dosen['nip'] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Nama Dosen</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_dosen" value="<?= $data_dosen['nama_dosen'] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" name="email" value="<?= $data_dosen['email'] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Program Studi</label>
                            <div class="col-sm-10">
                                <select name="prodi_id" class="form-select">
                                    <option value="">--PILIH PRODI--</option>
                                    <?php
                                    $prodi = mysqli_query($db, "SELECT * FROM prodii");
                                    while ($data_prodi = mysqli_fetch_array($prodi)) {
                                        $selected = $data_prodi['$id'] == $data_dosen['$prodi_id'] ? 'selected' : '';
                                        echo "<option value=" . $data_prodi['id'] . " $selected>" . $data_prodi['nama_prodi'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">No Telepon</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="notelp" value="<?= $data_dosen['notelp'] ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <textarea name="alamat" cols="50" rows="4" class="form-control"><?= $data_dosen['alamat'] ?></textarea>
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?= $data_dosen['id'] ?>">

                        <button type="submit" name="proses" class="btn btn-danger">Update</button> &nbsp
                        <button type="reset" class="btn btn-primary">Reset</button>
                    </form>
                </table>
            </div>
        </div>
<?php
        break;
}
?>