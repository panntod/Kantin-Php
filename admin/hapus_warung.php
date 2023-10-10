<?php 
    if($_GET['id_warung']){
        include "server.php";
        $qry_hapus=mysqli_query($conn,"DELETE FROM warung WHERE id_warung='".$_GET['id_warung']."'");
        if($qry_hapus){
            echo "<script>alert('Sukses hapus warung');location.href='tampil_warung.php';</script>";
        } else {
            echo "<script>alert('Gagal hapus warung');location.href='tampil_warung.php';</script>";
        }
    }
?>