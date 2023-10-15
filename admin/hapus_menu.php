<?php 
    if($_GET['id_menu']){
        include "server.php";
        $qry_hapus=mysqli_query($conn,"DELETE FROM menu WHERE id_menu='".$_GET['id_menu']."'");
        if($qry_hapus){
            echo "<script>alert('Sukses hapus menu');location.href='tampil_warung.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus menu');location.href='tampil_warung.php';</script>";
        }
    }
?>