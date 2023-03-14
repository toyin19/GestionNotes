
<header>
        <nav class="cc-navbar navbar navbar-expand-lg position-fixed  w-100 navbar-dark ">
            <div class="container-fluid">
                <!-- <a class="navbar-brand text-uppercase fw-bolder mx-4 py-3" href="#">USERS</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span> 
              </button> -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto ">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="accueil.php">Acceuil</a>
                        </li>
                          <?php if(!isset($_SESSION['mail'])): ?> 
                        <li class="nav-item">
                        <a class="nav-link" href="inscription.php">S'inscrire</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="connexion.php">Se connecter</a>
                    </li>
                    <?php  else:?> 
                   
                    <li class="nav-item">
                        <a class="nav-link " href="ajouterEtudiant.php">Etudiants</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="Tab_etud.php">Liste_Etudiant</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link " href="Tab_prof.php">Liste_Prof</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link " href="tab_fil.php">Liste_filière</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link " href="tab_mat.php">Liste_matière</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link " href="tab_comp.php">Liste_compo</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link " href="tab_note.php">Liste_note</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link " href="compo.php">Composition</a>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="filiere.php">Filière</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cm.php">Moyenne</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="matiere.php">Matière</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="note.php">Note</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="deconnexion.php">Se deconnecter</a>
                    </li>
                     <?php endif;?>  
                   
                    </ul>
                </div>
            </div>
        </nav>
    </header>


                        
 
 