<?php
session_start();
$userid = $_SESSION['UserID'];
include '../config/koneksi.php';
if ($_SESSION['status'] != 'login') {
	echo "<script>
	alert('Anda belum login!');
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
                <a href="../admin/index.php" class="navbar-brand p-0"> <h1 class="text-dark m-0">        Benz Gallery</h1> 
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
            <div class="container py-5">
                <div class="row justify-content-center py-5">
                    <div class="col-lg-10 pt-lg-5 mt-lg-5 text-center">
                        <h1 class="display-3 text-white mb-3">Hello Again, Please Welcome</h1>
                        <p class="fs-2 text-white mb-4 ">Upload  Your Photos Here! </p> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	
	
<div class ="container mt-3">
    <div class="row">
		<?php
	$query = mysqli_query($koneksi, "SELECT * FROM foto INNER JOIN user ON foto.UserID=user.UserID INNER JOIN album ON foto.AlbumID=album.AlbumID");
	while($data = mysqli_fetch_array($query)) {
	?>
	<div class="col-md-3 mt-2">
	<a type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['FotoID']?>">
	<div class="card mb-3">
	<img style="height: 12rem;" src="../assets/img/<?php echo $data ['LokasiFile'] ?>" class="card-img-top" title="<?php echo $data ['JudulFoto'] ?>">
	<div class="card-body">
  </div>
	<div class="card-footer text-center">
				<?php
				$fotoid = $data['FotoID'];
				$ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE FotoID='$fotoid' AND UserID='$userid'");
				$cekbatalsuka = mysqli_query($koneksi, "SELECT * FROM dislikefoto WHERE FotoID='$fotoid' AND UserID='$userid'");
				$cekcinta = mysqli_query($koneksi, "SELECT * FROM lovefoto WHERE FotoID='$fotoid' AND UserID='$userid'");
				if (mysqli_num_rows($cekcinta) == 1) { ?>
				<a href="../config/proses_love.php?fotoid=<?php echo $data ['FotoID'] ?>" type="submit" name="batalcinta"><i class="fa fa-heart m-1" style="color:red;"></i></a>
				
				<?php } else { ?>
				<a href="../config/proses_love.php?fotoid=<?php echo $data ['FotoID'] ?>" type="submit" name="cinta"><i class="fa-regular fa-heart m-1" style="color:red;"></i></a>
				
				<?php }
				$love = mysqli_query($koneksi, "SELECT * FROM lovefoto WHERE FotoID='$fotoid'");
				echo mysqli_num_rows($love). ' ';
				?>
				<?php
				if (mysqli_num_rows($ceksuka) == 1) { ?>
				<a href="../config/proses_like.php?fotoid=<?php echo $data ['FotoID'] ?>" type="submit" name="batalsuka"><i class="fa fa-thumbs-up m-1"style="color:blue;"></i></a>
				
				<?php } else { ?>
				<a href="../config/proses_like.php?fotoid=<?php echo $data ['FotoID'] ?>" type="submit" name="suka"><i class="fa-regular fa-thumbs-up m-1"style="color:blue;"></i></a>
				
				<?php }
				$like = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE FotoID='$fotoid'");
				echo mysqli_num_rows($like). ' ';
				?>
				<?php
				if (mysqli_num_rows($cekbatalsuka) == 1) { ?>
				<a href="../config/proses_dislike.php?fotoid=<?php echo $data ['FotoID'] ?>" type="submit" name="batal_batalsuka"><i class="fa fa-thumbs-down m-1"style="color:blue;"></i></a>
				
				<?php } else { ?>
				<a href="../config/proses_dislike.php?fotoid=<?php echo $data ['FotoID'] ?>" type="submit" name="batalsuka"><i class="fa-regular fa-thumbs-down m-1"style="color:blue;"></i></a>
				
				<?php }
				$dislike = mysqli_query($koneksi, "SELECT * FROM dislikefoto WHERE FotoID='$fotoid'");
				echo mysqli_num_rows($dislike). ' ';
				?>
				<a href="#" type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['FotoID']?>"><i class="fa-regular fa-comment"style="color:black;"></i></a> 
				<?php
				$jmlkomentar = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE FotoID='$fotoid'");
				echo mysqli_num_rows($jmlkomentar).' ';
				?>
		</a>
		<div class="modal fade" id ="komentar<?php echo $data['FotoID']?>" tabindex="-1" aria-labelledby ="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
			<div class="modal-body">
				<div class ="row">
					<div class="col-md-8">
					<img src="../assets/img/<?php echo $data ['LokasiFile'] ?>" class="card-img-top" title="<?php echo $data ['JudulFoto'] ?>">
				</div>
				<div class="col-md-4">
					<div class="m-2">
						<div class="overflow-auto">
							<div class="sticky-top">
								<strong><?php echo $data ['JudulFoto']?></strong><br>
								<span class="badge bg-secondary"><?php echo $data['NamaLengkap'] ?></span>
								<span class="badge bg-secondary"><?php echo $data['TanggalUnggah'] ?></span>
								<span class="badge bg-primary"><?php echo $data['NamaAlbum'] ?></span>
							</div>
							<hr>
							<p align="left">
								<?php echo $data['DeskripsiFoto'] ?>
							</p>
							<hr>
							<?php
				$fotoid = $data['FotoID'];
				$ceksuka = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE FotoID='$fotoid' AND UserID='$userid'");
				$cekbatalsuka = mysqli_query($koneksi, "SELECT * FROM dislikefoto WHERE FotoID='$fotoid' AND UserID='$userid'");
				$cekcinta = mysqli_query($koneksi, "SELECT * FROM lovefoto WHERE FotoID='$fotoid' AND UserID='$userid'");
				if (mysqli_num_rows($cekcinta) == 1) { ?>
				<a href="../config/proses_love.php?fotoid=<?php echo $data ['FotoID'] ?>" type="submit" name="batalcinta"><i class="fa fa-heart m-1" style="color:red;"></i></a>
				
				<?php } else { ?>
				<a href="../config/proses_love.php?fotoid=<?php echo $data ['FotoID'] ?>" type="submit" name="cinta"><i class="fa-regular fa-heart m-1" style="color:red;"></i></a>
				
				<?php }
				$love = mysqli_query($koneksi, "SELECT * FROM lovefoto WHERE FotoID='$fotoid'");
				echo mysqli_num_rows($love). ' ';
				?>
				<?php
				if (mysqli_num_rows($ceksuka) == 1) { ?>
				<a href="../config/proses_like.php?fotoid=<?php echo $data ['FotoID'] ?>" type="submit" name="batalsuka"><i class="fa fa-thumbs-up m-1"></i></a>
				
				<?php } else { ?>
				<a href="../config/proses_like.php?fotoid=<?php echo $data ['FotoID'] ?>" type="submit" name="suka"><i class="fa-regular fa-thumbs-up m-1"></i></a>
				
				<?php }
				$like = mysqli_query($koneksi, "SELECT * FROM likefoto WHERE FotoID='$fotoid'");
				echo mysqli_num_rows($like). ' ';
				?>
				<?php
				if (mysqli_num_rows($cekbatalsuka) == 1) { ?>
				<a href="../config/proses_dislike.php?fotoid=<?php echo $data ['FotoID'] ?>" type="submit" name="batal_batalsuka"><i class="fa fa-thumbs-down m-1"></i></a>
				
				<?php } else { ?>
				<a href="../config/proses_dislike.php?fotoid=<?php echo $data ['FotoID'] ?>" type="submit" name="batalsuka"><i class="fa-regular fa-thumbs-down m-1"></i></a>
				
				<?php }
				$dislike = mysqli_query($koneksi, "SELECT * FROM dislikefoto WHERE FotoID='$fotoid'");
				echo mysqli_num_rows($dislike). ' ';
				?>
				<a href="#" type="button" data-bs-toggle="modal" data-bs-target="#komentar<?php echo $data['FotoID']?>"><i class="fa-regular fa-comment"></i></a> 
				<?php
				$jmlkomentar = mysqli_query($koneksi, "SELECT * FROM komentarfoto WHERE FotoID='$fotoid'");
				echo mysqli_num_rows($jmlkomentar).' ';
				?>
							<?php
							$fotoid = $data['FotoID'];
							$komentar = mysqli_query($koneksi, "SELECT * FROM komentarfoto INNER JOIN user ON komentarfoto.UserID=user.UserID WHERE komentarfoto.FotoID='$fotoid'");
							while($row = mysqli_fetch_array($komentar)){
								?>
							<p align="left">
								<strong><?php echo $row['NamaLengkap']?></strong>
								<?php echo $row['IsiKomentar']?>
							</p>
							<?php } ?>
							<hr>
							<div class="sticky-bottom">
								<form action="../config/proses_komentar.php" method="POST">
									<div class="input-group">
										<input type="hidden" name="FotoID" value="<?php echo $data['FotoID']?>">
										<input type="text" name="isikomentar" class="form-control" placeholder="Tambah Komentar">
										<div class="input-group-prepend">
											<button type="submit" name="kirimkomentar" class=" btn btn-outline-primary">Kirim</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>

			</div>
		</div>
		</div>
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

<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>