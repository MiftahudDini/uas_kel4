<h2>Data Prodi</h2>
<table id="example" class="table table-bordered">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama Prodi</th>
        <th>Jenjang Studi</th>
    </tr>
    </thead>
    <tbody>
    <?php
    include 'admin/koneksi.php';
    $ambil = mysqli_query($db, "SELECT * FROM prodii");
    $no = 1;
    while ($data = mysqli_fetch_array($ambil)) {
    ?>

        <tr>
            <td><?php echo $no ?></td>
            <td><?= $data['nama_prodi'] ?></td>
            <td><?= $data['jenjang_studi'] ?></td>
        </tr>
    <?php
        $no++;
    }
    ?>
</tbody>
</table>