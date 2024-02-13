<?php 

	include '../config/con.php';
	include '../userdat/userdat.php';
	$idFoto = $_GET['id'];
	$cek_like = mysqli_query($con,"SELECT * FROM likefoto WHERE userID='$ses_userid' && FotoID='$idFoto'");
	if (!$cek_like->num_rows > 0) {
		mysqli_query($con,"INSERT INTO likefoto VALUES (NULL,'$idFoto','$ses_userid','$tanggal')");
		echo "<script>history.back()</script>";
		exit();
	}else{
		mysqli_query($con,"DELETE FROM `likefoto` WHERE userID='$ses_userid' && FotoID='$idFoto'");
		echo "<script>history.back()</script>";
		exit();
		

	}

 ?>