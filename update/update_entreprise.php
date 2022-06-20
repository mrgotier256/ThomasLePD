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
                <form action="./upd_offre_et_entreprise.php" method="post" class="text-center">
                    <fieldset>
                        <legend>Modification d'une entreprise</legend>
                        <div class="row">
                            <div class="col-6" style="padding:7px; padding-bottom:7px;"><label for="id_fiche">Entreprise*</label></div>
                            <select name="id_fiche" style="width:165px;" required>
                                <option value="">Entreprise*</option>
                                <?php
                                include '../PHP/Class.php';
                                $NomEntreprises = new Entreprise;
                                foreach ($NomEntreprises->getEntrepriseSansLimite() as $NomEntreprise) {
                                ?>
                                    <option value="<?= $NomEntreprise['id_fiche'] ?>"><?= $NomEntreprise['Nom'] ?></option>
                                <?php
                                }
                                ?>
                            </select>

                            <div class="col-6" style="padding:7px;"><label for="comp">Nouveau Nom</label></div>
                            <div class="col-6"><input type="text" name="NewNom" placeholder="Saisissez le nouveau nom" /></div>

                            <div class="col-6" style="padding:7px;"><label for="comp">Secteur d'activité</label></div>
                            <div class="col-6"><input type="text" name="SecteurAct" placeholder="Saisissez le Secteur d'activité"  /></div>

                            <div class="col-6" style="padding:7px;"><label for="loca">Localité</label></div>
                            <div class="col-6"><input type="text" name="localite" placeholder="Saisissez une localité" /></div>

                            <div class="col-6" style="padding:7px;"><label for="dur">Nombre de stagiaire</label></div>
                            <div class="col-6"><input type="number" name="NbrStagiaire" min="0" placeholder="Saisissez le nombre de stagiaire"  /></div>

                            <div class="col-6" style="padding:7px;"><label for="em">Evaluation du stagiaire</label></div>
                            <div class="col-6"><input type="number" step="any" name="EvalStagiaire" min="0" max="5" placeholder="Saisissez l'évaluation stagiaire" /></div>

                            <div class="col-6" style="padding:7px;"><label for="remu">Confiance du Pilot</label></div>
                            <div class="col-6"><input type="number" step="any" name="EvalStagiaire" min="0" max="5" placeholder="Saisissez l'évaluation pilote"  /></div>
                          
                            <input id="updateEntreprise" name="updateEntreprise" type="radio" value="1" style="visibility: hidden" checked>

                            <br><br>
                            <div class="col-3"></div>
                            <div class="col-3"><input type="submit" value="Envoyer" id="envoyer" /></div>
                            <div class="col-3"><input type="reset" value="Annuler" /></div>
                            <div class="col-3">
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