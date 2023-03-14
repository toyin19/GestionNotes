<?php
require('db1.php');
require 'listeEtudiants.php';
require 'listeProf.php';
require 'listeMat.php';
//session_start();

if (!isset($_SESSION['mail'])) {
header("Location: accueil.php");
}

$profs = $getAllTeacher->fetchAll();
$etud = $getAllStudent->fetchAll();
$mat =  $getAllMat->fetchAll();


if(isset($_POST['validate']) ){

    if(!empty($_POST['note']) AND !empty($_POST['etudiant']) AND !empty($_POST['prof']) AND !empty($_POST['matière'])){

        $note = htmlspecialchars($_POST['note']);
        $etudiant = htmlspecialchars($_POST['etudiant']);
        $prof = htmlspecialchars($_POST['prof']);
        $matiere = htmlspecialchars($_POST['matière']);
        
        $insert = $bdo->prepare('INSERT INTO notes( note,matricule,id_prof,id_matiere)VALUES(?, ?,?,?)');
        $insert->execute(
            array(
                $note,
                $etudiant,
                $prof,
                $matiere,
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

<body>
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
           
		 <h1 class="merriweather text-center text-light mb-4">AJOUTER UNE NOTE</h1>
			
            <form action="" method="post">
           <div>
               <label for="" class="text-center text-light merriweather "> Note</label>
               <input type="float" name="note" class="form-control"  />
           </div>
    <div>
     <label for="" class="text-center text-light merriweather ">ETUDIANT</label>
     <select name="etudiant" id="text" class="form-control">
     <option value="">Selectionné un étudiant</option>
<?php
foreach($etud as $inf ){
    ?>  
     
  <option value="<?php echo $inf['matricule'] ?> "> <?php echo $inf['nomE'] . " ". $inf['prenomE'] ?> </option>  
  <?php
}
?>
</select>
    </div>
    <div>
     <label for="" class="text-center text-light merriweather ">Prof</label>
     <select name="prof" id="text" class="form-control">
     <option value="">Selectionné un professeur</option>  
<?php
foreach($profs as $inf ){
    ?>  
   
  <option value="<?php echo $inf['id_prof'] ?> "> <?php echo $inf['nom'] . " ". $inf['prenom'] ?> </option>  
  <?php
}
?>
</select>
    </div>
     <div>
     <label for="" class="text-center text-light merriweather ">Matiere</label>
     <select name="matière" id="text" class="form-control">
     <option value="">Selectionné une matière</option>   
<?php
foreach($mat as $inf ){
  ?> 
 
  <option value="<?php echo $inf['id_matiere'] ?> "> <?php echo $inf['nom_matiere'] . " ". $inf['nom_raccourciMatiere'] ?> </option>  
  <?php
}
?>
</select>
    </div> <br>
    <button id="submit" name="validate"  class="btn btn-primary" type="submit" class="form-control">Valider</button>
          
       </form>
     </div>

    </section>
    
</body>
</html>
<?php require 'require/footer.php' ?>
