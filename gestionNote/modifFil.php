<?php
require('db1.php');
require 'listeFil.php';
$idOfStudent = $_GET['id'];

$checkIfQuestionExists = $bdo->prepare('SELECT * FROM filière WHERE id_filiere = ?');
$checkIfQuestionExists->execute(array($idOfStudent));

$fil = $getAllFil->fetch();


if(isset($_POST['validate']) ){

    if(!empty($_POST['nomFilière'])){
        

        
        $nomFil = htmlspecialchars($_POST['nomFilière']);
     
        
        $update = $bdo->prepare('UPDATE filière SET nomFiliere = ? WHERE id_filiere = ?');
        $update->execute(array($nomFil,$idOfStudent));

        header('Location:tab_fil.php');

        
        
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

		
    <section class="gestion1-form py-5">
    <div class="container  py-5 px-5 w-50 ">
    
           
		 <h1 class="merriweather text-center text-light mb-4">MODIFIER UNE FILIERE</h1>
			
            <form action="" method="post">
       
           <div>
               <label for="" class="text-center text-light merriweather "> Nom de la filière</label>
               <input type="text" name="nomFilière" class="form-control" value="<?=$fil['nomFiliere']?>" />
           </div> <br>   
      <button id="submit" name="validate"   class="btn btn-primary" type="submit" class="form-control">Enregistré</button>
          
       </form>
     </div>

    </section>


      
</body>
</html>
<?php require 'require/footer.php' ?>
