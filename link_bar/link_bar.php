<?php
if (@$_SESSION['auth'] == true) {
    switch ($_SESSION['user']['ID_Role']) {
        case 1: ?>
            <a class="navbar-brand pad" href="../profil/admin.php">Profil</a><br></br>
         <a href="../listes/l-eleve.php">Liste des élèves</a>
         <br></br>
         <a href="../listes/l-pilote.php">Listes des pilotes</a>
         <br></br>
         <a href="../listes/l-delegue.php">Listes des délegués</a>
         <br></br>
         <a href="../listes/l-entreprise.php">Listes des entreprises</a>
         <br></br>
         <a href="../listes/l-offre.php">Listes des offres de stage</a>
         <br></br>
         <a href="../creation/creation_profil.php">Création d'un profil</a>
         <br></br>
         <a href="../creation/creation_entreprise.php">Création d'une entreprise</a>
         <br></br>
         <a href="../creation/creation_offre.php">Création d'une offre</a>
         <br></br>
         <a href="../update/update_profil.php">Modification du profil</a>
         <br></br>
         <a href="../update/update_entreprise.php">Modification d'une entreprise</a>
         <br></br>
         <a href="../update/update_offre.php">Modification d'une offre de stage</a>
         <br></br>
         <?php 
        break;
        
        case 2: ?>
            <a class="navbar-brand pad" href="../profil/pilote.php">Profil</a>
         <br></br>
         <a href="../listes/l-eleve.php">Liste des élèves</a>
         <br></br>
         <a href="../listes/l-delegue.php">Liste des délegués</a>
         <br></br>
         <a href="../listes/l-entreprise.php">Liste des entreprises</a>
         <br></br>
         <a href="../listes/l-offre.php">Liste des offres de stage</a>
         <br></br>
         <a href="../creation/creation_profil.php">Création d'un profil</a>
         <br></br>
         <a href="../creation/creation_entreprise.php">Création d'une entreprise</a>
         <br></br>
         <a href="../creation/creation_offre.php">Création d'une offre</a>
         <br></br>
         <a href="../update/update_profil.php">Modification du profil</a>
         <br></br>
         <a href="../update/update_entreprise.php">Modification d'une entreprise</a>
         <br></br>
         <a href="../update/update_offre.php">Modification d'une offre de stage</a>
         <br></br>
         <?php 
        break;
        
        case 3: ?>
            <a class="navbar-brand pad" href="../profil/delegue.php">Profil</a>
         <br></br>
         <a href="../listes/l-offre.php">Liste des offres</a>
         <br></br>
         <a href="../creation/creation_offre.php">Création d'une offre</a> 
         <br></br>
         <?php 
        break; 
         
        case 4: ?>
            <a class="navbar-brand pad" href="../profil/eleve.php">Profil</a> 
         <br></br> 
         <a href="../listes/l-offre.php">Liste des offres</a> 
         <br></br>
         <a href="../listes/l-entreprise.php">Liste des entreprises</a>
         <br></br>
         <a href="../Wishlist/wishlist.php">Wishlist</a> 
         <br></br>
         <?php 
        break;
    } 
} 
?>