<?php
require 'supEtu.php';
 
  // if (!isset($_SESSION['mail'])) {
  //   header("Location: accueil.php");
  // }
  
  $getAllStudent = $bdo->query('SELECT e.nomE,e.prenomE,e.sexe,e.matricule,f.nomFiliere  FROM etudiants as e INNER JOIN filière as f ON e.id_filiere=f.id_filiere');

?>

<!DOCTYPE html>
<html>
<head>
	<?php include 'require/head.php'; ?>
</head>
<body>
	<div class="container  py-5 px-5 ">
     <h1 class=" mb-4 ">Liste des étudiants</h1>
		 
     <table class="table" >
  <thead>
    <tr class=" ">
      <th scope="col">Matricule</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">sexe</th>
      <th scope="col">Nom de la filiere</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
   while($info = $getAllStudent->fetch()){
   ?>
    <tr class=""> 
      <td><?= $info['matricule'] ?></td>
      <td><?= $info['nomE'] ?></td>
      <td><?= $info['prenomE'] ?></td>
      <td><?= $info['sexe'] ?></td>
      <td><?= $info['nomFiliere'] ?></td>
      <td>  
      <button type="button" class="btn btn-primary"><a href="modifEtu.php?id=<?= $info['matricule']?>"><div class="text-light">Modifier</div></a>  </button> 
      <button type="button" class="btn btn-danger"><a href="supEtu.php?id=<?= $info['matricule']?>"  onclick="return confirm('Voulez vous vraiment supprimer cet étudiant?');" ><div class="text-light">Supprimer</div></a> 
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

