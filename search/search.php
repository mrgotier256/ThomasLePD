<?php
include '../base/head.php';
echo '<link rel="stylesheet" href="search.css">';
include '../base/header.php';
?>

<main>
    <div class="container">
        <div class="row">
            <a class="btn btn-secondary col-1 bout fixed-top" style="margin:56px 0; width: 53px; height:53px;" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                +
            </a>
            <div class="text-center col-11">
                <article class="prof">Liste des résultats
                    <?php require '../PHP/Class.php';

                    if (@$_SESSION['auth'] == true) {
                        switch ($_SESSION['user']['ID_Role']) {
                            case 1:
                                $names = new Recherche();
                                foreach ($names->getElevebyName($_GET['Recherche']) as $name) {
                                    $lien = "";
                                    $lien =  $name['nom'] . " " . "|" . " " . $name['prenom'] . " " . "|" . " " . $name['centre'] . " " . "|" . " " . $name['email'] . " " . "|" . " " . $name['id_user'] . " ";
                                    echo "<div class=\"etudiant\"><h5><strong>Etudiant</strong></h5><a class=\"joie\" href = '../profil/etudiant.php?idUser=" . $name['id_user'] . "'><b>" . $lien . "</b></a></div>";
                                }
                                $names->getElevebyName($_GET['Recherche']);

                                $names = new Recherche();
                                foreach ($names->getDeleguebyName($_GET['Recherche']) as $name) {
                                    $lien = "";
                                    $lien =  $name['nom'] . " " . "|" . " " . $name['prenom'] . " " . "|" . " " . $name['centre'] . " " . "|" . " " . $name['email'] . " " . "|" . " " . $name['id_user'] . " ";
                                    echo "<div class=\"delegue\"><h5><strong>Delegue</strong></h5><a class=\"joie\" href = '../profil/jean.php?idUser=" . $name['id_user'] . "'><b>" . $lien . "</b></a></div>";
                                }
                                $names->getDeleguebyName($_GET['Recherche']);

                                $names = new Recherche();
                                foreach ($names->getPilotebyName($_GET['Recherche']) as $name) {
                                    $lien = "";
                                    $lien =  $name['nom'] . " " . "|" . " " . $name['prenom'] . " " . "|" . " " . $name['centre'] . " " . "|" . " " . $name['email'] . " " . "|" . " " . $name['id_user'] . " ";
                                    echo "<div class=\"pilote\"><h5><strong>Pilote</strong></h5><a class=\"joie\" href = '../profil/avion.php?idPilote=" . $name['id_user'] . "'><b>" . $lien . "</b></a></div>";
                                }
                                $names->getPilotebyName($_GET['Recherche']);

                                $names = new Recherche();
                                foreach ($names->getEntreprisebyName($_GET['Recherche']) as $name) {
                                    $lien = "";
                                    $lien =  $name['Nom'] . " " . "|" . " " . $name['Secteur_activite'] . " " . "|" . " " . $name['Localite'] . " " . "|" . " " . $name['Nb_stagiaire_cesi'] . " " . " stagiaires " . "|" . " " . $name['evaluation_stagiaire'] . "/5 " . "|" . " " . $name['confiance_pilote'] . "/5 " . " ";
                                    echo "<div class=\"entreprise\"><h5><strong>Entreprise</strong></h5><a class=\"joie\" href = '../profil/entreprise.php?idFiche=" . $name['id_fiche'] . "&Nom=" .$name['Nom'] ."'><b>" . $lien . "</b></a></div>";
                                }
                                $names->getEntreprisebyName($_GET['Recherche']);

                                $competences = new Recherche();
                                foreach ($competences->getOffrebyComp($_GET['Recherche']) as $competence) {
                                    $date = new DateTime($competence['date_offre']);
                                    $lien = "";
                                    $lien =  $competence['id_offre'] . " " . "|" . " " . $competence['localite'] . " " . "|" . " " . $competence['entreprise'] . " " . "|" . " " . $competence['competences'] . " " . "|" . " " . $competence['duree'] . " " . 'semaines' . " " . "|" . " " . $competence['remuneration'] . " " . '€' . " " . "|" . " " . date_format($date, 'd-m-Y') . " " . "|" . " " . $competence['id_fiche'] . " ";
                                    echo "<div class=\"offre\"><h5><strong>Offre de stage</strong></h5><a class=\"joie\" href = '../mineures/offre.php?idOffre=" . $competence['id_offre'] . "'><b>" . $lien . "</b></a></div>";
                                }
                                $competences->getOffrebyComp($_GET['Recherche']);
                                break;

                            case 2:
                                $names = new Recherche();
                                foreach ($names->getElevebyName($_GET['Recherche']) as $name) {
                                    $lien = "";
                                    $lien =  $name['nom'] . " " . "|" . " " . $name['prenom'] . " " . "|" . " " . $name['centre'] . " " . "|" . " " . $name['email'] . " " . "|" . " " . $name['id_user'] . " ";
                                    echo "<div class=\"etudiant\"><h5><strong>Etudiant</strong></h5><a class=\"joie\" href = '../profil/etudiant.php?idUser=" . $name['id_user'] . "'><b>" . $lien . "</b></a></div>";
                                }
                                $names->getElevebyName($_GET['Recherche']);

                                $names = new Recherche();
                                foreach ($names->getDeleguebyName($_GET['Recherche']) as $name) {
                                    $lien = "";
                                    $lien =  $name['nom'] . " " . "|" . " " . $name['prenom'] . " " . "|" . " " . $name['centre'] . " " . "|" . " " . $name['email'] . " " . "|" . " " . $name['id_user'] . " ";
                                    echo "<div class=\"delegue\"><h5><strong>Delegue</strong></h5><a class=\"joie\" href = '../profil/jean.php?idUser=" . $name['id_user'] . "'><b>" . $lien . "</b></a></div>";
                                }
                                $names->getDeleguebyName($_GET['Recherche']);

                                $names = new Recherche();
                                foreach ($names->getEntreprisebyName($_GET['Recherche']) as $name) {
                                    $lien = "";
                                    $lien =  $name['Nom'] . " " . "|" . " " . $name['Secteur_activite'] . " " . "|" . " " . $name['Localite'] . " " . "|" . " " . $name['Nb_stagiaire_cesi'] . " " . " stagiaires " . "|" . " " . $name['evaluation_stagiaire'] . "/5 " . "|" . " " . $name['confiance_pilote'] . "/5 " . " ";
                                    echo "<div class=\"entreprise\"><h5><strong>Entreprise</strong></h5><a class=\"joie\" href = '../profil/entreprise.php?idFiche=" . $name['id_fiche'] . "&Nom=" .$name['Nom'] ."'><b>" . $lien . "</b></a></div>";
                                }
                                $names->getEntreprisebyName($_GET['Recherche']);

                                $competences = new Recherche();
                                foreach ($competences->getOffrebyComp($_GET['Recherche']) as $competence) {
                                    $date = new DateTime($competence['date_offre']);
                                    $lien = "";
                                    $lien =  $competence['id_offre'] . " " . "|" . " " . $competence['localite'] . " " . "|" . " " . $competence['entreprise'] . " " . "|" . " " . $competence['competences'] . " " . "|" . " " . $competence['duree'] . " " . 'semaines' . " " . "|" . " " . $competence['remuneration'] . " " . '€' . " " . "|" . " " . date_format($date, 'd-m-Y') . " " . "|" . " " . $competence['id_fiche'] . " ";
                                    echo "<div class=\"offre\"><h5><strong>Offre de stage</strong></h5><a class=\"joie\" href = '../mineures/offre.php?idOffre=" . $competence['id_offre'] . "'><b>" . $lien . "</b></a></div>";
                                }
                                $competences->getOffrebyComp($_GET['Recherche']);
                                break;

                            case 3:
                                $names = new Recherche();
                                foreach ($names->getElevebyName($_GET['Recherche']) as $name) {
                                    $lien = "";
                                    $lien =  $name['nom'] . " " . "|" . " " . $name['prenom'] . " " . "|" . " " . $name['centre'] . " " . "|" . " " . $name['email'] . " " . "|" . " " . $name['id_user'] . " ";
                                    echo "<div class=\"etudiant\"><h5><strong>Etudiant</strong></h5><a class=\"joie\" href = '../profil/etudiant.php?idUser=" . $name['id_user'] . "'><b>" . $lien . "</b></a></div>";
                                }
                                $names->getElevebyName($_GET['Recherche']);

                                $names = new Recherche();
                                foreach ($names->getEntreprisebyName($_GET['Recherche']) as $name) {
                                    $lien = "";
                                    $lien =  $name['Nom'] . " " . "|" . " " . $name['Secteur_activite'] . " " . "|" . " " . $name['Localite'] . " " . "|" . " " . $name['Nb_stagiaire_cesi'] . " " . " stagiaires " . "|" . " " . $name['evaluation_stagiaire'] . "/5 " . "|" . " " . $name['confiance_pilote'] . "/5 " . " ";
                                    echo "<div class=\"entreprise\"><h5><strong>Entreprise</strong></h5><a class=\"joie\" href = '../profil/entreprise.php?idFiche=" . $name['id_fiche'] . "&Nom=" .$name['Nom'] ."'><b>" . $lien . "</b></a></div>";
                                }
                                $names->getEntreprisebyName($_GET['Recherche']);

                                $competences = new Recherche();
                                foreach ($competences->getOffrebyComp($_GET['Recherche']) as $competence) {
                                    $date = new DateTime($competence['date_offre']);
                                    $lien = "";
                                    $lien =  $competence['id_offre'] . " " . "|" . " " . $competence['localite'] . " " . "|" . " " . $competence['entreprise'] . " " . "|" . " " . $competence['competences'] . " " . "|" . " " . $competence['duree'] . " " . 'semaines' . " " . "|" . " " . $competence['remuneration'] . " " . '€' . " " . "|" . " " . date_format($date, 'd-m-Y') . " " . "|" . " " . $competence['id_fiche'] . " ";
                                    echo "<div class=\"offre\"><h5><strong>Offre de stage</strong></h5><a class=\"joie\" href = '../mineures/offre.php?idOffre=" . $competence['id_offre'] . "'><b>" . $lien . "</b></a></div>";
                                }
                                $competences->getOffrebyComp($_GET['Recherche']);
                                break;

                            case 4:

                                $names = new Recherche();
                                foreach ($names->getEntreprisebyName($_GET['Recherche']) as $name) {
                                    $lien = "";
                                    $lien =  $name['Nom'] . " " . "|" . " " . $name['Secteur_activite'] . " " . "|" . " " . $name['Localite'] . " " . "|" . " " . $name['Nb_stagiaire_cesi'] . " " . " stagiaires " . "|" . " " . $name['evaluation_stagiaire'] . "/5 " . "|" . " " . $name['confiance_pilote'] . "/5 " . " ";
                                    echo "<div class=\"entreprise\"><h5><strong>Entreprise</strong></h5><a class=\"joie\" href = '../profil/entreprise.php?idFiche=" . $name['id_fiche'] . "&Nom=" .$name['Nom'] ."'><b>" . $lien . "</b></a></div>";
                                }
                                $names->getEntreprisebyName($_GET['Recherche']);

                                $competences = new Recherche();
                                foreach ($competences->getOffrebyComp($_GET['Recherche']) as $competence) {
                                    $date = new DateTime($competence['date_offre']);
                                    $lien = "";
                                    $lien =  $competence['id_offre'] . " " . "|" . " " . $competence['localite'] . " " . "|" . " " . $competence['entreprise'] . " " . "|" . " " . $competence['competences'] . " " . "|" . " " . $competence['duree'] . " " . 'semaines' . " " . "|" . " " . $competence['remuneration'] . " " . '€' . " " . "|" . " " . date_format($date, 'd-m-Y') . " " . "|" . " " . $competence['id_fiche'] . " ";
                                    echo "<div class=\"offre\"><h5><strong>Offre de stage</strong></h5><a class=\"joie\" href = '../mineures/offre.php?idOffre=" . $competence['id_offre'] . "'><b>" . $lien . "</b></a></div>";
                                }
                                $competences->getOffrebyComp($_GET['Recherche']);
                                break;
                        }
                    } else {
                        echo '<a class="navbar-brand pad" href="../mainpage/mainPage.php"></a>';
                    }
                    ?>

                </article>
            </div>
        </div>
    </div>
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel" style="width:200px;background-color:black;">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel" style="color:white;">Menu</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body" style="color:white;">
            <a href="">Profil</a>
            <br></br>
            <div>
                <a class="deco" href="../deco/deconnexion.php">Deconnexion</a>
            </div>
        </div>
    </div>
</main>

<?php include '../base/footer.php'; ?>