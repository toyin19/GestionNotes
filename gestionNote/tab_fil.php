

<?php
require 'listeFil.php';
require 'supFil.php';
 
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
		 <h1 class=" mb-4">Liste des filières</h1>
     <table class="table" >
  <thead>
    <tr class="">
      <th scope="col">id_filiere</th>
      <th scope="col">nomFiliere</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
   while($fil =$getAllFil ->fetch()){
   ?>
    <tr class=" ">
      <td><?= $fil['id_filiere'] ?></td>
      <td><?= $fil['nomFiliere'] ?></td>
      <td>  
      <button type="button" class="btn btn-primary"><a href="modifFil.php?id=<?= $fil['id_filiere']?>"><div class="text-light">Modifier</div></a> </button> 
      <button type="button" class="btn btn-danger"><a href="supFil.php?id=<?= $fil['id_filiere']?>"  onclick="return confirm('Voulez vous vraiment supprimer cette filière?');" ><div class="text-light">Supprimer</div></a> 
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
