<?php
    include 'database.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    else {
        die ("Error. No ID Selected!");    
    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Unduh</title>
    <link rel="stylesheet" type="text/css" href="index.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="left">
          <?php include 'menu.php';?>
    </div>
    <div class="right" style="font-family: cursive;">
          <h1>Arsip Surat</h1>
          <p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.<br>Klik "Lihat" pada kolom aksi untuk menampilkan surat.</p>
          Cari Surat: <form action="pencarian.php" method="get">
            <input type="text" name="keyword" placeholder="search"
                    autofocus autocomplete="off" 
                    style="font-family: cursive;
                    font-size: 14px;
                    line-height: 20px;
                    border-radius: 3px;
                    margin: 13px auto 0;
                    padding: 1px 0 4px;  
                    text-decoration: none;
                    padding: 10px 20px;">
            <button class="btn btn-default" name = "cari" 
                    style="background-color: #FA8072;
                    color: white;
                    font-family: cursive;
                    font-size: 14px;
                    line-height: 20px;
                    border-radius: 3px;
                    margin: 13px auto 0;
                    padding: 1px 0 4px;
                    text-align: center;
                    text-decoration: none;
                    padding: 10px 20px;">Cari</button>
        </form>
        <br>
        <table border="2">
          <tr>
               <th>Nomor Surat</th>
               <th>Kategori</th>
               <th>Judul</th>
               <th>Waktu Pengarsipan</th>
               <th>Aksi</th>
          </tr>
          <?php 
          $no = 1;
          include 'database.php';
          $data = mysqli_query($koneksi,"SELECT * FROM arsip_surat");
          while($d = mysqli_fetch_array($data)){
               ?>
               <tr>
                    <td><?php echo $d['nomor_surat']; ?></td>
                    <td><?php echo $d['kategori']; ?></td>
                    <td><?php echo $d['judul']; ?></td>
                    <td><?php echo $d['waktu_pengarsipan']; ?></td>
                    <td>
                         <a class="btn btn-default" name = "hapus" 
                    style="background-color: #B22222;
                    color: white;
                    font-family: cursive;
                    font-size: 14px;
                    line-height: 10px;
                    border-radius: 3px;
                    margin: 13px auto 0;
                    padding: 1px 0 4px;
                    text-align: center;
                    text-decoration: none;
                    padding: 1px 10px;"

                    href="hapus.php?id=<?php echo $d['id']; ?>" onclick="return confirm('Apakah anda yakin akan menghapus arsip surat ini?')">Hapus</a>

                    <a class="btn btn-default" name = "unduh" 
                    style="background-color: #FFD700;
                    color: white;
                    font-family: cursive;
                    font-size: 14px;
                    line-height: 10px;
                    border-radius: 3px;
                    margin: 13px auto 0;
                    padding: 1px 0 4px;
                    text-align: center;
                    text-decoration: none;
                    padding: 1px 10px;"
                    href="unduh.php?id=<?php echo $d['id']; ?>">Unduh</a>

                    <a class="btn btn-default" name = "lihat" 
                    style="background-color: #1E90FF;
                    color: white;
                    font-family: cursive;
                    font-size: 14px;
                    line-height: 10px;
                    border-radius: 3px;
                    margin: 13px auto 0;
                    padding: 1px 0 4px;
                    text-align: center;
                    text-decoration: none;
                    padding: 1px 10px;"
                    href="lihat.php?id=<?php echo $d['id']; ?>">Lihat</a>
                    </td>
               </tr>
               <?php 
          }
          ?>
     </table>

<br>
     <a href="tambah.php" class="btn btn-default" name = "arsip" 
                    style="background-color: #FA8072;
                    color: white;
                    font-family: cursive;
                    font-size: 14px;
                    line-height: 10px;
                    border-radius: 3px;
                    margin: 13px auto 0;
                    padding: 1px 0 4px;
                    text-align: center;
                    text-decoration: none;
                    padding: 10px 10px;"
                    >Arsipkan Surat</a>

     </div>

    <?php
        $sql = mysqli_query($koneksi, "SELECT * FROM arsip_surat WHERE id = '$id'");
        while ($data = mysqli_fetch_array($sql)) {
    ?>
    <table>
        <tr>
            <td>
                <?php $data["file_surat"]; ?>
            </td>
        </tr>
    </table>
    <?php
        }

    ?>
    <script>
        window.print()

    </script>
</body>
</html>