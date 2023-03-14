<?php
require('db1.php');
require 'listeNote.php';
$idOfStudent = $_GET['id'];

$checkIfQuestionExists = $bdo->prepare('SELECT * FROM notes WHERE id_note = ?');
$checkIfQuestionExists->execute(array($idOfStudent));

$Note = $getAllNote->fetch();


if(isset($_POST['validate']) ){

    if(!empty($_POST['note']) AND !empty($_POST['etudiant']) AND !empty($_POST['prof']) AND !empty($_POST['matière'])){

        $note = htmlspecialchars($_POST['note']);
        $etudiant = htmlspecialchars($_POST['etudiant']);
        $prof = htmlspecialchars($_POST['prof']);
        $matiere = htmlspecialchars($_POST['matière']);
        
        $update = $bdo->prepare('UPDATE notes SET id_note = ?, id_prof =?, id_matiere =?, matricule =? WHERE id_note = ?');
        $update->execute(array($note,$etudiant,$prof,$matiere ,$idOfStudent));

        header('Location:tab_note.php');

        
        
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
    
		 <h1 class="merriweather text-center text-light mb-4">MODIFIER UNE NOTE</h1>
			
            <form action="" method="post">
           <div>
               <label for="" class="text-center text-light merriweather "> Note</label>
               <input type="number" name="note" class="form-control" value="<?=$Note['note']?>"  />
           </div>
           <div>
               <label for="" class="text-center text-light merriweather "> Professeur</label>
               <input type="number" name="etudiant" class="form-control" value="<?=$Note['id_prof']?>"  />
           </div>
           <div>
               <label for="" class="text-center text-light merriweather "> Matière</label>
               <input type="number" name="prof" class="form-control" value="<?=$Note['id_matiere']?>"  />
           </div>
           <div>
               <label for="" class="text-center text-light merriweather "> Etudiant</label>
               <input type="text" name="matière" class="form-control" value="<?=$Note['matricule']?>"  />
           </div> <br>
           <button id="submit" name="validate"  class="btn btn-primary" type="submit" class="form-control">Enregistré</button>
    <!-- <div>
     <label for="" class="text-center text-light merriweather ">ETUDIANT</label>
     <select name="etudiant" id="text" class="form-control">
<?php
foreach($etud as $inf ){
    ?>  
    <option value="">Selectionné un étudiant</option>  
  <option value="<?php echo $inf['matricule'] ?> "> <?php echo $inf['nom'] . " ". $inf['prenom'] ?> </option>  
  <?php
}
?>
</select>
    </div>
    <div>
     <label for="" class="text-center text-light merriweather ">Prof</label>
     <select name="prof" id="text" class="form-control">
<?php
foreach($profs as $inf ){
    ?>  
    <option value="">Selectionné un professeur</option>  
  <option value="<?php echo $inf['id_prof'] ?> "> <?php echo $inf['nom'] . " ". $inf['prenom'] ?> </option>  
  <?php
}
?>
</select>
    </div>
     <div>
     <label for="" class="text-center text-light merriweather ">Matiere</label>
     <select name="matière" id="text" class="form-control">
<?php
foreach($mat as $inf ){
  ?> 
  <option value="">Selectionné une matière</option>   
  <option value="<?php echo $inf['id_matiere'] ?> "> <?php echo $inf['nom_matiere'] . " ". $inf['nom_raccourciMatiere'] ?> </option>  
  <?php
}
?>
</select>
    </div> <br> -->

          
       </form>
     </div>

    </section>
    
</body>
</html>
<?php require 'require/footer.php' ?>