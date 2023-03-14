<?php
require('db1.php');
require 'listeCompo.php';
$idOfStudent = $_GET['id'];

$checkIfQuestionExists = $bdo->prepare('SELECT * FROM composition WHERE id_compo = ?');
$checkIfQuestionExists->execute(array($idOfStudent));

$compo = $getAllCompo->fetch();


if(isset($_POST['validate']) ){

    if(!empty($_POST['date']) AND !empty($_POST['nomMatiere'])){
        

        $date = htmlspecialchars($_POST['date']);
        $nomMatiere = htmlspecialchars($_POST['nomMatiere']);
     
        
        $update = $bdo->prepare('UPDATE composition SET date_compo=?,NomMatiere_compose  = ? WHERE id_compo = ?');
        $update->execute(array($date,$nomMatiere,$idOfStudent));

        header('Location:tab_comp.php');

        
        
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

<body >
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
           
		 <h1 class="merriweather text-center text-light mb-4">AJOUTER UNE COMPO</h1>
			
            <form action="" method="post">
            <div>
               <label for="" class="text-center text-light merriweather "> Date de la compo</label>
               <input type="date" name="date" class="form-control" value="<?=$compo['date_compo']?>" />
           </div>
           <div>
               <label for="" class="text-center text-light merriweather "> Nom de la matière</label>
               <input type="text" name="nomMatiere" class="form-control" value="<?=$compo['Nommatiere_compose']?>" />
           </div> <br>
           <button id="submit" name="validate"   class="btn btn-primary" type="submit" class="form-control">Enregistré</button>
       
           <!-- <div>
     <label for="" class="text-center text-light merriweather ">Matiere</label>
     <select name="nomMatiere" id="text" class="form-control">
<?php
foreach($mat as $inf ){
    ?> 
    <option value="">Selectionné une matière</option>   
  <option value="<?php echo $inf['id_matiere'] ?> "> <?php echo $inf['nom_matiere'] . " ". $inf['nom_raccourciMatiere'] ?> </option>  
  <?php
}
?>
</select>
    </div>  <br>    -->

          
       </form>
     </div>

    </section>


      
</body>
</html>
<?php require 'require/footer.php' ?>