<?php

require('db1.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idOfStudent = $_GET['id'];

    $checkIfQuestionExists = $bdo->prepare('SELECT * FROM filière WHERE id_filiere = ?');
    $checkIfQuestionExists->execute(array($idOfStudent));

    if($checkIfQuestionExists->rowCount() > 0){


        $delete = $bdo->prepare('DELETE FROM filière WHERE id_filiere = ?');
        $delete->execute(array($idOfStudent));

        header('Location: tab_fil.php');



    }else{
        $error = "Aucune question n'a été trouvée";
    }

}else{
    $error = "Aucune question n'a été trouvée";
}