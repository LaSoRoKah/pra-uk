<?php 
	session_start();
	$ses_username = $_SESSION['username'];
	$ses_password = $_SESSION['password'];
	$ses_email = $_SESSION['email'];
	$ses_fullname = $_SESSION['fullname'];
	$ses_alamat = $_SESSION['alamat'];
	$ses_userid = $_SESSION['userID'];
	$tanggal = date('Y-m-d');
 ?>