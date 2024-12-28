<h2>Data Ruangan</h2>
<table id="example" class="table table-bordered">
    <thead>
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
    </thead>
    <tbody>
        <?php
        include 'admin/koneksi.php';
        $ambil = mysqli_query($db, "SELECT * FROM ruangan");
        $no = 1;
        while ($data = mysqli_fetch_array($ambil)) {
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
            </tr>
        <?php
            $no++;
        }
        ?>
    </tbody>
</table>