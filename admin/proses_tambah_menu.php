<?php
if ($_POST) {
    $nama_menu = $_POST['nama_menu'];
    $deskripsi_menu = $_POST['deskripsi_menu'];
    $gambar = $_POST['gambar'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];
    $id_warung = $_POST['id_warung'];

    if (empty($nama_menu)) {
        echo "<script>alert('nama siswa tidak boleh kosong');location.href='ubah_siswa.php';</script>";
    } else {
        include "server.php";
        $insert = mysqli_query($conn, "INSERT INTO `menu` (`id_menu`, `nama_menu`, `deskripsi_menu`, `gambar`, `jenis`, `id_warung`, `harga`) VALUES (NULL, '$nama_menu', '$deskripsi_menu', '$gambar', '$jenis', $id_warung, $harga);");
        if ($insert) {
            echo "<script>alert('Sukses insert Menu');location.href='ubah_siswa.php';</script>";
        } else {
            echo "<script>alert('Gagal insert Menu');location.href='ubah_siswa.php?id_menu=" . $id_menu . "';</script>";
        }
    }
}
?>