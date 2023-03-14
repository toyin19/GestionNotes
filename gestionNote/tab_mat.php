<?php
require 'listeMat.php';
require 'supMat.php';
 
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
		 <h1 class=" mb-4">Liste des matières</h1>
     <table class="table" >
  <thead>
    <tr class=" ">
      <th scope="col">id_matiere</th>
      <th scope="col">nom_matiere</th>
      <th scope="col">nom_raccourciMatiere</th>
      <th scope="col">coéficient</th>

      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
   while($mat =	$getAllMat ->fetch()){
   ?>
    <tr class=" ">
      <td><?= $mat['id_matiere'] ?></td>
      <td><?= $mat['nom_matiere'] ?></td>
      <td><?= $mat['nom_raccourciMatiere'] ?></td>
      <td><?= $mat['coef'] ?></td>

      <td>  
      <button type="button" class="btn btn-primary"><a href="modifMat.php?id=<?= $mat['id_matiere']?>"><div class="text-light">Modifier</div></a> </button> 
      <button type="button" class="btn btn-danger"> <a href="supMat.php?id=<?= $mat['id_matiere']?>"  onclick="return confirm('Voulez vous vraiment supprimer cette matière?');" ><div class="text-light">Supprimer</div></a> 
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
