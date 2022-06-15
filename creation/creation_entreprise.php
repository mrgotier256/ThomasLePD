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

                            <div class="col-6" style="padding:7px;"><label for="Nom">Nom</label></div>
                            <div class="col-6"><input type="text" name="nom" placeholder="Saisissez votre nom" required /></div>

                            <div class="col-6" style="padding:7px;"><label for="Secteur">Secteur d'activité</label></div>
                            <div class="col-6"><input type="text" name="prenom" placeholder="Saisissez le secteur d'activité" required /></div>

                            <div class="col-6" style="padding:7px;"><label for="Localite">Localité</label></div>
                            <div class="col-6"><input type="text" name="localite" placeholder="Saisissez la localité" required /></div>

                            <div class="col-6" style="padding:7px;"><label for="NbStag">Nombre de stagiaire</label></div>
                            <div class="col-6"><input type="text" name="nbStag" placeholder="Saisissez le nombre de stagiaire(s)" required /></div>

                            <div class="col-6" style="padding:7px;"><label for="ValStag">Evaluation du stagiaire</label></div>
                            <div class="col-6"><input type="number" name="valStag" placeholder="Saisissez l'évaluation par le stagiaire" required /></div>

                            <div class="col-6" style="padding:7px;"><label for="ConfPi">Confiance du Pilote</label></div>
                            <div class="col-6"><input type="number" name="confPi" placeholder="Saisissez la confiance du pilote" required /></div>
                            <br><br>
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
                <?php include'../link_bar/link_bar.php'; ?>
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