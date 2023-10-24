<?php
function isValidImageUrl($url) {
    $imageData = @getimagesize($url);
    return $imageData !== false;
}

if ($_POST) {
    $nama_menu = $_POST['nama_menu'];
    $deskripsi_menu = $_POST['deskripsi_menu'];
    $gambar = $_POST['gambar'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];
    $id_warung = $_POST['id_warung'];

    $errorMessage = '';

    if (empty($nama_menu)) {
        $errorMessage = 'Nama menu tidak boleh kosong';
    }

    if (isValidImageUrl($gambar)) {
        include "server.php";
        $query = "INSERT INTO `menu` (`id_menu`, `nama_menu`, `deskripsi_menu`, `gambar`, `jenis`, `id_warung`, `harga`) VALUES (NULL, '$nama_menu', '$deskripsi_menu', '$gambar', '$jenis', $id_warung, $harga)";

        $insert = mysqli_query($conn, $query);

        if ($insert) {
            echo "<script>alert('Sukses insert Menu');location.href='ubah_siswa.php';</script>";
            exit();
        } else {
            $errorMessage = 'Gagal insert Menu: ' . mysqli_error($conn);
        }
    } else {
        $errorMessage = 'URL gambar tidak valid';
    }

    if (!empty($errorMessage)) {
        echo "<script>alert('$errorMessage');location.href='tambah_menu.php';</script>";
    }
}
?>
