<?php
session_start();
if (!isset($_SESSION['mail'])) {
    header("Location: accueil.php");
  }

$_SESSION = array();
session_destroy();
header("Location:accueil.php");

//exit();
?>
