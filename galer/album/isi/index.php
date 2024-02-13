<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" href="../../css/bootstrap.min.css" />
	<!-- FontAwesome 6.2.0 CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
		integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
		crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
	<nav class="navbar navbar-light bg-light">
		<a class="navbar-brand" href="../../album"><i class="fa-solid fa-arrow-left fa-2xl"></i></a>
	</nav>


				<div class="container">
					<div class="row">
						<?php
				include '../../config/con.php';
				include '../../userdat/userdat.php';
				if (empty($ses_username || $ses_email)) {
					header('Location: ../cover.php');
					exit();
				}
				$user = $_POST['userID'];
				$album = $_POST['NamaAlbum'];
				$albumID = $_POST['AlbumID'];

				// sedikit keamanan agar user tidak bisa asal input url buat akses album orang lain
				// cek apakah id pada url sudah sesuai dengan id user
				if ($user === $ses_userid) {
					// memastikan lagi agar data yang diambil sudah benar
					$cek_keberadaan_album = mysqli_query($con, "SELECT * FROM album WHERE userID='$user' && NamaAlbum='$album' && AlbumID='$albumID'");
					if ($cek_keberadaan_album->num_rows > 0) {
						$ambil_foto = mysqli_query($con, "SELECT * FROM foto WHERE AlbumID='$albumID'");

						foreach ($ambil_foto as $foto) { ?>
						<div class="col mb-4">
							<div class="rounded">
								<div class="d-flex justify-content-around">
								<div class="" style="width: 24rem;">
									<!-- images -->
									<img class=" img-size rounded-bottom rounded-4 f-img card-img-top"
										src="../../images/<?php echo $foto['LokasiFile']; ?>" alt="" width="300" height="300">
									<div class="mt-2">
										<!-- judul -->
										<h5 class="card-title">
											<?php echo $foto['JudulFoto'] ?>
										</h5>
										<!-- deskripsi -->
										<p class="small">
											<?php echo $foto['DeskripsiFoto'] ?>
										</p>
									</div>
									<!-- hapus -->
									<div class="d-flex justify-content-between">
										<a class="btn btn-danger w-50 mx-1"
											href="../../action/delete-in-album.php?id=<?= $foto['FotoID'] ?>">Delete</a>
										<a href="../../album/isi/edit-album.php?id=<?= $foto['FotoID']; ?>"
											class="btn btn-primary w-50">Edit</a>
									</div>
								</div>
							</div>
							</div>
							
						</div>
							


						<?php }
					} else {
						echo "jangan asal masukin id";
					}
				} else {
					echo "jangan asal input url!";
				}

				?>
					</div>
				</div>
				
	
	<script src="../../js/bootstrap.min.js"></script>
	<!-- (Optional) Use CSS or JS implementation -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"
		integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA=="
		crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>