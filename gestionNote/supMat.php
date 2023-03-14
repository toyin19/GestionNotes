<?php

require('db1.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idOfStudent = $_GET['id'];

    $checkIfQuestionExists = $bdo->prepare('SELECT * FROM matières WHERE id_matiere = ?');
    $checkIfQuestionExists->execute(array($idOfStudent));

    if($checkIfQuestionExists->rowCount() > 0){


        $delete = $bdo->prepare('DELETE FROM matières WHERE id_matiere = ?');
        $delete->execute(array($idOfStudent));

        header('Location:tab_mat.php');



    }else{
        $error = "Aucune question n'a été trouvée";
    }

}else{
    $error = "Aucune question n'a été trouvée";
}