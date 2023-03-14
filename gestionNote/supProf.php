<?php

require('db1.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){

    $idOfStudent = $_GET['id'];

    $checkIfQuestionExists = $bdo->prepare('SELECT * FROM professeur WHERE id_prof = ?');
    $checkIfQuestionExists->execute(array($idOfStudent));

    if($checkIfQuestionExists->rowCount() > 0){


        $delete = $bdo->prepare('DELETE FROM professeur WHERE id_prof = ?');
        $delete->execute(array($idOfStudent));

        header('Location:Tab_prof.php');



    }else{
        $error = "Aucune question n'a été trouvée";
    }

}else{
    $error = "Aucune question n'a été trouvée";
}