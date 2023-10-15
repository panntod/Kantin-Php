<?php
if ($_POST) {
    $id = $_POST['id_menu'];
    $nama_menu = $_POST['nama_menu'];
    $deskripsi_menu = $_POST['deskripsi_menu'];
    $gambar = $_POST['gambar'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];

    if (empty($nama_menu)) {
        echo "<script>alert('nama menu tidak boleh kosong');location.href='ubah_siswa.php';</script>";
    } else {
        include "server.php";
        $update = mysqli_query($conn, "UPDATE `menu` SET `nama_menu` = '$nama_menu', `deskripsi_menu` = '$deskripsi_menu', `gambar` = '$gambar', harga = '$harga' WHERE `menu`.`id_menu` = $id;");
        if ($update) {
            echo "<script>alert('Sukses update Menu');location.href='ubah_siswa.php';</script>";
        } else {
            echo "<script>alert('Gagal update Menu');location.href='ubah_siswa.php?id_menu=" . $id_menu . "';</script>";
        }
    }
}
?>