<h2>Data Dosen</h2>
<table id="example" class="table table-bordered">
    <thead>
    <tr>
        <th>No</th>
        <th>NIP</th>
        <th>Nama Dosen</th>
        <th>Email</th>
        <th>No Telepon</th>
        <th>Alamat</th>
    </tr>
    </thead>

    <tbody>
        <?php
           include 'admin/koneksi.php';
           $sql=mysqli_query($db, "SELECT * FROM dosen");
           $no=1;
           while ($data=mysqli_fetch_array($sql)){

        ?>
        <tr>
            <td><?=$no ?></td>
            <td><?=$data['nip']?></td>
            <td><?=$data['nama_dosen']?></td>
            <td><?=$data['email']?></td>
            <td><?=$data['notelp']?></td>
            <td><?=$data['alamat']?></td>
        </tr>
        <?php
            $no++;
             }
        ?>
    </tbody>
</table>