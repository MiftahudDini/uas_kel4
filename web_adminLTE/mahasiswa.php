<h2>Data Mahasiswa</h2>
<table id="example" class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Email</th>
            <th>No Telpon</th>
            <th>Alamat</th>
        </tr>
        
    </thead>

    <tbody>
        <?php
           include 'admin/koneksi.php';
           $sql=mysqli_query($db, "SELECT * FROM mahasiswa");
           $no=1;
           while ($data_mhs=mysqli_fetch_array($sql)){

        ?>
        <tr>
            <td><?=$no ?></td>
            <td><?=$data_mhs['nim']?></td>
            <td><?=$data_mhs['nama_mahasiswa']?></td>
            <td><?=$data_mhs['email']?></td>
            <td><?=$data_mhs['nohp']?></td>
            <td><?=$data_mhs['alamat']?></td>
        </tr>
        <?php
            $no++;
             }
        ?>
    </tbody>

</table>