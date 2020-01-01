<?php 
    include 'koneksi.php';
    
    if(isset($_GET['nis'])){
        $nis = $_GET["nis"];
        $hapus = mysqli_query($conn,"DELETE FROM siswa WHERE nis='$nis'");
        header('location:index.php');
    }
?>