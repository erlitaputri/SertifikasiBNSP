<?php 
	include 'database.php'; 
	if(isset($_GET['id'])){
        $id = $_GET['id'];
    }
    else {
        die ("Error. No ID Selected!");    
    }

    $query = mysqli_query($koneksi, "SELECT * FROM arsip_surat WHERE id = '$id'");
    $result = mysqli_fetch_array($query);

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
		<h1>Arsip Surat >> Lihat</h1>

		<table border="0" cellpadding="4">
        <tr>
            <td>Nomor</td>
            <td>: <?php echo $result['nomor_surat']?></td>
        </tr>
        <tr>
            <td>Kategori</td>
            <td>: <?php echo $result['kategori']?></td>
        </tr>
        <tr>
            <td>Judul</td>
            <td>: <?php echo $result['judul']?></td>
        </tr>
        <tr>
            <td>Waktu Unggah</td>
            <td>: <?php echo $result['waktu_pengarsipan']?></td>
        </tr>
    </table>
    <table>
		<tr>
			<td>
                <object data="file/<?php echo $result['file_surat']  ?>" width="600" height="400"></object>
			</td></tr>
    </table>
        <table>
        <tr height="40">
            <td></td>
            <td>   <a class="btn btn-default" name = "kembali" 
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
                    padding: 5px 10px;"
                    href="index.php"> << Kembali</a></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><a class="btn btn-default" name = "unduh" 
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
                    padding: 5px 10px;"
                    href="unduh.php?id=<?php echo $result['id']; ?>">Unduh</a></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
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
                    padding: 5px 10px;"
                    href="edit.php?id=<?php echo $result['id']; ?>">Edit/Ganti File</a>
                    </td>
        </tr>
        </table>
	</div>
</body>
</html>