<?php
require('db1.php');
require 'listeProf.php';
$idOfStudent = $_GET['id'];

$checkIfQuestionExists = $bdo->prepare('SELECT * FROM professeur WHERE id_prof = ?');
$checkIfQuestionExists->execute(array($idOfStudent));

$Prof = $getAllTeacher->fetch();


if(isset($_POST['validate']) ){

    if(!empty($_POST['password']) AND !empty($_POST['password_confirmed']) AND !empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['numero'])  AND !empty($_POST['email']) ){
        

        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$pass1 = password_hash($_POST['password_confirmed'], PASSWORD_DEFAULT);
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $num = htmlspecialchars($_POST['numero']);
        $mail = htmlspecialchars($_POST['email']);
        
        
        $update = $bdo->prepare('UPDATE professeur SET numero = ?, nom = ?, prenom = ?, email = ?, password_hash= ? WHERE id_prof = ?');
        $update->execute(array($num, $nom, $prenom,$mail, $pass, $idOfStudent));

        header('Location:Tab_prof.php');

        
        
    }else{
        $error= "Veuillez compléter tous les champs...";
    }

}


?>


<!DOCTYPE html>
<html lang="en">
<?php require 'require/head.php' ?>
<body>
<?php require 'require/nav.php' ?>
   <section class="register-form py-5">
		 <div class="container  py-5 px-5 w-50 ">
         <?php 
		if (isset($error)){?>
		 <div style="color: white;, text-align: center; background-color: red ; padding: 15px;"> <?=$error ?></div>

		 <?php }?>
		
		 <h1 class="merriweather text-center text-light mb-4">INSCRIPTION</h1>
			
		 <form action="" method="post">
	
	    <div>
            <label for="" class="text-center text-light merriweather "> Nom</label>
            <input type="text" name="nom" class="form-control" value="<?=$Prof['nom']?>" />
        </div>
        <div>
            <label for="" class="text-center text-light merriweather "> Prénom</label>
            <input type="text" name="prenom" class="form-control" value="<?=$Prof['prenom']?>" />
        </div>
        <div>
            <label for="" class="text-center text-light merriweather "> Numéro</label>
            <input type="text" name="numero" class="form-control" value="<?=$Prof['numero']?>" />
        </div>
        <div>
            <label for="" class="text-center text-light merriweather "> Email</label>
            <input type="email" name="email" class="form-control" value="<?=$Prof['email']?>" />
        </div>

        <div>
            <label for="" class="text-center text-light merriweather "> Password</label>
            <input type="password" name="password" class="form-control" value="<?=$Prof['password_hash']?>"  />
        </div>
        <div>
            <label for="" class="text-center text-light merriweather "> password_confirmed</label>
            <input type="password" name="password_confirmed" class="form-control" value="<?=$Prof['password_hash']?>" />
        </div> <br>
       <button type="Submit" name="validate" value="" class="btn btn-primary">Enregistré</button>
       
    </form>


	</div>
</section> 



</body>
</html>
<?php require 'require/footer.php' ?>