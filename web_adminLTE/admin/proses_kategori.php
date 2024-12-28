<?php 
include 'koneksi.php';
if ($_GET['proses']=='insert') {
    if (isset($_POST['Proses'])){
        $nama_kategori = $_POST['nama_kategori'];
        $keterangan = $_POST['keterangan'];

        
        $sql = mysqli_query($db, "INSERT INTO kategori (nama_kategori, keterangan) VALUES ('$nama_kategori', '$keterangan')");

        
        if ($sql){
            echo "<script>window.location='index.php?p=kategori'</script>";
        } else {
            echo "Data gagal disimpan";
        }
    }
}

if ($_GET['proses']=='update') {
    if (isset($_POST['Proses'])) {
        // Mengambil data dari form
        $id = $_GET['id'];
        $nama_kategori = $_POST['nama_kategori'];
        $keterangan = $_POST['keterangan'];

        // Query untuk mengupdate data prodi berdasarkan ID
        $sql = mysqli_query($db, "UPDATE kategori SET 
            nama_kategori = '$nama_kategori',
            keterangan = '$keterangan'
            WHERE id = '$id'");

        // Jika berhasil update, redirect ke halaman index.php?p=prodi
        if ($sql) {
            echo "<script>window.location='index.php?p=kategori'</script>";
        } else {
            echo "Gagal memperbarui data!";
        }
    }
}

if ($_GET['proses']=='delete') {
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    
        $query = "DELETE FROM kategori WHERE id='$id'";
        $sql = mysqli_query($db, $query);
    
        
        if($sql){
            header("Location:index.php?p=kategori");
        } else {
            echo "Gagal menghapus data!";
        }
    } 
}
?>