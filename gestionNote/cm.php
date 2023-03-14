<?php
require('db1.php');
require 'listeMat.php';
require 'listeNote.php';
require 'listeEtudiants.php';


$moyetu=$bdo->query('SELECT nomE,prenomE,nom_matiere,AVG(note)*coef AS MoyEtuMat FROM notes,matières,etudiants WHERE notes.id_matiere=matières.id_matiere AND notes.matricule=etudiants.matricule GROUP BY etudiants.nomE,matières.nom_matiere');
$moyetu=$moyetu->fetchAll(PDO::FETCH_ASSOC);       
//print_r($moyetu);

foreach($moyetu as $row)
{
    foreach($row as $fieldname => $field)
    {
       echo $fieldname . ' => ' . $field . '<br />';
   }
}
 echo '<br/>';

$moyGen=$bdo->query(' SELECT nomE,prenomE,(SUM(MoyEtuMat)/SUM(coef)) AS MgEtu FROM ( SELECT nomE,prenomE,nom_matiere,AVG(note)*coef AS MoyEtuMat FROM notes,matières,etudiants WHERE notes.id_matiere=matières.id_matiere AND notes.matricule=etudiants.matricule GROUP BY etudiants.nomE,matières.nom_matiere) AS MOYENETUMAT,matières  GROUP BY nomE,prenomE');
 $moyGen=$moyGen->fetchAll(PDO::FETCH_ASSOC);

 foreach($moyGen as $row)
 {
     foreach($row as $fieldname => $field)
     {
        echo $fieldname . ' => ' . $field . '<br />';
    }
 } 

 

 
//$coef=$bdo->query('SELECT SUM(coef) FROM matières');
//$coef=$coef->fetchAll();
//var_dump($coef);
//$mo=$bdo->query('SELECT nomE,prenomE, SUM(MoyEtuMat) AS MgMat FROM ( SELECT nomE,prenomE,nom_matiere,AVG(note)*coef AS MoyEtuMat FROM notes,matières,etudiants WHERE notes.id_matiere=matières.id_matiere AND notes.matricule=etudiants.matricule GROUP BY etudiants.nomE,matières.nom_matiere) AS MOYENETUMAT GROUP BY nomE,prenomE ORDER BY nomE,prenomE');
//$m=$mo->fetchAll();
//var_dump($m);

?> 











