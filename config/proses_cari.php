<?php
include 'koneksi.php';

if(isset($_GET['cari'])){
$search = $_GET['search'];
$query = "SELECT FotoID FROM foto WHERE FotoID LIKE '%".$search."%'";
}else{
 $query = ("SELECT * FROM galerifoto"); 
}
$no = 1;
 while($row = mysqli_fetch_array($query)){
	 $fotoid = $row['FotoID'];
		$query = mysqli_query($koneksi, " UPDATE FROM foto WHERE FotoID='$fotoid'");
		
		echo "<script>
		location.href ='../admin/index.php';
		</script>";
		}
 ?>