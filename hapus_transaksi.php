<?php 
    if($_GET['id_pembayaran']){
        include "server.php";
        $qry_hapus=mysqli_query($conn,"DELETE FROM pembayaran WHERE id_pembayaran='".$_GET['id_pembayaran']."'");
        if($qry_hapus){
            echo "<script>alert('Sukses menghapus riwayat transaksi');location.href='transaksi.php';</script>";
        } else {
            echo "<script>alert('Gagal menghapus riwayat transaksi');location.href='transaksi.php';</script>";
        }
    }
?>