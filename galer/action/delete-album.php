<?php
include("../config/con.php");
$albumid = $_GET['id'];

mysqli_query($con, "DELETE FROM album WHERE album.AlbumID = '$albumid'") or die(mysqli_error($con));
header("Location: ../album/");
?>