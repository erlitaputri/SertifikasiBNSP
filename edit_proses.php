<?php
	include('database.php');
	if (isset($_POST["nomor_surat"])) 

		$id = $_POST["id"];
		$nomor_surat = $_POST["nomor_surat"];
		$kategori = $_POST["kategori"];
		$judul = $_POST["judul"];
		$waktu_pengarsipan = $_POST["waktu_pengarsipan"];
		$file_surat = $_FILES["file_surat"];

		$message = "";

		if ($nomor_surat=="") {
			$message = "Nama Barang Harus Diisi!";
		}else if ($kategori=="") {
			$message = "Deskripsi Barang Harus Diisi!";
		}else if ($judul=="") {
			$message = "Harga Barang Harus Diisi!";
		}else if ($waktu_pengarsipan=="") {
			$message = "Harga Barang Harus Diisi!";
		}else{
			if (isset($file_surat["tmp_name"]) && $file_surat["tmp_name"]!=="") {
				$filePath = "file/".basename($file_surat["name"]);
				move_uploaded_file($file_surat["tmp_name"], $filePath);

				$koneksi->query("UPDATE arsip_surat SET file_surat='".$filePath."' WHERE id = ".$id);

			}

				$koneksi->query("UPDATE arsip_surat SET nomor_surat='".$nomor_surat."',kategori='".$kategori."',judul='".$judul."',waktu_pengarsipan='".$waktu_pengarsipan."' WHERE id=".$id);

				$message="Berhasil Mengedit Barang!";
		}
		$_SESSION["message"] = $message;

		header("location:edit.php?id=".$id);
		exit();
	

	header("location:edit.php");
	exit();
?>