<?php
if ($_POST) {
    $id_warung = $_POST['id'];
    $nama_warung = $_POST['nama'];
    $deskripsi = $_POST['deskripsi'];

    // Validasi input
    if (empty($nama_warung) || empty($deskripsi)) {
        echo "<script>alert('Nama warung dan deskripsi tidak boleh kosong');location.href='tambah_warung.php';</script>";
    } else {
        include "server.php";

        // Gunakan parameterized query untuk menghindari SQL injection
        $stmt = $conn->prepare("UPDATE `warung` SET `nama_warung` = ?, `deskripsi` = ? WHERE `id_warung` = ?");
        $stmt->bind_param("ssi", $nama_warung, $deskripsi, $id_warung);

        if ($stmt->execute()) {
            echo "<script>alert('Sukses mengupdate warung');location.href='warung.php';</script>";
        } else {
            echo "<script>alert('Gagal mengupdate warung: " . $stmt->error . "');location.href='tambah_warung.php';</script>";
        }

        $stmt->close();
    }
}
?>
