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
<html lang="en">
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
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<div class="card mt-2 bg-success-subtle">
				<div class="card-header"> Add Photo </div>
					<div class="card-body">
					<form action="../config/aksi_foto.php" method="POST" enctype= "multipart/form-data">
					  <label class="form-label"> Title </label>
					  <input type="text" name="JudulFoto" class="form-control" required>
					  <label class="form-label"> Description </label>
					  <textarea class="form-control" name="Deskripsi" required></textarea>
					   <label class="form-label"> Album </label>
					   <select class="form-control" name="AlbumID" required>
					   <?php
					   $sql_album = mysqli_query($koneksi, "SELECT * FROM album WHERE Userid='$userid'");
					   while($data_album = mysqli_fetch_array($sql_album)){?>
					   <option value="<?php echo $data_album['AlbumID'] ?>"><?php echo $data_album['NamaAlbum'] ?></option>
					   <?php }?>
					   </select>
					     <label class="form-label"> File </label>
						 <input type="file" name="LokasiFile" class="form-control" required>
					  <button type="submit" class="btn btn-dark mt-2" name="tambah"> Add </button>
					</form>
					</div>
			</div>
		</div>

    <div class="col-md-8">
		<div class="card mt-2 bg-success-subtle">
			<div class="card-header"> Data Photo </div>
				<div class="card-body">
					<table class="table">
						<thead>
							<tr>
								<th> # </th>
								<th> Photo </th>
								<th> Title </th>
								<th> Description  </th>
								<th> Date </th>
								<th> Action </th>
							</tr> 
						</thead>
					<tbody>
						<?php
						$no = 1;
						$userid = $_SESSION['UserID'];
						$sql = mysqli_query($koneksi, "SELECT * FROM foto WHERE UserID='$userid'");
						while($data = mysqli_fetch_array($sql)) {
						?>
							<tr>
								<td> <?php echo $no++ ?> </td>
								<td> <img src="../assets/img/<?php echo $data['LokasiFile'] ?>"
								width="100"></td>
								<td> <?php echo $data['JudulFoto'] ?> </td>
								<td> <?php echo $data['DeskripsiFoto'] ?> </td>
								<td> <?php echo $data['TanggalUnggah'] ?> </td>
								<td>
								<button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#edit<?php echo $data['FotoID'] ?>"> Edit </button>

									<div class="modal fade" id="edit<?php echo $data['FotoID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h1 class="modal-title fs-5" id="exampleModalLabel"> Edit Data </h1>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												 </div>
												 <div class="modal-body">
													<form action="../config/aksi_foto.php" method="POST"
													enctype="multipart/form-data">
														<input type="hidden" name="FotoID" value="<?php echo $data['FotoID'] ?>">
														<label class="form-label"> Title </label>
														<input type="text" name="JudulFoto" value="<?php echo $data['JudulFoto'] ?>" class="form-control" required>
														<label class="form-label"> Description </label>
														<textarea class="form-control" name="DeskripsiFoto" required>
														<?php echo $data['DeskripsiFoto']; ?>
														</textarea>
														 <label class="form-label"> Album </label>
														   <select class="form-control" name="AlbumID">
														   <?php
														   $sql_album = mysqli_query($koneksi, "SELECT * FROM album WHERE UserID='$userid'");
														   while($data_album = mysqli_fetch_array($sql_album)){?>
														   <option <?php if ($data_album['AlbumID'] == $data['AlbumID']) { ?> selected ="selected" <?php } ?> 
														   value="<?php echo $data_album['AlbumID'] ?>"><?php echo $data_album['NamaAlbum'] ?></option>
														   <?php }?>
														   </select>
														     <label class="form-label"> Photo </label>
															 <div class = "row">
															  <div class = "col-md-4">
															   <img src="../assets/img/<?php echo $data['LokasiFile'] ?>"
															   width="100">
															 </div>
															 <div class = "col-md-8">
															 <label class="form-label">Change File</label>
															 <input type="file" class="form-control"name="LokasiFile">
												</div>
												 </div>
												 </div>
												 <div class="modal-footer">
													<button type="submit" name="edit" class="btn btn-dark"> Edit Data </button>
													</form>
												 </div>
											</div>
										</div>
									</div>
									
									<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['FotoID'] ?>"> Delete </button>

									<div class="modal fade" id="hapus<?php echo $data['FotoID'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h1 class="modal-title fs-5" id="exampleModalLabel"> Delete Data </h1>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												 </div>
												 <div class="modal-body">
													<form action="../config/aksi_foto.php" method="POST">
														<input type="hidden" name="FotoID" value="<?php echo $data['FotoID'] ?>">
														Are you sure delete this photo? <strong> <?php echo $data['JudulFoto'] ?> </strong>
												 </div>
												 <div class="modal-footer">
													<button type="submit" name="hapus" class="btn btn-dark"> Delete </button>
													</form>
												 </div>
											</div>
										</div>
									</div>
								</td>
							</tr>
						<?php } ?>
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	
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
                        <p> &copy; Benz Gallery</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

<script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</body>
</html>