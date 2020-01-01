<?php 
    include 'koneksi.php';
    $niss = $_GET['nis'];
    $ubah = mysqli_query($conn,"SELECT * FROM siswa WHERE nis='$niss'");
    $result = mysqli_fetch_array($ubah);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data</title>
    <style>
        .index{
            text-decoration:none;
            padding:5px 10px;
            background:blue;
            border-radius:5px;
            color:white;
        }
        form{
            margin-top:10px;
        }
    </style>
</head>
<body>
    <h2>Ubah data siswa</h2>
    <a href="index.php" class="index">Kembali</a>
    <form action="" method="post">
        <table>
            <tr>
                <td>nis</td>
                <td>:</td>
                <td><input type="text" name="nis" placeholder="NIS" value="<?= $result['nis'];?>"  required></td>
            </tr>
            <tr>
                <td>nama</td>
                <td>:</td>
                <td><input type="text" name="nama" placeholder="NAMA" value="<?= $result['nama'];?>" required></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td><input type="text" name="kelas" placeholder="KELAS" value="<?= $result['kelas'];?>" required></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><button type="submit" name="submit" onclick="ganti()">ubah data</button></td>
            </tr>
        </table>
    </form>
    <?php 
        if(isset($_POST["submit"])){
        $nis = $_POST["nis"];
        $nama = $_POST["nama"];
        $kelas = $_POST["kelas"];
        $update = mysqli_query($conn,"UPDATE siswa SET nis='$nis',nama='$nama',kelas='$kelas' WHERE nis='$niss'");
        // cek primary key ada / tdk
        $cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM siswa WHERE nis='$nis'"));
        if($cek > 0){
            
            if($update){
                echo "data berhasil diubah";
                // header("location : http://localhost/phpdasar/CRUD/index.php");
            }else{
                echo "data gagal diubah";
                echo $cek;
            }
        }else{
            // echo "<script>
            //         function ganti(){
            //         tanya = confirm('yakin ingin mengubah nis?');
            //         if(tanya == true){ return true;}
            //         else{ return false;}}
            //     </script>     
            // ";
            echo "nis sudah ada";
        }
        
        }
    ?>
</body>
</html>