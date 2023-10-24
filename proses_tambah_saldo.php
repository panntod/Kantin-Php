<?php
session_start(); 

if ($_POST) {
    $id_siswa = $_SESSION['id_siswa'];
    $saldo = $_POST['saldo'];
    
    if (empty($saldo)) {
        $errorMessage = "Saldo tidak boleh kosong";
    } else {
        include "server.php"; 
        $query = "UPDATE siswa SET saldo_siswa = saldo_siswa + $saldo WHERE id_siswa = $id_siswa";

        $insert = mysqli_query($conn, $query);

        if ($insert) {
            // Mengambil data saldo terbaru setelah diperbarui
            $query_saldo = "SELECT saldo_siswa FROM siswa WHERE id_siswa = $id_siswa";
            $result_saldo = mysqli_query($conn, $query_saldo);
            $row_saldo = mysqli_fetch_assoc($result_saldo);

            // Mengatur ulang session saldo_siswa dengan nilai terbaru
            $_SESSION['saldo_siswa'] = $row_saldo['saldo_siswa'];

            header('Location: home.php');
            exit();
        } else {
            $errorMessage = "Gagal menambahkan saldo: " . mysqli_error($conn);
        }
    }
    
    if (isset($errorMessage)) {
        echo "<script>alert('$errorMessage');location.href='tambah_saldo.php';</script>";
    }
}
?>