<?php
if($_POST){
    $nama_warung = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];

    if(empty($nama_warung)){
        echo "<script>alert('Nama warung tidak boleh kosong');location.href='tambah_warung.php';</script>";
    } else if(empty($deskripsi)){
        echo "<script>alert('Deskripsi tidak boleh kosong');location.href='tambah_warung.php';</script>";
    } else {
        include "server.php";
        $insert = mysqli_query($conn, "INSERT INTO warung (`id_warung`, `nama_warung`, `deskripsi`) VALUES (NULL, '$nama_warung', '$deskripsi')") or die(mysqli_error($conn));
        if ($insert) {
            echo "<script>alert('Sukses menambahkan warung');</script>";
        } else {
            echo "<script>alert('Gagal menambahkan warung');</script>";
        }
    } 
}
?>
