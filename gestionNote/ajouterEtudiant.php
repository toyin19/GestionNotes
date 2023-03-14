<?php
require('db1.php');
require 'listeFil.php';
session_start();

	  if (!isset($_SESSION['mail'])) {
    header("Location: accueil.php");
  }

  $Fil =  $getAllFil->fetchAll();

if(isset($_POST['validate']) ){

    if(!empty($_POST['matricule']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['sexe'])){
        
        //Les données de la question
        $etu_mat = htmlspecialchars($_POST['matricule']);
        $etu_nom = htmlspecialchars($_POST['nom']);
        $etu_prenom = htmlspecialchars($_POST['prenom']);
        $etu_sexe = htmlspecialchars($_POST['sexe']);
        $id_fil =htmlspecialchars($_POST['fil']);
        
        
        $insert = $bdo->prepare('INSERT INTO etudiants(matricule, nomE, prenomE, sexe,id_filiere)VALUES( ?,?,?,?,?)');
            
        
        $insert->execute(
    
           array(
                $etu_mat,
                $etu_nom,
                $etu_prenom,
                $etu_sexe,
                $id_fil,
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
           
		 <h1 class="merriweather text-center text-light mb-4">AJOUTER UN ETUDIANT</h1>
			
            <form action="" method="post">
       
           <div>
               <label for="" class="text-center text-light merriweather "> Nom</label>
               <input type="text" name="nom" class="form-control"  />
           </div>
           <div>
               <label for="" class="text-center text-light merriweather "> Prénom</label>
               <input type="text" name="prenom" class="form-control"  />
           </div>
           <div>
               <label for="" class="text-center text-light merriweather "> Matricule</label>
               <input type="number" name="matricule" class="form-control"  />
           </div>
           <div>
     <label for="" class="text-center text-light merriweather ">Filière</label>
     <select name="fil" id="text" class="form-control">
     <option value="">Selectionné une filière</option>
<?php
foreach($Fil as $inf ){
    ?>    

  <option value="<?php echo $inf['id_filiere'] ?> "> <?php echo $inf['nomFiliere']  ?> </option>  
  <?php
}
?>
</select>
    </div>
     <div>
     <label for="" class="text-center text-light merriweather ">Sexe</label>
     <select name="sexe" id="sexe" class="form-control">
     <option value="Masculin">Masculin</option>
     <option value="Féminin">Féminin</option>
    </select>
    </div> <br>
    <button id="submit" name="validate"   class="btn btn-primary" type="submit" class="form-control">Valider</button>
          
       </form>
     </div>

    </section>


      
</body>
</html>
<?php require 'require/footer.php' ?>


