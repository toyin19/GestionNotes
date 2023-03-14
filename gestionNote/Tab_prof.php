<?php
	
  require 'listeProf.php';
  require 'supProf.php';

//   if (!isset($_SESSION['mail'])) {
//     header("Location: accueil.php");
//   }

// ?>

<!DOCTYPE htmls>
<html>
<head>
	<?php include 'require/head.php'; ?>
</head>
<body>

		 <div class="container  py-5 px-5 ">
		 <h1 class=" mb-4">Liste des professeurs</h1>
     <table class="table" >
  <thead>
    <tr class=" ">
      <th scope="col">id_prof</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">Numéro</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
   while($prof =$getAllTeacher->fetch()){
   ?>
    <tr class="">
      <td><?= $prof['id_prof']?></td>
      <td><?= $prof['nom'] ?></td>
      <td><?= $prof['prenom'] ?></td>
      <td><?= $prof['numero'] ?></td>
      <td><?= $prof['email'] ?></td>
      <td>  
      <button type="button" class="btn btn-primary"><a href="modifProf.php?id=<?= $prof['id_prof']?>"><div class="text-light">Modifier</div></a></button> 
      <button type="button" class="btn btn-danger"><a href="supProf.php?id=<?= $prof['id_prof']?>"  onclick="return confirm('Voulez vous vraiment supprimer cet professeur?');" ><div class="text-light">Supprimer</div></a> </button>
 
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
