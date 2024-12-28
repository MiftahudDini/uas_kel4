<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Mahasiswa</h1>
</div>
<?php
$aksi = isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
    case 'list':
?>
        <div class="row">
            <div class="col">
                <a href="index.php?p=mhs&aksi=input" class="btn btn-primary mb-3"><i class="bi bi-plus-circle-fill"></i> Tambah Mahasiswa</a>
            </div>
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Email</th>
                    <th>Notelp</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
                <?php
                include 'koneksi.php';
                $ambil = mysqli_query($db, "SELECT * FROM mahasiswa");
                $no = 1;
                while ($data = mysqli_fetch_array($ambil)) {


                ?>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?= $data['nim'] ?></td>
                        <td><?= $data['nama_mahasiswa'] ?></td>
                        <td><?= $data['email'] ?></td>
                        <td><?= $data['nohp'] ?></td>
                        <td><?= $data['alamat'] ?></td>
                        <td>
                            <a href="index.php?p=mhs&aksi=edit&nim=<?= $data['nim'] ?>" class="btn btn-success">Edit</a>
                            <a href="proses_mahasiswa.php?proses=delete&nim=<?= $data['nim'] ?>" class="btn btn-danger" onclick="return confirm('Yakin untuk menghapus data?')">Hapus</a>
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
        <div class="row">
            <div class="col-6">
                <form action="proses_mahasiswa.php?proses=insert" method="post">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="number" value="proses" class="form-control" name="nim">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_mahasiswa">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="tanggal lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-4">
                                    <select name="tgl_lahir" class="form-control">
                                        <option value="">--TGL--</option>
                                        <?php
                                        //counted, uncounted
                                        for ($i = 0; $i <= 31; $i++) {
                                            echo "<option value=" . $i . ">" . $i . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <select name="bln" class="form-control">
                                        <option value="">--MM--</option>
                                        <?php
                                        $bulan = [1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'May', 6 => 'Juni', 7 => 'Juli', 8 => 'August', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'];
                                        foreach ($bulan as $indexBulan => $namaBulan) {
                                            echo "<option value=" . ($indexBulan) . ">" . $namaBulan . "</option>";
                                            $i++;
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <select name="thn" class="form-control">
                                        <option value="">--YY--</option>
                                        <?php
                                        for ($i = date('Y'); $i >= 1900; $i -= 1) {
                                            echo "<option value=" . ($i) . ">" . $i . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">No. Telepon</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="nohp">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="alamat" rows="5"></textarea>
                        </div>
                    </div>
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input type="radio" name="jenis_kelamin" value="L" checked> Laki-laki
                                <input type="radio" name="jenis_kelamin" value="P" checked> Perempuan
                                <label class="form-check-label" for="gridRadios1">
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Hobi</label>
                        <div class="col-sm-10 offset-sm-2">
                            <div class="form-check">
                                <input type="checkbox" name="hobi[]" value="Membaca">Membaca
                                <input type="checkbox" name="hobi[]" value="Nonton Film">Nonton Film
                                <input type="checkbox" name="hobi[]" value="Main Game">Main Game
                                <input type="checkbox" name="hobi[]" value="Olahraga">Olahraga
                                <label class="form-check-label" for="gridCheck1">
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="proses" class="btn btn-primary">Sign in</button>
                </form>
            </div>
        </div>
        </div>
    <?php
        break;
    case 'edit':
        include 'koneksi.php';
        $ambil = mysqli_query($db, "SELECT * FROM mahasiswa WHERE nim='$_GET[nim]'");
        $data_mhs = mysqli_fetch_array($ambil);
        $tgl = explode("-", $data_mhs['tgl_lahir']);
        $hobies = explode(",", $data_mhs['hobi']);
    ?>
        <div class="row">
            <div class="col-6">
                <form action="proses_mahasiswa.php?proses=update" method="post">
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="nim" value="<?= $data_mhs['nim'] ?>" readonly>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_mahasiswa" value="<?= $data_mhs['nama_mahasiswa'] ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" value="<?= $data_mhs['email'] ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-4">
                                    <select name="tgl" class="form-control">
                                        <option value="">--TGL--</option>
                                        <?php
                                        //counted, uncounted
                                        for ($i = 1; $i <= 31; $i++) {
                                            $selected = ($tgl[2] == $i) ? 'selected' : ''; //terrary
                                            echo "<option value=" . $i . " $selected>" . $i . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <select name="bln" class="form-control">
                                        <option value="">--MM--</option>
                                        <?php
                                        $bulan = [1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April', 5 => 'May', 6 => 'Juni', 7 => 'Juli', 8 => 'August', 9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember'];
                                        foreach ($bulan as $indexBulan => $namaBulan) {
                                            $selected = ($tgl[1] == $indexBulan) ? 'selected' : ''; //terrary
                                            echo "<option value=" . ($indexBulan) . " $selected>" . $namaBulan . "</option>";
                                            $i++;
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-4">
                                    <select name="thn" class="form-control">
                                        <option value="">--YY--</option>
                                        <?php
                                        for ($i = date('Y'); $i >= 1900; $i -= 1) {
                                            $selected = ($tgl[0] == $i) ? 'selected' : ''; //terrary
                                            echo "<option value=" . ($i) . " $selected>" . $i . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">No. Telepon</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" name="nohp" value="<?= $data_mhs['nohp'] ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="alamat" rows="5"><?= $data_mhs['alamat'] ?></textarea>
                        </div>
                    </div>
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Jenis Kelamin</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input type="radio" name="jekel" value="L" <?= ($data_mhs['jenis_kelamin'] == 'L') ? 'checked' : '' ?>> Laki-laki
                                <label class="form-check-label" for="gridRadios1">
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="jekel" value="Pr" <?= ($data_mhs['jenis_kelamin'] == 'P') ? 'checked' : '' ?> checked> Perempuan
                                <label class="form-check-label" for="gridRadios1">
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Hobi</label>
                        <div class="col-sm-10 offset-sm-2">
                            <div class="form-check">
                                <input type="checkbox" name="hobi[]" value="Membaca" <?php if (in_array('Membaca', $hobies)) echo 'checked' ?>>
                                <label class="form-check-label" for="gridCheck1">
                                    Membaca
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="hobi[]" value="Nonton Film" <?php if (in_array('Nonton Film', $hobies)) echo 'checked' ?>>
                                <label class="form-check-label" for="gridCheck1">
                                    Nonton Film
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="hobi[]" value="Main Game" <?php if (in_array('Main Game', $hobies)) echo 'checked' ?>>
                                <label class="form-check-label" for="gridCheck1">
                                    Main Game
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" name="hobi[]" value="Olahraga" <?php if (in_array('Olahraga', $hobies)) echo 'checked' ?>>
                                <label class="form-check-label" for="gridCheck1">
                                    Olahraga
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" name="proses" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
        </div>
<?php

        break;
}
?>