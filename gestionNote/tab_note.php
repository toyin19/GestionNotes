<?php
  require 'supNote.php';
  $getAllNote = $bdo->query('SELECT n.id_note,n.note,e.nomE,e.prenomE, m.nom_matiere,p.nom,p.prenom  FROM notes as n INNER JOIN etudiants as e ON n.matricule=e.matricule INNER JOIN professeur as p ON n.id_prof=p.id_prof INNER JOIN matières as m ON n.id_matiere=m.id_matiere ');
//   if (!isset($_SESSION['mail'])) {
//     header("Location: accueil.php");
//   }

?>

<!DOCTYPE html>
<html>
<head>
	<?php include 'require/head.php'; ?>
</head>
<body>

 <div class="container  py-5 px-5 ">
		 <h1 class=" mb-4">Liste des notes</h1>
     <table class="table" >
  <thead>
    <tr class=" ">
      <th scope="col">id_note</th>
      <th scope="col"> Nom_étudiants </th>
      <th scope="col"> Prenom_étudiants </th>
      <th scope="col">Nom_prof</th>
      <th scope="col">Prenom_prof</th>
      <th scope="col">matiere</th>
      <th scope="col">Note</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
   while($note =$getAllNote ->fetch()){
   ?>
    <tr class=" ">
      <td><?= $note['id_note'] ?></td>
      <td><?= $note['nomE'] ?></td>
      <td><?= $note['prenomE'] ?></td>
      <td><?= $note['nom'] ?></td>
      <td><?= $note['prenom'] ?></td>
      <td> <?= $note['nom_matiere'] ?></td>
      <td><?= $note['note'] ?></td>
     
      <td>  
      <button type="button" class="btn btn-primary"><a href="modifNote.php?id=<?= $note['id_note']?>"> <div class="text-light">Modi</div></a></button>  <br> <br>
       <button type="button" class="btn btn-danger"> <a href="supNote.php?id=<?= $note['id_note']?>"  onclick="return confirm('Voulez vous vraiment supprimer cette note?');" > <div class="text-light">Supp</div></a>
      </button>
   </td>
   </tr>
   <?php
      }
      ?>
      </tbody>
</table>

     </div>
     
     </body> 
</html>
<?php require 'require/footer.php' ?> 
