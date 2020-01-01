<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>data siswa</title>
    <style>
        .tambah{
            text-decoration:none;
            padding:5px 10px;
            background:blue;
            border-radius:5px;
            color:white;
        }
        table{
            margin-top:10px;
        }
    </style>
</head>
<body>

    <h2>Kelola Data Siswa</h2>
    <a href="tambah_siswa.php" class="tambah">Tambah Data</a><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>nis</th>
            <th>nama</th>
            <th>kelas </th>
            <th>opsi</th>
        </tr>

        <?php 
            include 'koneksi.php';
            $no = 1;
            $select = mysqli_query($conn,"SELECT * FROM siswa");
            // mengecek jumlah baris
            if(mysqli_num_rows($select) >0){
            while($hasil = mysqli_fetch_array($select)){
        ?> 
            <tr>
                <td><?= $hasil['nis']; ?></td>
                <td><?= $hasil['nama']; ?></td>
                <td><?= $hasil['kelas']; ?></td>
                <td>
                    <a href="ubah_siswa.php?nis=<?= $hasil['nis'];?>">ubah</a> |
                    <a href="hapus_siswa.php?nis=<?= $hasil['nis'];?>" onclick="return confirm('hapus data?')">hapus</a>
                </td>
            </tr>
        <?php } }else{?>
            <tr align="center">
                <td colspan="4">Data kosong</td>
            </tr>
        <?php } ?>
    </table>
    
</body>
</html>