<?php
session_start();
if (@$_SESSION['auth'] == true) {
    include '../base/head.php';
    require '../PHP/Class.php';
    echo '<link rel="stylesheet" href="creation.css">';
    include '../base/header.php';
?>

    <main>
        <div class="container">
            <div class="row">
                <form action="./update/upd_offre_et_entreprise.php" method="post" class="text-center">
                    <fieldset>
                        <legend>Modification d'une offre de stage</legend>
                        <div class="row">

                            <div class="col-6" style="padding:7px;"><label for="comp">Competences</label></div>
                            <div class="col-6"><input type="text" name="comp" placeholder="Saisissez le(s) compétence(s) requise(s)" required /></div>

                            <div class="col-6" style="padding:7px;"><label for="loca">Localité</label></div>
                            <div class="col-6"><input type="text" name="loca" placeholder="Saisissez une localité" required /></div>

                            <div class="col-6" style="padding:7px; padding-bottom:7px;"><label for="ID_ent">Entreprise</label></div>
                            <select name="ID_ent" style="width:165px;">
                                <option value="">Entreprise</option>
                                <?php
                                $NomEntreprises = new Entreprise;
                                foreach ($NomEntreprises->getEntrepriseSansLimite() as $NomEntreprise) {
                                ?>
                                    <option value="<?= $NomEntreprise['id_fiche'] ?>"><?= $NomEntreprise['Nom'] ?></option>
                                <?php
                                }
                                ?>
                            </select>

                            <div class="col-6" style="padding:7px;"><label for="dur">Durée (en semaine)</label></div>
                            <div class="col-6"><input type="number" name="dur" placeholder="Saisissez une durée" required /></div>

                            <div class="col-6" style="padding:7px;"><label for="em">Date d'emission</label></div>
                            <div class="col-6"><input type="date" name="em" placeholder=" Saisissez une date" required /></div>

                            <div class="col-6" style="padding:7px;"><label for="remu">Rémunération</label></div>
                            <div class="col-6"><input type="number" name="remu" placeholder="Saisissez la rémunération proposée" required /></div>
                          
                            <input id="updateOffre" name="updateOffre" type="radio" value="1" style="visibility: hidden" checked>

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
            <?php
                    include'../link_bar/link_bar.php'; 
                ?>
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