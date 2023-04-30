<?php 
    require_once ('database.php');
    session_start();

    // Hesaptan çıkış yapma 
    session_destroy();
    header('Location: index.php');

?>