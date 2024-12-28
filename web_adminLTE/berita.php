<h2>Data Kategori</h2>
<table id="example" class="table table-bordered">
    <thead>
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Kategori</th>
        <th>Date Created</th>
    </tr>
    </thead>
    <tbody>
    <?php
    include 'admin/koneksi.php';
    $ambil = mysqli_query($db, "SELECT * FROM berita");
    $no = 1;
    while ($data = mysqli_fetch_array($ambil)) {
    ?>

        <tr>
            <td><?php echo $no ?></td>
            <td><?= $data['judul'] ?></td>
            <td><?= $data['kategori_id'] ?></td>
            <td><?= $data['date_created'] ?></td>
        </tr>
    <?php
        $no++;
    }
    ?>
</tbody>
</table>