<?php
    session_start();
    
    
    echo "<script language=\"JavaScript\">\n";
    echo "alert('See Ya Space Cowboy');\n";
    echo "window.location='index.php'";
    echo "</script>";
    session_destroy();
?>