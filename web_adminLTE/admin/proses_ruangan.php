<?php 
include 'koneksi.php';

// Proses Insert
if ($_GET['proses'] == 'insert') {
    if (isset($_POST['Proses'])) {
        
        $sql = mysqli_query($db, "INSERT INTO ruangan (kode_ruangan, nama_ruangan, gedung, lantai, jenis_ruangan, kapasitas, keterangan) 
                                  VALUES ('$_POST[kode_ruangan]', '$_POST[nama_ruangan]', '$_POST[gedung]', '$_POST[lantai]', '$_POST[jenis_ruangan]', '$_POST[kapasitas]', '$_POST[keterangan]')");

        if ($sql) {
            echo "<script>window.location='index.php?p=ruangan'</script>";
        } else {
            echo "Gagal menambahkan data ruangan! Error: " . mysqli_error($db);
        }
    }
}

// Proses Update
if ($_GET['proses'] == 'update') {
    if (isset($_POST['Proses'])) {
        $sql = mysqli_query($db, "UPDATE ruangan SET
                                  nama_ruangan = '$_POST[nama_ruangan]', 
                                  gedung = '$_POST[gedung]', 
                                  lantai = '$_POST[lantai]', 
                                  jenis_ruangan = '$_POST[jenis_ruangan]', 
                                  kapasitas = '$_POST[kapasitas]', 
                                  keterangan = '$_POST[keterangan]' 
                                  WHERE id = '$_POST[id]'");

        if ($sql) {
            echo "<script>window.location='index.php?p=ruangan'</script>";
        } else {
            echo "Gagal memperbarui data ruangan!";
        }
    }
}

// Proses Delete
if ($_GET['proses'] == 'delete') {
    $hapus = mysqli_query($db, "DELETE FROM ruangan WHERE id = '$_GET[id]'");

    if ($hapus) {
        echo "<script>window.location='index.php?p=ruangan'</script>";
    } else {
        echo "Gagal menghapus data ruangan!";
    }
}
?>