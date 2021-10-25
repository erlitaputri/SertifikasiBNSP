<?php include 'database.php'; ?>
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
		<h1>Arsip Surat >> Unggah</h1>
		<p>Unggah surat yang telah terbit pada form ini untuk diarsipkan.<br>
               Catatan:<br>
               - Gunakan file berformat PDF</p>
		<form action="" method="post" enctype="multipart/form-data">
			<table>
				<tr>
					<td>Nomor Surat</td>
					<td>  </td>
					<td><input type="text" name="nomor_surat"></td>
				</tr>
				<tr>
					<td>Kategori</td>
					<td>  </td>
					<td><select name="kategori">
                    <option value="Undangan">Undangan</option>
                    <option value="Pengumuman">Pengumuman</option>
                    <option value="Nota Dinas">Nota Dinas</option>
                    <option value="Pemberitahuan">Pemberitahuan</option>
               		</select></td>
				</tr>
				<tr>
					<td>Judul</td>
					<td>  </td>
					<td><input type="text" name="judul"></td>
				</tr>
				<tr>
					<td>File Surat (PDF)</td>
					<td>  </td>
					<td><input type="file" name="file_surat"></td>
				</tr>
				<tr>
					<td><a class="btn btn-default" name = "kembali" 
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
                    href="index.php"> << Kembali </a></td>
					<td></td>
					<td><input type="submit" name="kirim" value="kirim"
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
                    padding: 10px 10px;"></td>
				</tr>
			</table>
		</form>
		<?php 
			if(isset($_POST['kirim'])){
				$nomor_surat = $_POST['nomor_surat'];
				$kategori = $_POST['kategori'];
				$judul = $_POST['judul'];
				$waktu_pengarsipan = date("Y-m-d H:i:s");
				$file_surat = $_FILES['file_surat']['name'];
				$source = $_FILES['file_surat']['tmp_name'];
				$folder = './file/';

				move_uploaded_file($source, $folder.$file_surat);
				$insert = mysqli_query($koneksi, "INSERT INTO arsip_surat VALUES (NULL, '$nomor_surat', '$kategori', '$judul', '$waktu_pengarsipan', '$file_surat')");

				if ($insert) {
					echo 'Data Berhasil Disimpan';
				}
				else{
					echo 'Gagal upload';
				}
			}
		?>
	</div>
</body>
</html>