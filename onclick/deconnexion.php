<?php session_start(); ?>

 <?php
header('Location: ../spacetruck.php');
           
if (isset($_GET["click"])) {
     $_SESSION['id'] = NULL;
    exit();
}

?>