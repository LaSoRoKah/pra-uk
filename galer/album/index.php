<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
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
	
	
	<?php

	include '../config/con.php';
	include '../userdat/userdat.php';
	if (empty($ses_username || $ses_email)) {
		header('Location: ../cover.php');
		exit();
	}

	?>
	
	<div class="card">
				<div class="card-header d-flex">
					<a href="../home.php"><i class="fa-solid fa-arrow-left fa-2xl mt-3 mx-2"></i></a>
					<p class="mt-3">Your Album</p>
				</div>
				<?php
				$get_album = mysqli_query($con, "SELECT * FROM album WHERE UserID='$ses_userid'");

				foreach ($get_album as $data) {
					?>
					<form action="isi/" method="post">
						<div class="card-body mb-3">
							<h5 class="card-title"><?php echo $data['NamaAlbum'] ?></h5>
							<p class="card-text"><?php echo $data['Deskripsi'] ?></p>
							<input class="form-control" type="text" hidden name="NamaAlbum" value="<?php echo $data['NamaAlbum']; ?>">
							<input type="number" hidden name="AlbumID" value="<?php echo $data['AlbumID']; ?>">
							<input type="number" hidden name="userID" value="<?php echo $data['userID']; ?>">
							<div class="d-flex">
								<button class="btn btn-info text-white" type="submit">lihat</button>
								<a class="btn btn-danger mx-1"href="../action/delete-album.php?id=<?= $data['AlbumID'] ?>">Delete</a>
								<a href="edit-album.php?id=<?= $data['AlbumID']; ?>"class="btn btn-primary">Edit</a>
							</div>
							
						</div>
					</form>
					<hr>
				<?php } ?>
			</div>
		
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