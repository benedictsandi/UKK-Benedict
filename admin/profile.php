	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
	<div class="container">
	<a href="../admin/index.php" class="btn btn-dark rounded-pill py-2 px-4">Back</a>
		<div class="row justify-content-center mt-3">
			<div class="col-7 ">
				<div class="card text-bg-success mb-3">
					<div class="card-body">
						<h2>Profil</h2>

                    <?php
					include 'koneksi.php';
					$userid=@$_SESSION['UserID'];
					$_SESSION = ['UserID'];
                    $user = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM user WHERE UserID=userid"));
                    if (isset($_POST['editprofile'])) {
                        $nama = $_POST['nama'];
                        $email = $_POST['email'];
                        $username = $_POST['username'];
                        $alamat = $_POST['alamat'];
                        if (isset($username) && isset($email)) {
                            if ($username == $user['Username'] && $email == $user['Email'] && $alamat == $user['Alamat']) {
                                $ubah = mysqli_query($koneksi,  "UPDATE user SET NamaLengkap='$nama' WHERE UserID=userid");
                                $session = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM user WHERE UserID=userid"));
                                if ($ubah) {
                                    $_SESSION['userid'] = $session['UserID'];
                                    $_SESSION['username'] = $session['Username'];
                                    $_SESSION['namalengkap'] = $session['NamaLengkap'];
                                    $_SESSION['email'] = $session['Email'];
                                    $alert = 'Ubah nama berhasil';
                                    echo '<meta http-equiv="refresh" content="0.8; url=?url=profile&&proses=editprofile">';
                                } else {
                                    $alert = 'Ubah nama gagal';
                                    echo '<meta http-equiv="refresh" content="0.8; url=?url=profile&&proses=editprofile">';
                                }
                            } else if ($username == $user['Username'] && $email == $user['Email'] && $nama == $user['NamaLengkap']) {
                                $ubah = mysqli_query($koneksi, "UPDATE user SET Alamat='$alamat' WHERE UserID=userid");
                                if ($ubah) {
                                    $alert = 'Ubah alamat berhasil';
                                    echo '<meta http-equiv="refresh" content="0.8; url=?url=profile&&proses=editprofile">';
                                } else {
                                    $alert = 'Ubah alamat berhasil';
                                    echo '<meta http-equiv="refresh" content="0.8; url=?url=profile&&proses=editprofile">';
                                }
                            } else if ($username == $user['Username'] && $alamat == $user['Alamat'] && $nama == $user['NamaLengkap']) {
                                $ubah = mysqli_query($koneksi, "UPDATE user SET Email='$email' WHERE UserID=userid");
                                $session = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM user WHERE UserID=userid"));
                                if ($ubah) {
                                    $_SESSION['userid'] = $session['UserID'];
                                    $_SESSION['username'] = $session['Username'];
                                    $_SESSION['namalengkap'] = $session['NamaLengkap'];
                                    $_SESSION['email'] = $session['Email'];
                                    $alert = 'Ubah email berhasil';
                                    echo '<meta http-equiv="refresh" content="0.8; url=?url=profile&&proses=editprofile">';
                                } else {
                                    $alert = 'Ubah email berhasil';
                                    echo '<meta http-equiv="refresh" content="0.8; url=?url=profile&&proses=editprofile">';
                                }
                            } else if ($email == $user['Email'] && $alamat == $user['Alamat'] && $nama == $user['NamaLengkap']) {
                                $ubah = mysqli_query($koneksi, "UPDATE user SET Username='$username' WHERE UserID=userid");
                                $session = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM user WHERE UserID=userid"));
                                if ($ubah) {
                                    $_SESSION['userid'] = $session['UserID'];
                                    $_SESSION['username'] = $session['Username'];
                                    $_SESSION['namalengkap'] = $session['NamaLengkap'];
                                    $_SESSION['email'] = $session['Email'];
                                    $alert = 'Ubah username berhasil';
                                    echo '<meta http-equiv="refresh" content="0.8; url=?url=profile&&proses=editprofile">';
                                } else {
                                    $alert = 'Ubah username berhasil';
                                    echo '<meta http-equiv="refresh" content="0.8; url=?url=profile&&proses=editprofile">';
                                }
                            }
                        }
                    } else if (isset($_POST['editpassword'])) {
                        $password = md5($_POST['password']);
                        if ($password != $user['Password']) {
                            $ubah = mysqli_query($koneksi, "UPDATE user SET Password='$password' WHERE UserID=userid");
                            if ($ubah) {
                                $alert = 'Ubah password berhasil';
                                echo '<meta http-equiv="refresh" content="0.8; url=?url=profile&&proses=editpassword">';
                            } else {
                                $alert = 'Ubah password gagal';
                                echo '<meta http-equiv="refresh" content="0.8; url=?url=profile&&proses=editpassword">';
                            }
                        }
                    }
                    ?>


                    <?php echo @$alert;
                    if (@$_GET['proses'] == 'editprofile') : ?>
                        <form action="?url=profile&&proses=editprofile" method="post">
                            <div class="input-group mb-3">
                                <label for="nama" class="input-group-text"><i class="fa-solid fa-circle-user fa-fw fa-lg"></i></label>
                                <input type="text" class="form-control" value="<?= $user['NamaLengkap'] ?>" id="nama" name="nama" required placeholder="Masukan Nama Lengkap">
                            </div>
                            <div class="input-group mb-3">
                                <label for="email" class="input-group-text"><i class="fa-solid fa-envelope fa-fw fa-lg"></i></label>
                                <input type="email" class="form-control" value="<?= $user['Email'] ?>" id="email" name="email" required placeholder="Masukan Email Anda">
                            </div>
                            <div class="input-group mb-3">
                                <label for="username" class="input-group-text"><i class="fa-solid fa-at fa-fw fa-lg"></i></label>
                                <input type="text" class="form-control" value="<?= $user['Username'] ?>" id="username" name="username" required placeholder="Masukan Username">
                            </div>
                            <div class="input-group mb-4">
                                <label for="alamat" class="input-group-text"><i class="fa-solid fa-address-book fa-fw fa-lg"></i></label>
                                <input type="text" class="form-control" id="alamat" value="<?= $user['Alamat'] ?>" name="alamat" required placeholder="Masukan Alamat Lengkap">
                            </div>
                            <a href="?url=profile" class="btn btn-dark">Back</a>
                            <input type="submit" value="Save changes" name="editprofile" class="btn btn-dark ">
                        </form>
                    <?php elseif (@$_GET['proses'] == 'editpassword') : ?>
                        <form action="?url=profile&&proses=editpassword" method="post">
                            <div class="input-group mb-4">
                                <label for="password" class="input-group-text"><i class="fa-solid fa-lock fa-fw fa-lg"></i></label>
                                <input type="password" class="form-control" id="password" name="password" required placeholder="Enter new password">
                            </div>
							<div class="input-group mb-4">
                                <label for="password" class="input-group-text"><i class="fa-solid fa-lock fa-fw fa-lg"></i></label>
                                <input type="password" class="form-control" id="password" name="password" required placeholder="Enter new password again">
                            </div>
                            <a href="?url=profile" class="btn btn-dark ">Back</a>
                            <input type="submit" value="Save changes" name="editpassword" class="btn btn-dark ">
                        </form>

                    <?php else : ?>
                        <div class="table-responsive">
                            <table class="table table-white table-hover">
                                <tr>
                                    <th style="width: 20%;" class="py-3">Fullname</th>
                                    <td class="py-3 text-muted"><?= $user['NamaLengkap'] ?></td>
                                </tr>
                                <tr>
                                    <th style="width: 20%;" class="py-3">Email</th>
                                    <td class="py-3 text-muted"><?= $user['Email'] ?></td>
                                </tr>
                                <tr>
                                    <th style="width: 20%;" class="py-3">Username</th>
                                    <td class="py-3 text-muted"><?= $user['Username'] ?></td>
                                </tr>
                                <tr>
                                    <th style="width: 20%;" class="py-3">Address</th>
                                    <td class="py-3 text-muted"><?= $user['Alamat'] ?></td>
                                </tr>
                            </table>
                        </div>
                        <a href="?url=profile&&proses=editprofile" class="btn btn-dark">Edit Profile</a>
                        <a href="?url=profile&&proses=editpassword" class="btn btn-dark">Edit Password</a>
                    <?php endif; ?>
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