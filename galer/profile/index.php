<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>profile</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<!-- FontAwesome 6.2.0 CSS -->
	<link
		rel="stylesheet"
		href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
		integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
		crossorigin="anonymous"
		referrerpolicy="no-referrer"
	/>
	
	
	
</head>

<body>
	<nav class="navbar navbar-light bg-light">
		<a class="navbar-brand" href="../home.php"><i class="fa-solid fa-arrow-left fa-2xl"></i></a>
	</nav>
		<form method="post">
			<?php
			include('../config/con.php');
			include '../userdat/userdat.php';
			if (empty($ses_username || $ses_email)) {
				header('Location: ../cover.php');
				exit();
			}
			$get_userdat = mysqli_query($con, "SELECT * FROM user WHERE Username='$ses_username' AND UserId='$ses_userid'");
			foreach ($get_userdat as $data) {
				?>
				<section class="position-relative py-4 py-xl-5 mt-5">
					<div class="container position-relative mt-5">
						<div class="row d-flex justify-content-center">
							<div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4">
								<div class="card" style="width: 18rem;">
									<div class="card-header text-center">
										<h4>Profile</h4>
									</div>
									<ul class="list-group list-group-flush text-center">
										<li class="list-group-item"><?php echo $data['Username'] ?></li>
										<li class="list-group-item"><?php echo $data['Email'] ?></li>
										<li class="list-group-item"><?php echo $data['NamaLengkap'] ?></li>
										<li class="list-group-item"><?php echo $data['Alamat'] ?></li>
										<li class="list-group-item"><input class="form-control" type="text" name="fullname" placeholder="Edit Nama Lengkap"></li>
										<li class="list-group-item"><input class="form-control" type="text" name="alamat" placeholder="Edit Alamat"></li>
										<li class="list-group-item d-flex justify-content-between">
											<button type="submit" class="btn btn-primary" name="editBtn">Save</button>
											<button type="submit" class="btn btn-danger"name="logout">LogOut</button>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</section>
				
				
				<?php
			}
			if (isset($_POST['logout'])) {
				session_destroy();
				header('Location: ../cover.php');
			}
			if (isset($_POST['editBtn'])) {
				$fullname = $_POST['fullname'];
				$alamat = $_POST['alamat'];
				if (empty($fullname && $alamat)) {
					echo "tidak boleh kosong";
				} else {
					mysqli_query($con, "UPDATE `user` SET `NamaLengkap` = '$fullname', `Alamat` = '$alamat' WHERE `user`.`UserID` = '$ses_userid'");
					echo "<script>location.reload</script>";
					header('Location: ../profile/');
				}
			}
			?>
		</form>
		<script src="../js/bootstrap.min.js"></script>
		<!-- (Optional) Use CSS or JS implementation -->
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"
		integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA=="
		crossorigin="anonymous"
		referrerpolicy="no-referrer"
	></script>
</body>

</html>