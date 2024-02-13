<?php
include '../config/con.php';
include '../userdat/userdat.php';
if (empty($ses_username || $ses_email)) {
	header('Location: ../login');
	exit();
}

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>new</title>
	<link rel="stylesheet" href="../css/drop-img.css">
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
	
	<form method="post" enctype="multipart/form-data">
		<main style="margin-top:20vh ;">
		<h1 class="text-center">Upload Image</h1>
		<div class="container mt-5">
                <div class="row">
						<div class="col">
							<!-- img drop -->
							<div id="drop-zone">
								<img src="" class="" alt="">
								<p>
									<img src="../images/67b62767de5cc7eba2f00aa4587c23c1.png" alt="">
								</p>
								<input type="file" name="image" id="myfile" hidden>
							</div>
						<script src="../js/drag.js"></script>
						</div>
						<div class="col">
							<!-- title -->
							<div class="mb-3">
								<input
									type="text"
									class="form-control form-control-lg"
									name="judul"
									id=""
									aria-describedby="helpId"
									placeholder="Title"
								/>
							</div>
							<!-- deskripsi -->
							<div class="mb-3">
								<textarea name="deskripsi" rows="11" cols="83"></textarea>
							</div>
							<!-- Album select -->
							<div class="mb-3">
								<select name="album" class="form-select form-select-lg" id="">
								<?php
								$get_album = mysqli_query($con, "SELECT * FROM album WHERE UserID='$ses_userid'");
								foreach ($get_album as $album) {
									?>
									<option value="<?php echo $album['AlbumID']; ?>"><?php echo $album['NamaAlbum'] ?></option>
								<?php } ?>
								</select>
							</div>
							<!-- button -->
							<div class="mb-3 d-flex justify-content-evenly">
								<a href="../home.php" class="btn btn-dark border w-50">Back</a>
								<button type="submit" name="postBtn" class="btn btn-white btn-outline-dark w-50">Post</button>
							</div>
						</div>
                </div>
            </div>
		</main>
			
	</form>
	<?php
	if (isset($_POST['postBtn'])) {
		$judul = $_POST['judul'];
		$deskripsi = $_POST['deskripsi'];
		$extensi = array('png', 'jpeg', 'jpg');
		$album = $_POST['album'];

		$nama_file = $_FILES['image']['name'];
		$ukuran_file = $_FILES['image']['size'];
		$ext = pathinfo($nama_file, PATHINFO_EXTENSION);

		if (!in_array($ext, $extensi)) {
			echo "extensi file tidak benar!";
		} else {
			$pict = $nama_file;
			move_uploaded_file($_FILES['image']['tmp_name'], '../images/' . $nama_file);
			$q_upload = "INSERT INTO `foto`  VALUES (NULL, '$judul', '$deskripsi', '$tanggal', '$pict', '$album', '$ses_userid');";
			$upload = mysqli_query($con, $q_upload);
		}
	}
	?>

</body>

</html>