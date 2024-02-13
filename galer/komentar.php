<?php

include 'config/con.php';
include 'userdat/userdat.php';

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
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
		<a class="navbar-brand" href="home.php"><i class="fa-solid fa-arrow-left fa-2xl"></i></a>
	</nav>

	<main>
		<h3 class="text">Komentar</h3>
		<?php
			if (empty($ses_username || $ses_email)) {
				header('Location: ../galer/cover.php');
				exit();
			}
			$id_post = $_GET['id'];
			$get_komen = mysqli_query($con, "SELECT * FROM `komentarfoto` WHERE FotoID='$id_post'");

			if (!$get_komen) {
				// Handle error, contoh:
				die("Error in query: " . mysqli_error($con));
			}

			foreach ($get_komen as $komen) {

				?>
				<div class="container-fluid">
						<div class="d-flex justify-content-start border mb-3">
							<div class=" mt-5 mb-4 ">
								<div class="card-header d-flex mx-3">
									<h4 class="fw-bold">
										<?php
										$id_user = $komen['UserID'];
										$get_user = mysqli_query($con, "SELECT Username FROM user WHERE UserID='$id_user'");
										$nama = $get_user->fetch_assoc();
										echo $nama['Username'];
										?>
									</h4>
									<p class="mt-1 mx-2"><?php echo $komen['TanggalKomentar'] ?></p>
								</div>
								<div class="card-body mx-3">
									<p class="card-text"><?php echo $komen['IsiKomentar'] ?></p>
								</div>
							</div>
						</div>
				</div>
				
				<?php
			}
			?>
	</main>
			
	<footer>
			<form method="post" >
				<div class="form-floating">
					<textarea class="form-control" placeholder="Leave a comment here" name="komentar" id="floatingTextarea"></textarea>
					<label for="floatingTextarea">Comments</label>
				</div>
				<button type="submit" class="btn text-white w-25 mt-3" style="background-color: #6610f2;" name="postBtn">Post</button>
			</form>
	</footer>
			

	<?php

	if (isset($_POST['postBtn'])) {
		$isi = $_POST['komentar'];
		mysqli_query($con, "INSERT INTO komentarfoto VALUES (NULL,'$id_post','$ses_userid','$isi','$tanggal')");
		echo "<script>history.back()</script>";
	}


	?>
	<script src="js/bootstrap.min.js"></script>
	<!-- (Optional) Use CSS or JS implementation -->
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"
		integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA=="
		crossorigin="anonymous"
		referrerpolicy="no-referrer"
	></script>
</body>

</html>