<?php
session_start();
include 'koneksi.php';
$fotoid = $_GET['fotoid'];
$userid = $_SESSION['UserID'];

$ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE FotoID='$fotoid' AND UserID='$userid'");

if (mysqli_num_rows($ceksuka) == 1) {
	while($row = mysqli_fetch_array($ceksuka)) {
		$likeid = $row['LikeID'];
		$query = mysqli_query($koneksi, "DELETE FROM likefoto WHERE LikeID='$likeid'");
		
		echo "<script>
		location.href ='../admin/index.php';
		</script>";
		echo "<script>
		location.href ='../admin/home.php';
		</script>";
		}
		
	} else {
		$tanggallike = date('y-m-d');
		$query = mysqli_query($koneksi, "INSERT INTO likefoto VALUES ('', '$fotoid', '$userid', '$tanggallike')");

		echo "<script>
		location.href ='../admin/index.php';
		</script>";
		echo "<script>
		location.href ='../admin/home.php';
		</script>";
	}

?>