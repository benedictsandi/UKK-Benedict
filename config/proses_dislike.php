<?php
session_start();
include 'koneksi.php';
$fotoid = $_GET['fotoid'];
$userid = $_SESSION['UserID'];

$cekbatalsuka = mysqli_query($koneksi, "SELECT * FROM dislikefoto WHERE FotoID='$fotoid' AND UserID='$userid'");

if (mysqli_num_rows($cekbatalsuka) == 1) {
	while($row = mysqli_fetch_array($cekbatalsuka)) {
		$dislikeid = $row['DisLikeID'];
		$query = mysqli_query($koneksi, "DELETE FROM dislikefoto WHERE DisLikeID='$dislikeid'");
		
		echo "<script>
		location.href ='../admin/index.php';
		</script>";
		}
		
	} else {
		$tanggaldislike = date('y-m-d');
		$query = mysqli_query($koneksi, "INSERT INTO dislikefoto VALUES ('', '$fotoid', '$userid', '$tanggaldislike')");

		echo "<script>
		location.href ='../admin/index.php';
		</script>";
	}

?>