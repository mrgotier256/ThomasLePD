<?php
session_start();
if (@$_SESSION['auth'] == true) {
    include '../base/head.php';
    echo '<link rel="stylesheet" href="creation.css">';
    include '../base/header.php';
?>

    <main>
        <div class="container">
            <div class="row">
                <form action="./crea_entreprise.php" method="post" class="text-center">
                    <fieldset>
                        <legend>Création d'une entreprise</legend>
                        <div class="row">

                            <div class="col-6"><label for="Nom">Nom</label></div>
                            <div class="col-6"><input type="text" name="nom" placeholder="Saisissez votre nom" required /></div>

                            <div class="col-6"><label for="Secteur">Secteur d'activité</label></div>
                            <div class="col-6"><input type="text" name="prenom" placeholder="Saisissez le secteur d'activité" required /></div>

                            <div class="col-6"><label for="Localite">Localité</label></div>
                            <div class="col-6"><input type="text" name="localite" placeholder="Saisissez la localité" required /></div>

                            <div class="col-6"><label for="NbStag">Nombre de stagiaire</label></div>
                            <div class="col-6"><input type="text" name="nbStag" placeholder="Saisissez le nombre de stagiaire(s)" required /></div>

                            <div class="col-6"><label for="ValStag">Evaluation du stagiaire</label></div>
                            <div class="col-6"><input type="number" name="valStag" placeholder="Saisissez l'évaluation par le stagiaire" required /></div>

                            <div class="col-6"><label for="ConfPi">Confiance du Pilote</label></div>
                            <div class="col-6"><input type="number" name="confPi" placeholder="Saisissez la confiance du pilote" required /></div>

                            <div class="col-3"></div>
                            <div class="col-3"><input type="submit" value="Envoyer" id="envoyer" /></div>
                            <div class="col-3"><input type="reset" value="Annuler" /></div>
                            <div class="col-3">
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
        <a class="btn btn-secondary col-1 bout fixed-top" style="margin:56px 0; width: 53px; height:53px; outline:none; text-decoration:none" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
            +
        </a>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="width:200px;background-color:black;">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel" style="color:white;">Menu</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body" style="color:white;">
                <?php if (@$_SESSION['auth'] == true) {
                    switch ($_SESSION['user']['ID_Role']) {
                        case 1:
                            echo '<a class="navbar-brand pad" href="../profil/admin.php">Profil</a><br></br>
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
                        <a href="../creation/creation_profil.php">Création d\'un profil</a>
                        <br></br>
                        <a href="../creation/creation_entreprise.php">Création d\'une entreprise</a>
                        <br></br>
                        <a href="../creation/creation_offre.php">Création d\'une offre</a>
                        <br></br>';
                            break;
                        case 2:
                            echo '<a class="navbar-brand pad" href="../profil/pilote.php">Profil</a>
                         <br></br>
                         <a href="../listes/l-eleve.php">Liste des élèves</a>
                         <br></br>
                         <a href="../listes/l-delegue.php">Liste des délegués</a>
                         <br></br>
                         <a href="../listes/l-entreprise.php">Liste des entreprises</a>
                         <br></br>
                         <a href="../listes/l-offre.php">Liste des offres de stage</a>
                         <br></br>
                         <a href="../creation/creation_offre.php">Création d\'une entreprise</a>
                         <br></br>
                         <a href="../creation/creation_offre.php">Création d\'une offre</a>
                         <br></br>';
                            break;
                    }
                } ?>
                <div>
                    <a class="deco" href="../deco/deconnexion.php">Deconnexion</a>
                </div>
            </div>
        </div>
    </main>

<?php
    include '../base/footer.php';
} else {
    header("Location:../connexion/connexion.php");
    exit;
}
?>