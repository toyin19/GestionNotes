<?php 
	require('db1.php');
    session_start();

    if (!isset($_SESSION['mail'])) {
      header("Location: login.php");
    }


	$getAllStudent = $bdo->query('SELECT * FROM etudiants');


 ?>


