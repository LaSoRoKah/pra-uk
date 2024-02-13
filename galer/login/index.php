<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<title>Login</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css" />
	<link rel="stylesheet" href="../css/custom.css">
</head>

<body>
	<div class="container">
		<div class="row justify-content-center align-items-center" style="height: 100vh">
			<div class="col-md-6 col-lg-4 col-10 p-4 p-md-5 shadow-sm rounded-4">
				<p class="text-center fs-3 fw-bold mb-5 pb-3">LOGIN</p>
				<form method="post">
					<div class="my-4 border-bottom py-1">
						<input type="text" class="form-control py-2 border-0" name="username"
							placeholder="username or email" />
					</div>
					<div class="my-4 border-bottom py-1">
						<input type="password" class="form-control py-2 border-0" name="password"
							placeholder="password" />
					</div>
					<div class="my-4">
						<button class="btn btn-dark w-100 py-3" type="submit" name="loginBtn">
							Sign In
						</button>
					</div>
				</form>
				<div class="my-4">
					<p class="text-center">-OR-</p>
				</div>
				<div class="my-4">
					<p class="text-center">
						don't have an account yet? <a href="../regsiter/">Register</a>
					</p>
				</div>
			</div>
		</div>
	</div>

	<?php

	include('../config/con.php');
	if (isset($_POST['loginBtn'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		$check = mysqli_query($con, "SELECT * FROM user WHERE Username='$username' || Email='$username'");
		if ($check->num_rows > 0) {
			$login_username = mysqli_query($con, "SELECT * FROM user WHERE Username='$username' && Password='$password'");
			if ($login_username->num_rows > 0) {
				session_start();
				$get_userdat = $check->fetch_assoc();
				$_SESSION['username'] = $get_userdat['Username'];
				$_SESSION['userID'] = $get_userdat['UserID'];
				$_SESSION['password'] = $get_userdat['Password'];
				$_SESSION['email'] = $get_userdat['Email'];
				$_SESSION['fullname'] = $get_userdat['NamaLengkap'];
				$_SESSION['alamat'] = $get_userdat['Alamat'];
				header('Location: ../');
				exit();
			} else {
				$login_email = mysqli_query($con, "SELECT * FROM user WHERE Email='$username' && Password='$password'");
				if ($login_email->num_rows > 0) {
					session_start();
					$get_userdat = $check->fetch_assoc();
					$_SESSION['username'] = $get_userdat['Username'];
					$_SESSION['userID'] = $get_userdat['UserID'];
					$_SESSION['password'] = $get_userdat['Password'];
					$_SESSION['email'] = $get_userdat['Email'];
					$_SESSION['fullname'] = $get_userdat['NamaLengkap'];
					$_SESSION['alamat'] = $get_userdat['Alamat'];
					header('Location: ../');
				} else {
					echo "password salah";
					exit();
				}
			}
		} else {
			echo "username atau email tidak ditemukan";
		}
	} ?>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>