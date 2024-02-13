<?php
include('../../config/con.php');
include '../../userdat/userdat.php';
if (empty($ses_username || $ses_email)) {
	header('Location: ../../galer/login');
	exit();
}


?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>new</title>
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
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
		<a class="navbar-brand" href="../../album/"><i class="fa-solid fa-arrow-left fa-2xl"></i></a>
	</nav>

	<form method="post" enctype="multipart/form-data">
		<main style="margin-top:20vh ;">
		<div class="container mt-5">
			<h1 class="text-center">Edit</h1>
						<?php
						$idfoto = $_GET['id'];
						$ambil_data = mysqli_query($con, "SELECT * FROM foto WHERE FotoID = '$idfoto'");
						$datanya = $ambil_data->fetch_assoc();
						?>
						<div class="container mt-5">
							<div class="row">
								<div class="col">
									<img src="../../images/<?php echo $datanya['LokasiFile']; ?>" width="300" alt="">
								</div>
								<div class="col">
									<!-- title -->
									<div class="mb-3">
										<input type="text" class="form-control form-control-lg" name="judul" id=""
											aria-describedby="helpId" placeholder="Title" value="<?= $datanya['JudulFoto'] ?>" />
									</div>
									<!-- deskripsi -->
									<div class="mb-3">
										<input type="text" class="form-control" name="deskripsi"
											value="<?= $datanya['DeskripsiFoto'] ?>">
									</div>
									<!-- Album select -->
									<div class="mb-3">
										<select name="album" class="form-select form-select-lg" id="">
											<?php
											$get_album = mysqli_query($con, "SELECT * FROM album WHERE UserID='$ses_userid'");
											foreach ($get_album as $album) {
												?>
												<option value="<?php echo $album['AlbumID']; ?>">
													<?php echo $album['NamaAlbum'] ?>
												</option>
											<?php } ?>
										</select>
									</div>
									<!-- button -->
									<div class="mb-3 d-flex justify-content-evenly">
										<button type="submit" name="postBtn"
											class="btn btn-white btn-outline-dark w-50">Post</button>
									</div>
								</div>
								<?php
								if (isset($_POST['postBtn'])) {
									$fotoId = $_GET['id'];
									$judul = $_POST['judul'];
									$deskripsi = $_POST['deskripsi'];
									$album = $_POST['album'];
									mysqli_query($con, "UPDATE foto SET JudulFoto='$judul', DeskripsiFoto='$deskripsi', AlbumID='$album' WHERE foto.FotoID='$fotoId'") or die(mysqli_error($con));
								}
								?>
							</div>
						</div>
		</div>
			
		</main>

	</form>
	<!-- (Optional) Use CSS or JS implementation -->
	<script
		src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"
		integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA=="
		crossorigin="anonymous"
		referrerpolicy="no-referrer"
	></script>


</body>

</html>