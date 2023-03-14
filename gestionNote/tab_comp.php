<?php
  require 'listeCompo.php';
  require 'supCompo.php';

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
		 <h1 class="mb-4">Liste des composition</h1>
     <table class="table" >
  <thead>
    <tr class=" ">
      <th scope="col">id_compo</th>
      <th scope="col">date_debut</th>
      <th scope="col">date_fin</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php 
   while($comp =	$getAllCompo ->fetch()){
   ?>
    <tr class="">
      <td><?= $comp['id_compo'] ?></td>
      <td><?= $comp['date_debut'] ?></td>
      <td><?= $comp['date_fin'] ?></td>
      <td>  
      <button type="button" class="btn btn-primary"><a href="modifCompo.php?id=<?= $comp['id_compo']?>"><div class="text-light">Modifier</div></a> </button> 
      <button type="button" class="btn btn-danger"><a href="supCompo.php?id=<?= $comp['id_compo']?>"  onclick="return confirm('Voulez vous vraiment supprimer cette composition?');" ><div class="text-light">Supprimer</div></a></button>
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
