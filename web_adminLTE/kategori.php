<h2>Data Kategori</h2>
<table id="example" class="table table-bordered">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama Kategori</th>
        <th>Keterangan</th>
    </tr>
    </thead>
    <tbody>
    <?php
    include 'admin/koneksi.php';
    $ambil = mysqli_query($db, "SELECT * FROM kategori");
    $no = 1;
    while ($data = mysqli_fetch_array($ambil)) {
    ?>

        <tr>
            <td><?php echo $no ?></td>
            <td><?= $data['nama_kategori'] ?></td>
            <td><?= $data['keterangan'] ?></td>
        </tr>
    <?php
        $no++;
    }
    ?>
</tbody>
</table>