<?php
require('db1.php');
session_start();

	  if (!isset($_SESSION['mail'])) {
    header("Location: accueil.php");
  }


if(isset($_POST['validate']) ){

    if(!empty($_POST['nom_matière']) AND !empty($_POST['nom_raccourciMatière']) AND !empty($_POST['coef'])){

        $nom_mat = htmlspecialchars($_POST['nom_matière']);
        $nom_raccouMat = htmlspecialchars($_POST['nom_raccourciMatière']);
        $coef = htmlspecialchars($_POST['coef']);
        
        $insert = $bdo->prepare('INSERT INTO matières( nom_matiere,nom_raccourciMatiere,coef)VALUES(?, ?,?)');
        $insert->execute(
            array(
                $nom_mat,
                $nom_raccouMat,
                $coef,
            ));

        $success = "Information enregistré avec succès";
        
    }else{
        $error= "Veuillez compléter tous les champs...";
    }

}



?>



<!DOCTYPE html>
<html>
<head>
	<?php include 'require/head.php'; ?>
</head>

<body role="document" style="background-color: paleturquoise;">
	<?php include 'require/nav.php'; ?>
   

	<!-- <form action="" id="survey-form" method="POST"> -->
		
    <section class="gestion1-form py-5">
    <div class="container  py-5 px-5 w-50 ">
     <?php 
		if (isset($error)) {			
		 ?>
		 <div style="color: white;, text-align: center; background-color: red ; padding: 15px;"> <?=$error ?></div>

		 <?php 
		}
		  ?>

		  <?php 
		if (isset($success)) {			
		 ?>
		 <div style="color: white;, text-align: center; background-color: green ; padding: 15px;"> <?=$success ?></div>

		 <?php 
		}
		  ?>
           
		 <h1 class="merriweather text-center text-light mb-4">AJOUTER UNE MATIERE</h1>
			
            <form action="" method="post">
       
           <div>
               <label for="" class="text-center text-light merriweather "> Nom de la matière</label>
               <input type="text" name="nom_matière" class="form-control"  />
           </div>
           <div>
               <label for="" class="text-center text-light merriweather "> Nom raccourci de cette matière</label>
               <input type="text" name="nom_raccourciMatière" class="form-control"  />
           </div> 
           <div>
               <label for="" class="text-center text-light merriweather "> coeficient</label>
               <input type="number" name="coef" class="form-control"  />
           </div><br>
     <button id="submit" name="validate"   class="btn btn-primary" type="submit" class="form-control">Valider</button>
          
       </form>
     </div>

    </section>


      
</body>
</html>
<?php require 'require/footer.php' ?>
