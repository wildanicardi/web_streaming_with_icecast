<?php 
$koneksi = mysqli_connect("localhost","username","ali","mmb");

// Check connection
if (mysqli_connect_error()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>
