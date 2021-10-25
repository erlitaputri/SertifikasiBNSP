<?php
	include 'database.php';
	$delete = mysqli_query($koneksi, "DELETE FROM arsip_surat WHERE id ='".$_GET['id']."'");
	if($delete){
		header('location:index.php');
	}else{
		echo 'Gagal hapus';
	}
?>