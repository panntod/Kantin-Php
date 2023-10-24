<?php
function loginUser($email, $password) {
    include "server.php";
    $qry_login = mysqli_query($conn, "SELECT * FROM siswa WHERE email = '$email' AND password = '" . md5($password) . "'");

    if (mysqli_num_rows($qry_login) > 0) {
        $dt_login = mysqli_fetch_array($qry_login);
        return $dt_login;
    }
    return null;
}

function startSession($userData, $role) {
    session_start();
    $_SESSION['id_siswa'] = $userData['id_siswa'];
    $_SESSION['saldo_siswa'] = $userData['saldo_siswa'];
    $_SESSION['nama'] = $userData['nama'];
    $_SESSION['kelas'] = $userData['kelas'];
    $_SESSION['role'] = $role;
    $_SESSION['status_login'] = true;
}

if ($_POST) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $errorMessages = [];

    if (empty($email)) {
        $errorMessages[] = "Email tidak boleh kosong";
    }
    if (empty($password)) {
        $errorMessages[] = "Password tidak boleh kosong";
    }

    if (empty($errorMessages)) {
        $userData = loginUser($email, $password);
        if ($userData) {
            if ($userData['role'] == 'admin') {
                startSession($userData, 'admin');
                header("location: admin/home.php");
            } elseif ($userData['role'] == 'siswa') {
                startSession($userData, 'siswa');
                header("location: home.php");
            } else {
                $errorMessages[] = "Role tidak valid";
            }
        } else {
            $errorMessages[] = "Email dan Password tidak benar";
        }
    }

    if (!empty($errorMessages)) {
        // Tampilkan pesan kesalahan
        foreach ($errorMessages as $errorMessage) {
            echo "<script>alert('$errorMessage');</script>";
        }
        header("location: login.php");
    }
}
?>
