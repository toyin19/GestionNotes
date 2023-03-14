<?php
session_start();
include 'db1.php';
$bdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if (isset($_POST['login'])) {
	if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['numero']) AND !empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['password_confirmed']) ) {

		$nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $numero = htmlspecialchars($_POST['numero']);
		$email = htmlspecialchars($_POST['email']);
		$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$password_confirmed = password_hash($_POST['password_confirmed'], PASSWORD_DEFAULT);

		if ($_POST['password'] == $_POST['password_confirmed']) {
			$checkIfUserAlreadyExists = $bdo->prepare('SELECT email FROM professeur WHERE email = ?');
	        $checkIfUserAlreadyExists->execute(array($email));

	        if($checkIfUserAlreadyExists->rowCount() == 0){
	            
	            //Insérer l'utilisateur dans la bdd
	            $insertUserOnWebsite = $bdo->prepare('INSERT INTO professeur(nom,prenom,numero, email, password_hash)VALUES(?, ?, ?, ?,?)');
	            $insertUserOnWebsite->execute(array($nom, $prenom,$numero, $email, $password));

					            //Rediriger l'utilisateur vers la page d'accueil
								header('Location: accueil.php');

	            
             
	        }else {
	            $error = "L'utilisateur existe déjà sur le site";
	        }
		}else {
			$error = "Vos mots de passe ne sont identiques";
		}

	}else {
		$error = "Veuillez remplir tous les champs";
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
            <input type="text" name="nom" class="form-control"  />
        </div>
        <div>
            <label for="" class="text-center text-light merriweather "> Prénom</label>
            <input type="text" name="prenom" class="form-control"  />
        </div>
        <div>
            <label for="" class="text-center text-light merriweather "> Numéro</label>
            <input type="text" name="numero" class="form-control"  />
        </div>
        <div>
            <label for="" class="text-center text-light merriweather "> Email</label>
            <input type="email" name="email" class="form-control"  />
        </div>

        <div>
            <label for="" class="text-center text-light merriweather "> Password</label>
            <input type="password" name="password" class="form-control"  />
        </div>
        
        <div>
            <label for="" class="text-center text-light merriweather "> password_confirmed</label>
            <input type="password" name="password_confirmed" class="form-control"  />
        </div> <br>
       <button type="Submit" name="login" value="" class="btn btn-primary">s'inscrire</button>
       
    </form>


	</div>
</section> 



</body>
</html>
<?php require 'require/footer.php' ?>
