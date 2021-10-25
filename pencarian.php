<?php include 'database.php'; ?>
<?php 
	$keyword = $_GET["keyword"];
	$semuadata = array();
	$ambil = $koneksi->query("SELECT * FROM arsip_surat WHERE judul LIKE '%$keyword%'");
	while ($pecah = $ambil->fetch_assoc()) {
	 	$semuadata[] = $pecah;
	} 
?>

<!DOCTYPE html>
<html>
<head>
    <title>Arsip</title>
	<link rel="stylesheet" type="text/css" href="index.css">
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
                    font-size: 16px;
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
                    font-size: 16px;
                    line-height: 20px;
                    border-radius: 3px;
                    margin: 13px auto 0;
                    padding: 1px 0 4px;
                    text-align: center;
                    text-decoration: none;
                    padding: 10px 20px;">Cari</button>
        </form>

        <br>
        
        <?php if (empty($semuadata)): ?>
            <div>Pencarian untuk "<strong><?php echo $keyword ?></strong>" tidak ditemukan</div>
        <?php endif ?>

        <br>
        <div>
            <?php foreach ($semuadata as $key => $value): ?>
        <table border="2">
        <tr>
            <th>Nomor Surat</th>
            <th>Kategori</th>
            <th>Judul</th>
            <th>Waktu Pengarsipan</th>
            <th>Aksi</th>
        </tr>
            <tr>
                <td><?php echo $value['nomor_surat']; ?></td>
                <td><?php echo $value['kategori']; ?></td>
                <td><?php echo $value['judul']; ?></td>
                <td><?php echo $value['waktu_pengarsipan']; ?></td>
                <td>
                    <a class="btn btn-default" name = "hapus" 
                    style="background-color: #B22222;
                    color: white;
                    font-family: cursive;
                    font-size: 16px;
                    line-height: 10px;
                    border-radius: 3px;
                    margin: 13px auto 0;
                    padding: 1px 0 4px;
                    text-align: center;
                    text-decoration: none;
                    padding: 1px 10px;"
                    href="hapus.php?id=<?php echo $d['id']; ?>">Hapus</a>

                    <a class="btn btn-default" name = "unduh" 
                    style="background-color: #FFD700;
                    color: white;
                    font-family: cursive;
                    font-size: 16px;
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
                    font-size: 16px;
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
            
    </table>
    <br>
    <a href="tambah.php" class="btn btn-default" name = "arsip" 
                    style="background-color: #FA8072;
                    color: white;
                    font-family: cursive;
                    font-size: 16px;
                    line-height: 10px;
                    border-radius: 3px;
                    margin: 13px auto 0;
                    padding: 1px 0 4px;
                    text-align: center;
                    text-decoration: none;
                    padding: 10px 10px;"
                    >Arsipkan Surat</a>
    <?php 
        endforeach
        ?>
        </div>
    </div>

</body>
</html>