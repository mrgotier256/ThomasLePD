<?php
require '../PHP/Class.php';

print_r('salut');

$bdd = ConnectBDD();

$NomOffre = @$_POST['EntrepriseNom'];
$CompetenceOffre = @$_POST['StageCompetence'];
$LocaliteOffre = @$_POST['StageLocalite'];
$DureeOffre = @$_POST['StageDuree'];
$AND = " AND ";

if (empty($CompetenceOffre) && empty($LocaliteOffre) && empty($DureeOffre) && empty($NomOffre)) {
    header('Location: ../mineures/info.php');
}

if (empty($NomOffre)) {
    $entreprise = "";
    $NomOffre = "";
} else {
    $entreprise = 'entreprise =';
    $NomOffre = $bdd->quote($NomOffre) . $AND;
}

if (empty($CompetenceOffre)) {
    $competences = "";
    $CompetenceOffre = "";
} else {
    $competences = 'competences =';
    $CompetenceOffre = $bdd->quote($CompetenceOffre) . $AND;
}

if (empty($LocaliteOffre)) {
    $localite = "";
    $LocaliteOffre = "";
} else {
    $localite = 'localite =';
    $LocaliteOffre = $bdd->quote($LocaliteOffre) . $AND;
}

if (empty($DureeOffre)) {
    $duree = "";
    $DureeOffre = "";
} else {
    $duree = 'duree =';
    $DureeOffre = $bdd->quote($DureeOffre) . $AND;
}

$reqt = "SELECT * FROM `offre_de_stage` WHERE 
" . $entreprise . " " . $NomOffre . "
" . $competences . " " . $CompetenceOffre . " 
" . $localite . " " . $LocaliteOffre . " 
" . $duree . " " . $DureeOffre . " 1 = 1";


var_dump($reqt);
var_dump($bdd);
$result = $bdd->query($reqt);


if ($result == false) {
    header('Location: ../mineures/info.php');
    exit();
}

$OffreResult = $result->fetchAll();
if (empty($OffreResult)) {
    header('Location: ../mineures/info.php');
    exit();
}


include '../base/head.php';
echo '<link rel="stylesheet" href="info.css">';
include '../base/header.php';
?>

<main>
    <div class="container">
        <div class="row">
            <article class="col-12" style="width:100%">
                <?php
                foreach ($OffreResult as $Offre) {
                    $date = new DateTime($Offre['date_offre']);
                    $lien = "";
                    $lien = $Offre['competences'] . " " . "|" . " " . $Offre['localite'] . " " . "|" . " " . $Offre['entreprise'] . " " . "|" . " " . $Offre['duree'] . " " . " semaines" . " " . "|" . " " . $Offre['remuneration'] . " " . '€' . " " . "|" . " " . date_format($date, 'd-m-Y') . " " . "|" . " " . $Offre['id_fiche'] . " ";
                    echo "<div class=\"bdd\"><a class=\"joie\" href = '../mineures/offre.php?idOffre=" . $Offre['id_offre'] . "'><b>" . $lien . "</b></a></div>";
                }
                ?>
            </article>
        </div>
    </div>
</main>

<?php include '../base/footer.php'; ?> -->