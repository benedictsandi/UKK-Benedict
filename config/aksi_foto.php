<?php
session_start();
include 'koneksi.php';

if (isset($_POST['tambah'])) {
	$judulfoto = $_POST['JudulFoto'];
	$deskripsifoto = $_POST['Deskripsi'];
	$tanggalunggah = date('y-m-d');
	$albumid = $_POST['AlbumID'];
	$userid = $_SESSION['UserID'];
	$foto = $_FILES['LokasiFile']['name'];
	$tmp = $_FILES['LokasiFile']['tmp_name'];
	$lokasi = '../assets/img/';
	$namafoto = rand().'-'.$foto;
	
	move_uploaded_file($tmp, $lokasi.$namafoto);
	
	$sql = mysqli_query($koneksi, "INSERT INTO foto VALUES('', '$judulfoto', '$deskripsifoto', '$tanggalunggah', '$namafoto', '$albumid','$userid')");
	
	echo "<script>
	alert('Data berhasil disimpan!');
	location.href='../admin/foto.php';
	</script>";
}

if(isset($_POST['edit'])) {
	$fotoid  = $_POST['FotoID'];
	$judulfoto = $_POST['JudulFoto'];
	$deskripsifoto = $_POST['DeskripsiFoto'];
	$tanggalunggah = date('y-m-d');
	$albumid = $_POST['AlbumID'];
	$userid = $_SESSION['UserID'];
	$foto = $_FILES['LokasiFile']['name'];
	$tmp = $_FILES['LokasiFile']['tmp_name'];
	$lokasi = '../assets/img/';
	$namafoto = rand().'-'.$foto;
	
if ($foto == null){
	$sql = mysqli_query($koneksi, "UPDATE foto SET judulfoto='$judulfoto', deskripsifoto='$deskripsifoto', tanggalunggah='$tanggalunggah', albumid= '$albumid' WHERE fotoid='$fotoid'");
}else {
	$query = mysqli_query($koneksi, "SELECT * FROM foto WHERE fotoid='$fotoid'");
	$data = mysqli_fetch_array($query);
	if (is_file('../assets/img/'.$data['LokasiFile'])){
		unlink('../assets/img/'.$data['LokasiFile']);
	}
	move_uploaded_file($tmp, $lokasi.$namafoto);
	$sql = mysqli_query($koneksi, "UPDATE foto SET judulfoto='$judulfoto', deskripsifoto='$deskripsifoto', tanggalunggah='$tanggalunggah', albumid= '$albumid' WHERE fotoid='$fotoid'");
}
echo "<script>
	alert('Data berhasil diperbarui!');
	location.href='../admin/foto.php';
	</script>";
}

if (isset($_POST['hapus'])) {
	$fotoid = $_POST['FotoID'];
	$query = mysqli_query($koneksi, "SELECT * FROM foto WHERE fotoid='$fotoid'");
	$data = mysqli_fetch_array($query);
	if (is_file('../assets/img/'.$data['LokasiFile'])){
		unlink('../assets/img/'.$data['LokasiFile']);
	}
	
	$sql = mysqli_query($koneksi, "DELETE FROM foto WHERE FotoID='$fotoid'");
	
	echo "<script>
	alert('Data berhasil dihapus!');
	location.href='../admin/foto.php';
	</script>";
}