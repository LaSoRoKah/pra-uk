<?php
include("../config/con.php");
$fotoid = $_GET['id'];

mysqli_query($con, "DELETE FROM foto WHERE foto.FotoID = '$fotoid'") or die(mysqli_error($con));
header("Location: ../album/isi/");
?>