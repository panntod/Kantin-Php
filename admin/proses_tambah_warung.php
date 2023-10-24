<?php
if ($_POST) {
    $nama_warung = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];

    $errorMessage = '';

    if (empty($nama_warung)) {
        $errorMessage = 'Nama warung tidak boleh kosong';
    } elseif (empty($deskripsi)) {
        $errorMessage = 'Deskripsi tidak boleh kosong';
    }

    if (empty($errorMessage)) {
        include "server.php";
        $query = "INSERT INTO warung (`id_warung`, `nama_warung`, `deskripsi`) VALUES (NULL, '$nama_warung', '$deskripsi')";

        $insert = mysqli_query($conn, $query);

        if ($insert) {
            echo "<script>alert('Sukses menambahkan warung');</script>";
            exit();
        } else {
            $errorMessage = 'Gagal menambahkan warung: ' . mysqli_error($conn);
        }
    }

    if (!empty($errorMessage)) {
        echo "<script>alert('$errorMessage');location.href='tambah_warung.php';</script>";
    }
}
?>
