<?php
session_start();
include 'koneksi.php';
$fotoid = $_GET['fotoid'];
$userid = $_SESSION['UserID'];

$cekcinta = mysqli_query($koneksi, "SELECT * FROM lovefoto WHERE FotoID='$fotoid' AND UserID='$userid'");

if (mysqli_num_rows($cekcinta) == 1) {
	while($row = mysqli_fetch_array($cekcinta)) {
		$loveid = $row['LoveID'];
		$query = mysqli_query($koneksi, "DELETE FROM lovefoto WHERE LoveID='$loveid'");
		
		echo "<script>
		location.href ='../admin/index.php';
		</script>";
		}
		
	} else {
		$tanggallove = date('y-m-d');
		$query = mysqli_query($koneksi, "INSERT INTO lovefoto VALUES ('', '$fotoid', '$userid', '$tanggallove')");

		echo "<script>
		location.href ='../admin/index.php';
		</script>";
	}

?>