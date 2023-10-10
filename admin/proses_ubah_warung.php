<?php
if($_POST){
    $id_warung = $_POST['id'];
    $nama_warung = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];

    if(empty($nama_warung)){
        echo "<script>alert('Nama warung tidak boleh kosong');location.href='tambah_warung.php';</script>";
    } else if(empty($deskripsi)){
        echo "<script>alert('Deskripsi tidak boleh kosong');location.href='tambah_warung.php';</script>";
    } else {
        include "server.php";
        $update = mysqli_query($conn, "UPDATE `warung` SET `nama_warung` = '$nama_warung', `deskripsi` = '$deskripsi' WHERE `warung`.`id_warung` = $id_warung;") or die(mysqli_error($conn));
        if ($update) {
            echo "<script>alert('Sukses mengupdate warung');</script>";
        } else {
            echo "<script>alert('Gagal mengupdate warung');</script>";
        }
    } 
}
?>
