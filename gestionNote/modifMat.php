<?php
require('db1.php');
require 'listeMat.php';
$idOfStudent = $_GET['id'];

$checkIfQuestionExists = $bdo->prepare('SELECT * FROM matières WHERE id_matiere= ?');
$checkIfQuestionExists->execute(array($idOfStudent));

$mat = $getAllMat->fetch();

if(isset($_POST['validate']) ){

    if(!empty($_POST['nom_matiere']) AND  !empty($_POST['nom_raccourciMatiere'])){
        

        
        $mat = htmlspecialchars($_POST['nom_matiere']);
        $mat1 = htmlspecialchars($_POST['nom_raccourciMatiere']);
     
        
        $update = $bdo->prepare('UPDATE matières SET nom_matiere = ?, nom_raccourciMatiere =? WHERE id_matiere = ?');
        $update->execute(array($mat,$mat1,$idOfStudent));

        header('Location:tab_mat.php');        
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
     
           
		 <h1 class="merriweather text-center text-light mb-4">MODIFIER UNE MATIERE</h1>
			
            <form action="" method="post">
       
           <div>
               <label for="" class="text-center text-light merriweather "> Nom de la matière</label>
               <input type="text" name="nom_matiere" class="form-control" value="<?=$mat['nom_matiere']?>" />
           </div>
           <div>
               <label for="" class="text-center text-light merriweather "> Nom raccourci de cette matière</label>
               <input type="text" name="nom_raccourciMatiere" class="form-control" value="<?=$mat['nom_raccourciMatiere']?>" />
           </div> 
           <div>
               <label for="" class="text-center text-light merriweather "> coeficient</label>
               <input type="number" name="coef" class="form-control" value="<?=$mat['coef']?>" />
           </div><br>
     <button id="submit" name="validate"   class="btn btn-primary" type="submit" class="form-control">Enregistré</button>
          
       </form>
     </div>

    </section>


      
</body>
</html>
<?php require 'require/footer.php' ?>
