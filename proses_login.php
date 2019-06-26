<?php 
// mengaktifkan session php
session_start();

// menghubungkan dengan koneksi
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];

// menyeleksi data admin dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from login where username='$username' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);

if($cek > 0){
	$_SESSION['username'] = $username;
	$_SESSION['password'] = $password;
	echo "<script language=\"JavaScript\">\n";
    echo "alert('Well Played!');\n";
    echo "window.location='welcome.php'";
    echo "</script>"; 
}else{
    echo "<script language=\"JavaScript\">\n";
    echo "alert('Username or Password was incorrect!');\n";
    echo "window.location='login.php'";
    echo "</script>"; 
}
?>
