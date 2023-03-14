<?php
require('db1.php');
require 'listeMat.php';
session_start();


	  if (!isset($_SESSION['mail'])) {
    header("Location: accueil.php");
  }
  $mat =  $getAllMat->fetchAll();

if(isset($_POST['validate']) ){

    if(!empty($_POST['date']) AND !empty($_POST['date1'])){
        
        $date = htmlspecialchars($_POST['date']);
        $date1 = htmlspecialchars($_POST['date1']);

        $insert = $bdo->prepare('INSERT INTO composition(date_debut,date_fin)VALUES(?,?)');
        $insert->execute(
            array(
                $date,
                $date1,
            ));

        $success = "Information enregistré avec succès";
        
    }else{
        $error= "Veuillez compléter  ce champ...";
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
               <label for="" class="text-center text-light merriweather "> Date du debut</label>
               <input type="date" name="date" class="form-control"  />
           </div>
       
           <div>
               <label for="" class="text-center text-light merriweather "> Date de la fin</label>
               <input type="date" name="date1" class="form-control"  />
           </div> <br>   
      <button id="submit" name="validate"   class="btn btn-primary" type="submit" class="form-control">Valider</button>
          
       </form>
     </div>

    </section>


      
</body>
</html>
<?php require 'require/footer.php' ?>