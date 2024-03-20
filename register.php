<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title> Photo Gallery </title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<div class="container-fluid position-relative p-2">
        <nav class="navbar navbar-expand-lg navbar-success px-4 px-lg-5 py-3 py-lg-0">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
			 
				<a href="index.php" class="btn btn-dark rounded-pill py-2 px-4">Back</a>
            </div>
			</div>
        </nav>
		
<div class="container d-flex justify-content-center align-items-center min-vh-50">


       <div class="row border rounded-5 p-3  shadow box-area">

       <div class="col-md-15 right-box">
          <div class="row align-items-center">
                <div class="header-text mb-4">
                     <h2>Hello How's Your Day?</h2>
                     <p>Register Here!</p>
                </div>
                <form action="config/aksi_register.php" method="POST">
				   <label class="form-label"> Username </label>
                    <input type="text" name="username" class="form-control" required>
                    <label class="form-label"> Password </label>
                    <input type="password" name="password" class="form-control" required>
                    <label class="form-label"> Email </label>
                    <input type="email" name="email" class="form-control" required>
                    <label class="form-label"> Full Name </label>
                    <input type="text" name="namalengkap" class="form-control" required>
                    <label class="form-label"> Address </label>
                    <input type="text" name="alamat" class="form-control" required>
                    <div class="d-grid mt-2">
                        <button class="btn btn-success" type="submit" name="kirim"> Regist </button>
                    </div>
                </form>
                <p> Already Have An Account? <a href="login.php"> Login </a></p>
          </div>
       </div> 

      </div>
    </div>

<footer class="d-flex justify-content-center border-top mt-3 bg-transparant fixed-buttom">
<p>&copy; Benz Gallery </p>
</footer>

<script type="text/javascript" src="assets/js/boostrap.min.js"></script>
</body>
</html>



    