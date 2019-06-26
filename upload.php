<?php 
		include 'koneksi.php';
		if($_POST['upload']){
            $ekstensi_diperbolehkan	= array("mp3", "mp4", "wma","jpg","jpeg");
            
			$file = $_FILES['file']['name'];
            $x = explode('.', $file);
            $ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];	
			if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
				if($ukuran < 10044070){			
                    move_uploaded_file($file_tmp, '/var/www/radio/lagu/'.$file);
                    $query = mysqli_query($koneksi,"INSERT INTO songs VALUES (NULL, '$file','$x')");
					if($query){
						header('Location: welcome.php');
					}else{
						echo 'GAGAL MENGUPLOAD MUSIC';
					}
				}else{
					echo 'UKURAN FILE TERLALU BESAR';
				}
			}else{
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
		}
		?>