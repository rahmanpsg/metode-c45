<?php 
	$koneksi = mysqli_connect('localhost','root','','c45');

	if($koneksi === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
    }
?>