<?php 
    if(!isset($_GET['mulai'])) {
        exec(" /home/ali/./oke.sh");
    }
?>
<!DOCTYPE html>

<html lang="en">

<head>

    <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta charset="utf-8">
    <title>Now You Rule This Site</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link href='//fonts.googleapis.com/css?family=Raleway:400,300,600' rel='stylesheet' type='text/css'>

    <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/skeleton.css">
    <link rel="stylesheet" href="css/custom.css">

    <!-- Scripts
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <link rel="icon" type="image/png" href="images/favicon.png">

</head>
<style>
</style>

<body bgcolor="#282828">

    <!-- Primary Page Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
    <div class="section-c1">
        <div class="container">
            <div class="row">
                <div align='center'>
                    <?php
                    session_start();
                    if(!isset($_SESSION['username'])) {
                        header('location:login.php'); 
                    } else { 
                    $username = $_SESSION['username'];
                    }
                    ?>
                    <p style="color:#FFF;">Hello <b><?php echo $username;?></b>, Have A Good Day.</p>
                    <a class="button button-primary" href="proses_logout.php">LOG OUT</a>
                </div>
            </div>
        </div>
    </div>

    <div class="section-c2">
        <div class="container">
            <div class="row">
                <tr>
                    <td>
                        <audio controls autoplay="autoplay" loop="loop">
                            <source src="http://localhost:8000/stream.mp3" type="audio/mpeg">
                        </audio>
                    </td>
                </tr>
                <tr>
                    <td>
                        <form action="" method="get">
                            <button type="button" name="mulai" class="btn btn-danger btn-lg"><i
                                    class="fa fa-music"></i></button>
                        </form>
                    </td>
                </tr>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <form action="upload.php" method="post" enctype="multipart/form-data">

                        <tr>
                            <!--buat progress bar-->
                            <div id="kotak"
                                style="border: 1px solid black; height: 4px; width: 500px; margin-bottom: 10px">
                                <div id="progres" style="background: lightblue; height: 4px; width 0px;"></div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>No</td>
                                            <td>Judul</td>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                    $trimmed = file('/var/www/radio/lagu/streaming.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                                    
                                    $i = 1;
                                    foreach ($trimmed as $line){
                                        $exp = explode('/', $line);
                                        echo "<tr>";
                                            echo "<td>".$i."</td>";
                                            echo "<td>".end($exp). PHP_EOL."</td>";
                                            echo "<td>
                                            <button type='button' class='btn btn-danger btn-lg'>
                                            <i class='fa fa-times'></i>
                                            </button>
                                            </td>";
                                        echo "</tr>";
                                        $i++;
                                    }
                                    
                                        
                                ?>

                                    </tbody>

                                </table>
                                <div class="col-md-2">
                                    <input type="file" name="file">
                                    <input type="submit" name="upload" value="upload"
                                        class="btn btn btn-success btn-lg fa fa-upload">
                                </div>

                            </div>
                        </tr>
                    </form>
                </div>
                <div class="col-md-4">
                    <div class="table-responsive">
                        <table class="table" style="border: 2px solid black;">
                            <thead style="border: 2px solid black;">
                                <tr>
                                    <td style="border: 2px solid black; text-align:center;">No</td>
                                    <td style="text-align:center;">Playlist</td>
                                </tr>
                            </thead>
                            <tbody style="border: 2px solid black;">
                                <?php
                                    include 'koneksi.php';
                                    $sql= "SELECT * FROM songs ORDER BY id";
                                    $result=mysqli_query($koneksi,$sql);
                                    $i = 1;                                  
                                    while($row =mysqli_fetch_array($result,MYSQLI_ASSOC)){
                                        echo "<tr>";
                                            echo "<td style='border: 2px solid black;text-align:center;'>".$i."</td>";
                                            echo "<td style='border: 2px solid black;text-align:center;'>".$row['url']."</td>";
                                        echo "</tr>";
                                        $i++;
                                    }    
                                ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>

        <!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>

</html>