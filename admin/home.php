<?php
session_start();
$userid = $_SESSION['UserID'];
include '../config/koneksi.php';
if ($_SESSION['status'] != 'login') {
  echo "<script>
    alert('Anda Belum Login!');
    location.href='../index.php';
  </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Photo Gallery </title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
	<link href="img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

 

     <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar bg-success px-4 px-lg-5 py-3 py-lg-2">
             <img src="logoo.jpeg" style= "width: 50px; height: 50px;border-radius: 50%;">
                <a href="../admin/index.php" class="navbar-brand p-0">  <h1 class="text-dark m-0">        Benz Gallery</h1> 
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
			  <div class="navbar-nav ms-auto py-0">
                    <a href="album.php" class="nav-item nav-link">New Album</a>
                    <a href="foto.php" class="nav-item nav-link">Upload Photo</a>
					<a href="home.php" class="nav-item nav-link ">My Album</a>
                    <a href="profile.php" class="nav-item nav-link">My Profile</a>
                </div>
				<a href="../config/aksi_logout.php" class="btn btn-outline-dark rounded-pill py-2 px-4">Logout</a>
         </div>
            </div>
			</div>
        </nav>


        <div class="container-fluid bg-success ">
	<h2><div class="badge text-bg-dark text-wrap" style="width: 10rem;">
    Album :
   </div></h2>
   <a href="home.php" class="btn btn-dark rounded-pill py-2 px-4">Back</a>
	<?php
	$album = mysqli_query($koneksi, "SELECT * FROM album WHERE UserID='$userid'");
	while($row = mysqli_fetch_array($album)) { ?>
	<a href ="home.php?AlbumID=<?php echo $row['AlbumID'] ?>" class ="btn btn-dark"> 
	<?php echo $row['NamaAlbum'] ?></a>
	
	<?php } ?>

   <div class="row">
	<?php
	if (isset($_GET['AlbumID'])) {
	$albumid  = $_GET['AlbumID'];
	$query = mysqli_query($koneksi, "SELECT * FROM foto WHERE UserID='$userid' AND AlbumID='$albumid'");
	while($data = mysqli_fetch_array($query)) { ?>
	<div class="col-md-3 mt-2">
		<div class="card">
			<img style="height: 12rem;" src="../assets/img/<?php echo $data ['LokasiFile'] ?>" class="card-img-top" title="<?php echo $data ['JudulFoto'] ?>">
			<div class="card-footer text-center">
			<div class="card-body bg-success-sublte">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
  </div>
			</div>
		</div>
	</div>
	
	<?php } } else { 
	
	$query = mysqli_query($koneksi, "SELECT * FROM foto WHERE UserID='$userid'");
	while($data = mysqli_fetch_array($query)) {
	?>

	<div class="col-md-4 mt-3">
		<div class="card">
			<img style="height: 15rem;" src="../assets/img/<?php echo $data ['LokasiFile'] ?>" class="card-img-top" title="<?php echo $data ['JudulFoto'] ?>">
			<div class="card-footer text-center">
			</div>
		</div>
	</div>

	<?php } } ?>
	</div>
	</div>

<!-- Footer Start -->
    <div class="container-fluid bg-dark text-light footer pt-3 mt-3">
        <div class="container py-3">
            <div class="row g-3">
                <div class="col-lg-3 col-md-6 ">
                    <h4 class="text-white mb-3">Contact</h4>
                    <p class="mb-2"><i class="fa fa-phone-alt me-1"></i>(+62) 81262422589</p>
                    <p class="mb-2"><i class="fa fa-envelope me-1"></i>benedictsandi28@gmail.com</p>
					</div>
					 <div class="col g-3">
                    <div class="col-lg-3 col-md-4">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://twitter.com/always_benzz"><i class="fab fa-twitter fw-normal"></i></a>
                    </div>
					</div>
					<div class="col g-3">
                    <div class="col-lg-3 col-md-6">
					<a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.facebook.com/benedict.ketje"><i class="fab fa-facebook-f fw-normal"></i></a>
                    </div>
					</div>
					<div class="col g-3">
                    <div class="col-lg-2 col-md-6">
					<a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="https://www.tiktok.com/@benzzzqrisxyz?_t=8kZ35NOYDQt&_r=1"><i class="fab fa-tiktok fw-normal"></i></a>
                    </div>
					</div>
					<div class="col g-3">
                    <div class="col-lg-3 col-md-6">
					<a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-5" href="https://www.instagram.com/always_benz"><i class="fab fa-instagram fw-normal"></i></a>
                    </div>
					</div>
					<div class="col g-3">
                    <div class="col-lg-3 col-md-6">
					<a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href="https://youtube.com/@Benzz_qrisxyz?si=O3iv_I3hLa2PBjrz"><i class="fab fa-youtube fw-normal"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-20 justify-content-center text-center">
                        <p> &copy;  Benz Gallery</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>