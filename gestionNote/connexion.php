<?php
session_start();
require('db1.php');

//Validation du formulaire
if(isset($_POST['login'])){

    //Vérifier si le user a bien complété tous les champs
    if(!empty($_POST['email']) AND !empty($_POST['password'])){
        
        //Les données de l'user
        $user_pseudo = htmlspecialchars($_POST['email']);
        $user_password = htmlspecialchars($_POST['password']);

        //Vérifier si l'utilisateur existe (si l'email est correct)
        $checkIfUserExists = $bdo->prepare('SELECT * FROM professeur WHERE email = ?');
        $checkIfUserExists->execute(array($user_pseudo));

        if($checkIfUserExists->rowCount() > 0){
            
            //Récupérer les données de l'utilisateur
            $usersInfos = $checkIfUserExists->fetch();

            //Vérifier si le mot de passe est correct
            if(password_verify($user_password, $usersInfos['password_hash'])){
                $_SESSION['mail']=$_POST['email'];


                //Rediriger l'utilisateur vers la page d'accueil
                header('Location:accueil.php');
    
            }else{
                $error = "Votre mot de passe est incorrect...";
            }

        }else{
            $error = "Votre email est incorrect...";
        }

    }else{
        $error = "Veuillez compléter tous les champs...";
    }

}


?>






<!DOCTYPE html>
<html>
<?php require 'require/head.php' ?>
    
<body >
<?php require 'require/nav.php' ?>

    <section class="register-form py-5">
    <div class="container py-5 px-5  w-50  ">
    <?php 
			if (isset($error)){?>
                <div style="color: white;, text-align: center; background-color: red ; padding: 15px;"> <?=$error ?></div>
       
                <?php }?>
    <h1 class="merriweather text-center text-light mb-4">CONNEXION</h1>

    <form action="" method="post">
       <div>
            <label for="" class="text-light merriweather "> Email</label>
            <input type="email" name="email" class="form-control" />
        </div>
        <div >
            <label for="" class=" text-light merriweather "> Password</label>
            <input type="password" name="password" class="form-control"/>
        </div>  <br>
        <div> <button type="Submit" name="login" value="" class="btn btn-primary">login</button></div>
    </form>
   </div>
   </section>
		

</body>
</html>

<?php require 'require/footer.php' ?>
