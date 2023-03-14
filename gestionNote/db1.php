<?php
try{
    $bdo = new PDO('mysql:host=localhost;dbname=gestion_des_notes;charset=utf8;', 'root', '');
    $bdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(Exception $e){
    die('Une erreur a été trouvée : ' . $e->getMessage());
}
