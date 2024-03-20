<?php
session_start();
include 'koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> Benz Photography </title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&display=swap" rel="stylesheet">
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

 

    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar bg-success px-4 px-lg-5 py-3 py-lg-2">
         <img src="logoo.jpeg" style= "width: 50px; height: 50px;border-radius: 50%;">
                <h1 class="text-dark m-0">        Benz Gallery</h1>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
			  <div class="navbar-nav ms-auto py-0">
			  <div class="d-grid gap-2 d-md-block">
				<a href="login.php" class="btn btn-outline-dark rounded-pill py-2 px-4">Login</a></span>
				
				<a href="register.php" class="btn btn-outline-dark rounded-pill py-2 px-4">Register</a>
         </div>
            </div>
			</div>
        </nav>

        <div class="container-fluid bg-success ">
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white mb-3">Hello There, Wanna Join? Let's Go!</h1>
                        <p class="fs-2 text-white mb-4 ">Try it with a more memorable experience :D </p> 
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
<div class="container mt-3">
	<div class="row">
	<?php
	$query = mysqli_query($koneksi, "SELECT * FROM foto INNER JOIN user ON foto.UserID=user.UserID INNER JOIN album ON foto.AlbumID=album.AlbumID");
	while($data = mysqli_fetch_array($query)) {
	?>
			<div class="col-md-3 mt-2">
			<div class="card">
			<img style="height: 12rem;" src="assets/img/<?php echo $data ['LokasiFile'] ?>" class="card-img-top" title="<?php echo $data ['JudulFoto'] ?>">
			<div class="card-footer text-center">
				<a href="login.php" type="submit" name="cinta"><i class="fa-regular fa-heart m-1"style="color: red;"></i></a>
				
				<a href="login.php" type="submit" name="suka"><i class="fa-regular fa-thumbs-up m-1"style="color: blue;"></i></a>
				
				<a href="login.php" type="submit" name="batalsuka"><i class="fa-regular fa-thumbs-down m-1"style="color: blue;"></i></a>
				
				<a href="login.php"><i class="fa-regular fa-comment"style="color: black;"></i></a>  
				</div>
			</div>
		</div>
	<?php } ?>
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

<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>
</html>