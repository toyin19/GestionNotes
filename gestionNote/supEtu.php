<?php

require('db1.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idOfStudent = $_GET['id'];

    $checkIfQuestionExists = $bdo->prepare('SELECT * FROM etudiants WHERE matricule = ?');
    $checkIfQuestionExists->execute(array($idOfStudent));

    if($checkIfQuestionExists->rowCount() > 0){


        $delete = $bdo->prepare('DELETE FROM etudiants WHERE matricule = ?');
        $delete->execute(array($idOfStudent));

        header('Location:Tab_etud.php'); 
       


    }else{
        $error = "Aucune question n'a été trouvée";
    }

}else{
    $error = "Aucune question n'a été trouvée";
}