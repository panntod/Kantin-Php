<?php
if ($_POST) {
    $id = $_POST['id_siswa'];
    $nama_siswa = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Enkripsi password dengan md5()

    if (empty($nama_siswa) || empty($kelas) || empty($email)) {
        echo "<script>alert('Nama siswa, kelas, dan email tidak boleh kosong');location.href='ubah_siswa.php';</script>";
    } else {
        include "server.php";
        
        if (empty($password)) {
            $update = mysqli_query($conn, "UPDATE siswa SET nama = '$nama_siswa', kelas = '$kelas', email = '$email' WHERE id_siswa = '$id'");
        } else {
            $update = mysqli_query($conn, "UPDATE siswa SET nama = '$nama_siswa', kelas = '$kelas', email = '$email', password = '$password' WHERE id_siswa = '$id'");
        }

        if ($update) {
            echo "<script>alert('Sukses update siswa');location.href='ubah_siswa.php';</script>";
        } else {
            echo "<script>alert('Gagal update siswa: " . mysqli_error($conn) . "');location.href='ubah_siswa.php?id_siswa=" . $id . "';</script>";
        }
    }
}
?>
