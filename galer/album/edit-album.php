<?php
include('../config/con.php');
include '../userdat/userdat.php';
if (empty($ses_username || $ses_email)) {
	header('Location: ../../galer/cover.php');
	exit();
}


?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>new Album</title>
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
		<a class="navbar-brand" href="../../galer/album/"><i class="fa-solid fa-arrow-left fa-2xl"></i></a>
	</nav>
	
<section class="position-relative py-4 py-xl-5 mt-5">
    <div class="container position-relative mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                <div class="card mt-5 mb-5">
                    <div class="card-body p-sm-5">
                        <h2 class="text-center mb-5">Edit Album</h2>
                        <form method="post" enctype="multipart/form-data">
                            <?php 
                                $idalbum = $_GET['id'];
                                $ambil_data = mysqli_query($con, "SELECT * FROM album WHERE AlbumID = '$idalbum'");
                                $datanya = $ambil_data->fetch_assoc();
                            ?>
                            <div class="mb-3">
                                <input id="album" value="<?= $datanya['NamaAlbum'] ?>" class="form-control" type="text" name="album_name" placeholder="Name" />
                            </div>
                            <div class="mb-3">
                                <input id="deskripsi" value="<?= $datanya['Deskripsi'] ?>" class="form-control" type="text" name="description" placeholder="Deskripsi" />
                            </div>
                            <div class="mb-3">

                            </div>
                            <div>

                            </div>
							<button class="btn btn-outline-success d-block w-100" name="createBtn" type="submit">Done</button>

                            <?php
								if (isset($_POST['createBtn'])) {
									$albumId = $_GET['id'];
									$namaalbum = $_POST['album_name'];
									$deskripsi = $_POST['description'];
									mysqli_query($con, "UPDATE album SET NamaAlbum='$namaalbum', Deskripsi='$deskripsi' WHERE album.AlbumID='$albumId'") or die(mysqli_error($con));
                                    header("Location: ../album/");
								}
								?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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