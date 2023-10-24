<?php
if ($_POST) {
    $id = $_POST['id_menu'];
    $nama_menu = $_POST['nama_menu'];
    $deskripsi_menu = $_POST['deskripsi_menu'];
    $gambar = $_POST['gambar'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];

    $errorMessage = '';

    if (empty($nama_menu)) {
        $errorMessage = 'Nama menu tidak boleh kosong';
    }

    if (empty($errorMessage)) {
        include "server.php";
        $update = mysqli_query($conn, "UPDATE `menu` SET `nama_menu` = '$nama_menu', `deskripsi_menu` = '$deskripsi_menu', `gambar` = '$gambar', harga = '$harga' WHERE `menu`.`id_menu` = $id");

        if ($update) {
            echo "<script>alert('Sukses update Menu');location.href='ubah_siswa.php';</script>";
            exit();
        } else {
            $errorMessage = 'Gagal update Menu: ' . mysqli_error($conn);
        }
    }

    if (!empty($errorMessage)) {
        echo "<script>alert('$errorMessage');location.href='ubah_siswa.php?id_menu=" . $id . "';</script>";
    }
}
?>
