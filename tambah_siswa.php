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
    <h2>Tambah data siswa</h2>
    <a href="index.php" class="index">Kembali</a>
    <form action="" method="post">
        <table>
            <tr>
                <td>nis</td>
                <td>:</td>
                <td><input type="text" name="nis" placeholder="NIS" required></td>
            </tr>
            <tr>
                <td>nama</td>
                <td>:</td>
                <td><input type="text" name="nama" placeholder="NAMA" required></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>:</td>
                <td><input type="text" name="kelas" placeholder="KELAS" required></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><button type="submit" name="submit">Submit</button></td>
            </tr>
        </table>
    </form>
    <?php 
        include 'koneksi.php';
        if(isset($_POST["submit"])){
        $nis = $_POST["nis"];
        $nama = $_POST["nama"];
        $kelas = $_POST["kelas"];
        
        $cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM siswa WHERE nis='$nis'"));
        if($cek > 0){
            echo $cek;
            echo " nis sudah terdaftar";
        }
        else{
            $insert = mysqli_query($conn,"INSERT INTO siswa VALUES ('$nis','$nama','$kelas')");
            if($insert){
                echo "data berhasil disimpan";
            }else{
                echo "data gagal disimpan";
            }
        }
        
        }
    ?>
</body>
</html>