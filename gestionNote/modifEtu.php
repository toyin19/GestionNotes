<?php
require('db1.php');
require 'listeEtudiants.php';
require 'listeFil.php';
$idOfStudent = $_GET['id'];

$checkIfQuestionExists = $bdo->prepare('SELECT * FROM etudiants WHERE matricule = ?');
$checkIfQuestionExists->execute(array($idOfStudent));

$info = $getAllStudent->fetch();


if(isset($_POST['validate']) ){

    if(!empty($_POST['matricule']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['sexe'])  AND !empty($_POST['fil']) ){
        

        $etu_mat = htmlspecialchars($_POST['matricule']);
        $etu_nom = htmlspecialchars($_POST['nom']);
        $etu_prenom = htmlspecialchars($_POST['prenom']);
        $etu_sexe = htmlspecialchars($_POST['sexe']);
        $etu_fil = htmlspecialchars($_POST['fil']);
        
        
        $update = $bdo->prepare('UPDATE etudiants SET matricule = ?, nomE = ?, prenomE = ?, sexe = ?, id_filiere= ? WHERE matricule = ?');
        $update->execute(array($etu_mat, $etu_nom, $etu_prenom,$etu_sexe, $etu_fil, $idOfStudent));

        header('Location:Tab_etud.php');

        
        
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
     
           
		 <h1 class="merriweather text-center text-light mb-4">MODIFIER UN ETUDIANT</h1>
			
            <form action="" method="post">
       
           <div>
               <label for="" class="text-center text-light merriweather "> Nom</label>
               <input type="text" name="nom" class="form-control" value="<?=$info['nomE']?>"  />
           </div>
           <div>
               <label for="" class="text-center text-light merriweather "> Prénom</label>
               <input type="text" name="prenom" class="form-control" value="<?=$info['prenomE']?>"  />
           </div>
           <div>
               <label for="" class="text-center text-light merriweather "> Matricule</label>
               <input type="number" name="matricule" class="form-control" value="<?=$info['matricule']?>" >
           </div>
           <div>
               <label for="" class="text-center text-light merriweather "> Filière</label>
               <input type="number" name="fil" class="form-control" value="<?=$info['id_filiere']?>" >
           </div>
           <!-- <div>
     <label for="" class="text-center text-light merriweather ">Filière</label>
     <select name="fil" id="text" class="form-control"  >
<?php
foreach($Fil as $inf ){
    ?>    
    <option value="">Selectionné une filière</option>
  <option value="<?php echo $inf['id_filiere'] ?> "> <?php echo $inf['nomFiliere']  ?> </option>  
  <?php
}
?>
</select>
    </div> -->
     <div>
     <label for="" class="text-center text-light merriweather ">Sexe</label>
     <select name="sexe" id="sexe" class="form-control" value="<?=$info['sexe']?>" >
     <option value="Masculin">Masculin</option>
     <option value="Féminin">Féminin</option>
    </select>
    </div> <br>
    <button id="submit" name="validate"   class="btn btn-primary" type="submit" class="form-control">Enregistré</button>
          
       </form>
     </div>

    </section>


      
</body>
</html>
<?php require 'require/footer.php' ?>