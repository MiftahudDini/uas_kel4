<?php
include 'koneksi.php';
if ($_GET['proses'] == 'insert') {
    if (isset($_POST['Proses'])) {
        $nama_prodi = $_POST['nama_prodi'];
        $jenjang_studi = $_POST['jenjang_studi'];


        $sql = mysqli_query($db, "INSERT INTO prodii (nama_prodi, jenjang_studi) VALUES ('$nama_prodi', '$jenjang_studi')");


        if ($sql) {
            echo "<script>window.location='index.php?p=prodi'</script>";
        } else {
            echo "Data gagal disimpan";
        }
    }
}

if ($_GET['proses'] == 'update') {
    if (isset($_POST['proses'])) {

        $id = $_POST['id'];

        // Mengambil data dari form
        $nama_prodi = $_POST['nama_prodi'];
        $jenjang_studi = $_POST['jenjang_studi'];

        // Query untuk mengupdate data prodi berdasarkan ID
        $sql = mysqli_query($db, "UPDATE prodii SET 
            nama_prodi = '$nama_prodi',
            jenjang_studi = '$jenjang_studi'
            WHERE id = '$id'");
        // Jika berhasil update, redirect ke halaman index.php?p=prodi
        if ($sql) {
            echo "<script>window.location='index.php?p=prodi'</script>";
        } else {
            echo "Gagal memperbarui data!";
        }
    }
}

if ($_GET['proses'] == 'delete') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query = "DELETE FROM prodii WHERE id='$id'";
        $sql = mysqli_query($db, $query);


        if ($sql) {
            header("Location:index.php?p=prodi");
        } else {
            echo "Gagal menghapus data!";
        }
    }
}
