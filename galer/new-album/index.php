	<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>new Album</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
	
<section class="position-relative py-4 py-xl-5 mt-5">
    <div class="container position-relative mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4">
                <div class="card mt-5 mb-5">
                    <div class="card-body p-sm-5">
                        <h2 class="text-center mb-5">New Album</h2>
                        <form method="post">
                            <div class="mb-3"><input id="album" class="form-control" type="text" name="album_name" placeholder="Name" /></div>
                            <div class="mb-3"><input id="deskripsi" class="form-control" type="text" name="description" placeholder="Deskripsi" /></div>
                            <div class="mb-3"></div>
                            <div></div>
							<button class="btn btn-outline-success d-block w-100" name="createBtn" type="submit">Create</button>
							<a href="../home.php" class="btn btn-outline-dark w-100 mt-2">Back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
	<?php
	include '../config/con.php';
	include '../userdat/userdat.php';
	if (empty($ses_username || $ses_email)) {
		header('Location: ../galer/login');
		exit();
	}
	if (isset($_POST['createBtn'])) {
		$tanggal = date("d-m-Y");
		$album = $_POST['album_name'];
		$descr = $_POST['description'];
		if (!empty($album && $descr)) {
			mysqli_query($con, "INSERT INTO album VALUES (NULL, '$album','$descr','$tanggal','$ses_userid')");
		} else {
			echo "field empty like your heart";
		}
	}

	?>
	<script src="../js/bootstrap.min.js"></script>
</body>

</html>