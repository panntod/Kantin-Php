<?php
if ($_POST) {
    $nama_siswa = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Enkripsi password dengan md5()

    $errorMessage = '';

    if (empty($nama_siswa)) {
        $errorMessage = 'Nama siswa tidak boleh kosong';
    } elseif (empty($kelas)) {
        $errorMessage = 'Kelas tidak boleh kosong';
    } elseif (empty($email)) {
        $errorMessage = 'Email tidak boleh kosong';
    } elseif (empty($password)) {
        $errorMessage = 'Password tidak boleh kosong';
    }

    if (empty($errorMessage)) {
        include "server.php";
        $insert = mysqli_query($conn, "INSERT INTO siswa (nama, kelas, email, password) VALUES ('$nama_siswa', '$kelas', '$email', '$password')");

        if ($insert) {
            header('Location: login.php');
            exit();
        } else {
            $errorMessage = 'Gagal menambahkan siswa';
        }
    }

    if (!empty($errorMessage)) {
        echo "<script>alert('$errorMessage');location.href='tambah_siswa.php';</script>";
    }
}
?>
